<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\ShippingInfo;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function categoryPage($id)
    {
    $category = Category::findOrFail($id);
    $products = Product::where('product_category_id', $id)->latest();

    if (request()->has('search')) {
        $searchTerm = request('search');
        $products->where('product_name', 'like', '%' . $searchTerm . '%');
    }

    $products = $products->get();

    return view('user.category', compact('category', 'products'));
    }   

    public function singleProduct($id){
        $product = Product::findOrFail($id);
        $subcat_id = $product->product_subcategory_id;
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        $review = Rating::where('product_id', $id)->get();
        foreach ($product as $products) {
            $ratings = Rating::where('product_id', $id)->get();
            $totalStars = $ratings->sum('stars_rated');
            $averageRatings[$id] = ($ratings->count() > 0) ? $totalStars / $ratings->count() : 0;
            }
        
        return view('user.product', compact('product', 'related_products', 'review','averageRatings'));
    }

    public function submitReview(Request $request, $id){
        $user_id = Auth::id();
    
        // Check if the user has already rated the product
        $hasRated = Rating::where('product_id', $id)->where('user_id', $user_id)->exists();
    
        // If the user has not already rated the product and stars_rated is not null, create a new rating
        if(!$hasRated && $request->has('stars_rated') && $request->stars_rated !== null){
            Rating::create([
                'product_id' => $id,
                'user_id' => $user_id,
                'stars_rated' => $request->stars_rated,
                'comment' => $request->comment,
            ]);
        }
    
        return redirect()->route('singleproduct', $id);
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
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('user.shippingaddress2',compact('cart_items'));
    }

    public function addShippingAddress(Request $request){
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'email' => $request->email,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('checkout');
    }

    // public function checkout(){
    //     $user_id = Auth::id();
    //     $cart_items = Cart::where('user_id', $user_id)->get();
    //     $shipping_address = ShippingInfo::where('user_id', $user_id)->first();
        
    //     return view('user.checkout', compact('cart_items', 'shipping_address'));
    // }

    public function placeOrder(Request $request){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        // $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        foreach($cart_items as $item){
            Order::insert([
                'user_id' => $user_id,
                'shipping_phoneNumber' => $request->phone_number,
                'shipping_city' => $request->city,
                'shipping_postalCode' => $request->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        // ShippingInfo::where('user_id', $user_id)->first()->delete();
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
    public function contactUs(){
        $user_id = Auth::id();
        return view('user.contactus', compact('user_id'));
    }

    public function addToWishlist(){
        $user_id = Auth::id();
        $wishlist_items = Wishlist::where('user_id', $user_id)->get();
        return view('user.wishlist', compact('wishlist_items'));
    }

    public function addProductToWishlist(Request $request){
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        
        Wishlist::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
        ]);

        return redirect()->route('addtowishlist')->with('message', 'Your item added to wishlist succesfully!');
    }

    public function removeWishlistItem($id){
        Wishlist::findOrFail($id)->delete();
        return redirect()->route('addtowishlist')->with('message', 'Your item remove from wishlist succesfully!');
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
