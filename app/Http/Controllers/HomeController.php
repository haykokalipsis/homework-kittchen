<?php

namespace App\Http\Controllers;

use App\Category;
use App\Favourite;
use App\Image;
use App\Product;
use App\User;
use DB;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(['auth', 'verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        $allCategories = Category::where('parent_id', null)
//            ->with(['sections'])
//            ->get();
//
//        $topCategories = collect([
//            $allCategories[0],
//            $allCategories[1],
//            $allCategories[2],
//            $allCategories[3]
//        ]);

        return view('front.pages.home.index');
    }
    
    public function category($id)
    {
        $allCategories = Category::where('parent_id', null)
            ->with(['sections'])
            ->get();

        $current_category = $allCategories->find($id);
        $sections = $current_category->sections->pluck('id');
        $products = Product::whereIn('category_id', $sections)->get();

        return view('front.pages.home.category', compact(['current_category', 'products']));
    } 
    
    public function section($id)
    {
        $current_section = Category::find($id);
        $products = Product::where('category_id', $id)->with('pattributes')->get();

//        foreach ($products as $key => $product) {
//            foreach ($product->attributes as $attr) {
////                echo "<pre>";
////                dump($attr);
////                echo "</pre>";
//                $product->setAttribute($attr->title, $attr->value);
//            }
//        }


//        $products[0]->setAttribute('asdasd', 'sadasd');
//        dd($products[0]);

        return view('front.pages.home.section', compact(['current_section','products']));
    }
    
    public function product($id)
    {
//        $product = Product::find($id)
//            ->with(['pattributes', 'images', 'lastImage'])
//            ->first();
//
//        dump($product->images); // вернёт коллекцию из одного айтема, из за ->first()

        $product = Product::find($id);
        $product->load(['fields', 'images', 'lastImage']);

        // Лучше так, методом load, потому что если пользовать with,
        // то надо будет потом прибавить ->first и в итоге при $product->images вернёт только 1 итем в коллекции

//        Or (No wastefulness)
        $isFavourite = auth()->user()
            ->favouriteProducts()
            ->where('products.id', $product->id)
            ->exists();

        return view('front.pages.home.product', compact(['product', 'isFavourite']));
    }

}
