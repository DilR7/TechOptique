<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $allproducts = Product::latest()->get();
        $products = Product::latest();
        $user = Auth::user();

        $rtc = Rating:: get();
        $averageRatings = [];
        foreach ($allproducts as $product) {
        $ratings = Rating::where('product_id', $product->id)->get();
        $totalStars = $ratings->sum('stars_rated');
        $averageRatings[$product->id] = ($ratings->count() > 0) ? $totalStars / $ratings->count() : 0;
        }

        $sortedProducts = $allproducts->sortByDesc(function ($product) use ($averageRatings) {
            return $averageRatings[$product->id];
        });
    
        $topRatedProducts = $sortedProducts->take(6);

        

    return view('user.home', compact('allproducts', 'user', 'averageRatings', 'topRatedProducts', 'rtc'));
    }

}
