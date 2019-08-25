<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Category;
use App\Field;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Response;
use Validator;

class ProductController extends Controller
{

    public function index()
    {
        $products = auth()->user()->products()->where('published', 1)->with(['images'])->get();
        return view('front.pages.user.products', compact('products'));
    }

    public function getUnpublishedProduct()
    {
        if ( ! $unpublished = auth()->user()->products()->where('published', 0)->first()) {

            $unpublished = Product::create([
                'title' => 'tmp',
                'description' => 'tmp',
                'price' => 0,
                'user_id' => auth()->id(),
                'tel' => auth()->user()->tel,
                'address_address' => 'auth()->user()->address_address',
                'status' => 'inactive',
                'published' => 0
            ]);
        }

        Product::removeProductImages($unpublished);

        return $unpublished;
    }

    public function create($category_id)
    {
        $product = $this->getUnpublishedProduct();
        Product::removeProductImages($product);

        if ( ! auth()->id() === $product->user_id)
            abort('403', 'You are not allowed to edit this product');

        $category = Category::findOrFail($category_id)->load('fields');
        $fields = $category->fields;

        return view('front.pages.user.product-create-form', [
            'category' => $category,
            'product' => $product,
            'fields' => $fields
        ]);
    }

    public function startCreation()
    {
        return view('front.pages.user.select-category');
    }

    public function edit($product)
    {
        $product = Product::findOrFail($product);

        if ( ! auth()->id() === $product->user_id)
            abort('403', 'You are not allowed to edit this product');

        $category = Category::findOrFail($product->category->id);
        $fields = $product->fields;

        return view('front.pages.user.product-edit-form', [
            'category' => $category,
            'product' => $product,
            'fields' => $fields
        ]);
    }

    public function storeUpdate(Request $request)
    {
        $rules = [
            'title'=>'required',
//            'address_address'=>'required',
            'tel'=>'required',
//            'status'=>'required',
            'price'=>'required',
            'category_id' => 'required',
            'currency' => 'required',
            'product_id' => 'required',
            'description'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return back()->withErrors($validator->errors());

        $product = Product::findOrFail($request->input('product_id'));

        if ( ! $product->updateProduct($request))
            return false;

        if ( ! empty($request->input('images_order')))
            $this->sortImages(json_decode($request->input('images_order')));

        return redirect()->route('user.products.index');
    }

    public function dropzoneUploadProductImage(Request $request)
    {
        //        $rules = array(
        //            'file' => 'image|max:30000',
        //        );
        //
        //        $validation = Validator::make($request->file('file'), $rules);
        //
        //        if ($validation->fails())
        //            return Response::make($validation->errors->first(), 400);


        $id = Image::uploadImage($request->file('file'), $request->product_id);
        return response()->json(['success' => 200, 'id' => $id]);
    }

    public function dropzoneGetProductImages(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);
        $product->load('images');

        $images = $product->images()->orderBy('border', 'asc')->get();

        $imagesArray = [];
        foreach ($images as $image) {
            $filePath = public_path('/img/products/') . $image->resized_path;

            $imagesArray[] = [
                'name' => $image->id,
                'size' => File::size($filePath),
                'path' => '/img/products/' . $image->resized_path
            ];
        }

        return response()->json($imagesArray);
    }

    public function dropzoneDeleteProductImage(Request $request)
    {
        $id = $request->get('id');
        $image = Image::findOrFail($id);

        if (file_exists(public_path('img/products/') . $image->original_path)) {
            unlink(public_path('img/products/') . $image->original_path);
        }

        if (file_exists(public_path('img/products/') . $image->resized_path)) {
            unlink(public_path('img/products/') . $image->resized_path);
        }

        $image->delete();

        return $id;
    }

//    public function postCreateStep3(Request $request)
//    {
//
//        $validatedData = $request->validate([
//            'category_id' => 'category_id',
//            'title' => 'required',
//            'price' => 'required|numeric',
//            'tel' => 'required',
//            'description' => 'required',
//        ]);
//
//        if(empty($request->session()->get('product'))){
//            $product = new Product();
//            $product->fill($validatedData);
//            $request->session()->put('product', $product);
//        }else{
//            $product = $request->session()->get('product');
//            $product->fill($validatedData);
//            $request->session()->put('product', $product);
//        }
//
//        return redirect()->route('user.products.create-step-4');
//    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user != auth()->user())
            abort('403', 'You are not allowed to delete this product');

        Product::removeProduct($product);

        return redirect()->back()->with('success', 'Product Deleted');
    }

    public function sortImages($images_order)
    {
        foreach ($images_order as $orderData) {
            foreach ($orderData as $obj) {
                $img = Image::find($obj->id);
                $img->border = $obj->order;
                $img->save();
            }
        }
    }
}
