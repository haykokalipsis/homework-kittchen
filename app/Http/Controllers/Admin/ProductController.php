<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use App\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function Sodium\add;

class ProductController extends Controller
{

    public function __construct()
    {
//        $this->photos_path = public_path('/img/products/'. date("Y/m") .'/');
//
//        if( ! File::exists($this->photos_path))
//            File::makeDirectory($this->photos_path, 0777, true);

//        if( ! File::exists($this->thumbnail_photos_path))
//            File::makeDirectory($this->thumbnail_photos_path, 0777, true);
    }

    public function index()
    {
        $products = Product::with(['category', 'lastImage'])
            ->paginate(10);

        return view('admin.pages.products.index', compact('products'));
    }

    public function sectionProducts($section_id)
    {
        $section = Category::findOrFail($section_id);

        $products = $section
            ->products()
            ->with(['mainImage', 'fields'])
            ->paginate(10);

    //     foreach ($products as $key => $product) {
    //         foreach ($product->attributes as $attr) {
    // //                echo "<pre>";
    // //                dump($attr);
    // //                echo "</pre>";
    //             $product->setAttribute($attr->title, $attr->value);
    //         }
    //     }


        // $products[0]->setAttribute('asdasd', 'sadasd');
        // dd($products[0]);

        return view('admin.pages.products.section-products', compact(['products', 'section']));
    }

    public function create()
    {
        $categories = Category::with(['fields'])
            ->where('parent_id', null)
            ->get();

        return view('admin.pages.products.new', compact('categories'));
    }

    public function stores(Request $request)
    {
//        dd($request->input('additional_fields'));
        $additionalFields = request()->input('additional_fields');
        $additionalFields[] = 'image';
        $additionalFields[] = 'additional_fields';

        $this->validate($request,[
            'title' => 'required',
            'tel' => 'required',
            'status' => 'required',
            'currency' => 'required',
            'price' => 'numeric',
            'category' => 'numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000'
        ]);

        $formInput=$request->except($additionalFields);

        if($request->file('image')) {
            $image = $request->file('image');
            if($image->isValid()){
                $filename = str_random(10);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $smallThumbnail = $filename.'_small_'.time().'.'.$extension;

                $large_image_path= $this->photos_path . $fileNameToStore;
                $small_image_path=$this->photos_path . $smallThumbnail;

                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $formInput['img']=$fileNameToStore;
                $formInput['resized']=$smallThumbnail;
            }
        }

        $product = Product::create($formInput);



        foreach (request()->input('additional_fields') as $fieldName) {
            $productAttributes = new Attribute;
            $productAttributes->product_id = $product->id;
            $productAttributes->title = $fieldName;
            $productAttributes->value = $request->input($fieldName);
            $productAttributes->save();
        }





        return redirect()->route('product.create')->with('message','Add Products Successfully!');
    }

    // Admin store product
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'address_address'=>'required',
            'tel' => 'required',
            'status' => 'required',
            'price' => 'numeric',
            'category_id' => 'required',
            'currency' => 'required',
            'description' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:png,jpg,jpeg,bmp|max:110000',
        ]);

        if ( ! $product = Product::add($request))
            return false;

        if ($request->hasFile('image'))
            Image::uploadImages($request->file('image'), $product->id);

        return redirect()
            ->route('products.index')
            ->with('success', 'Item created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.pages.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

//        if ($product->user != Auth::user())
//            abort('403', 'You are not allowed to delete this product');

        $images = $product->images;

        foreach ($images as $image) {
            if (File::isFile(public_path('img/products/') . $image->original_path)) {
                File::delete(public_path('img/products/') . $image->original_path);
            }

            if (File::isFile(public_path('img/products/') . $image->resized_path)) {
                File::delete(public_path('img/products/') . $image->resized_path);
            }
        }

        $product->images()->delete();
        $product->delete();

        return redirect()->back()->with('success', 'Product Deleted');
    }
}
