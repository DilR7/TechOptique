<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('admin.allproduct', compact('products'));
    }

    public function addProduct(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.addproduct', compact('categories','subcategories'));
    }

    public function storeProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$image_name);
        $image_url = 'upload/' . $image_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $image_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ','-', $request->product_name))
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproducts')->with('message', 'Product Added Succesfully!');
    }

    public function editProduct($id){
        $product_info = Product::findOrFail($id);

        return view('admin.editproduct', compact('product_info'));
    }

    public function updateProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ]);

        $productid = $request->id;
        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$image_name);
        $image_url = 'upload/' . $image_name;

        Product::findOrFail($productid)->update([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ','-', $request->product_name)),
            'product_img' => $image_url
        ]);

        return redirect()->route('allproducts')->with('message', 'Product Information Updated Succesfully!');
    }

    public function deleteProduct($id){
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcat_id)->decrement('product_count', 1);
       
         
        return redirect()->route('allproducts')->with('message', 'Product Deleted Succesfully!');
    }

    public function getSubcategories($categoryId)
    {
    $subcategories = Subcategory::where('category_id', $categoryId)->get();
    return response()->json($subcategories);
    }   
}
