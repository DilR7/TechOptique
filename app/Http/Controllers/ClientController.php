<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ClientController extends Controller
{
    public function categoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::Where('product_category_id', $id)->latest()->get();
        return view('user.category', compact('category', 'products'));
    }

    public function singleProduct(){
        return view('user.product');
    }
    
    public function addToCart(){
        return view('user.addtocart');
    }

    public function checkout(){
        return view('user.checkout');
    }

    public function userProfile(){
        return view('user.userprofile');
    }

    public function newRelease(){
        return view('user.newrelease');
    }
    public function todaysDeal(){
        return view('user.todaysdeal');
    }
    public function customerService(){
        return view('user.customerservice');
    }
}
