<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function categoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::Where('product_category_id', $id)->latest()->get();
        return view('user.category', compact('category', 'products'));
    }

    public function singleProduct($id){
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user.product', compact('product', 'related_products'));
    }
    
    public function addToCart(){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('user.addtocart', compact('cart_items'));
    }
    public function addProductToCart(Request $request){
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
        ]);

        return redirect()->route('addtocart')->with('message', 'Your item added to cart succesfully!');
    }

    public function checkout(){
        return view('user.checkout');
    }

    public function userProfile(){
        return view('user.userprofile');
    }

    public function pendingOrders(){
        return view('user.pendingorders');
    }

    public function history(){
        return view('user.history');
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
