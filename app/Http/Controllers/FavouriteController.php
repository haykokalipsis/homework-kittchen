<?php

namespace App\Http\Controllers;

use App\Category;
use App\Favourite;
use DB;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function get()
    {
//        $favouriteProducts = Favourite::where('user_id', auth()->id())
//            ->leftJoin('products', 'favourites.product_id', '=', 'products.id')
//            ->get();
//        "select * from `favourites` left join `products` on `wishlists`.`product_id` = `products`.`id`"

        $favouriteProducts = auth()->user()->favouriteProducts;
        return view('front.pages.user.favourites', compact(['favouriteProducts']));
    }

    public function add(Request $request)
    {
        Favourite::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ]);

        return response()->json('success');
    }

    public function delete(Request $request)
    {
//        dd($request);
        Favourite::where(['user_id' => auth()->id(), 'product_id' => $request->product_id])->delete();
//        Favourite::destroy($id);
        return response()->json('success');
    }
}
