<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
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

    public function removeCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your item remove from cart succesfully!');
    }

    public function getShippingAddress(){
        return view('user.shippingaddress');
    }

    public function addShippingAddress(Request $request){
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('checkout');
    }

    public function checkout(){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();
        return view('user.checkout', compact('cart_items', 'shipping_address'));
    }

    public function placeOrder(){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        foreach($cart_items as $item){
            Order::insert([
                'user_id' => $user_id,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_postalCode' => $shipping_address->postal_code,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        ShippingInfo::where('user_id', $user_id)->first()->delete();
        return redirect()->route('pendingorders')->with('message', 'Your Order Has Been Placed Succesfully!');
    }

    public function userProfile(){
        return view('user.userprofile');
    }

    public function pendingOrders(){
        $pending_orders = Order::where('status', "pending")->latest()->get();
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('user.pendingorders', compact('pending_orders', 'cart_items'));
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
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
