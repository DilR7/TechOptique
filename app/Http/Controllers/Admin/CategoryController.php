<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function addCategory(){
        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        return redirect()->route('allcategory')->with('message', 'Category Added Succesfully!');
    }

    public function editCategory($id){
        $category_info = Category::findOrFail($id);

        return view('admin.editcategory', compact('category_info'));
    }
    
    public function updateCategory(Request $request){
        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        return redirect()->route('allcategory')->with('message', 'Category Updated Succesfully!');
    }

    public function deleteCategory($id){
    Category::findOrFail($id)->delete();

    return redirect()->route('allcategory')->with('message', 'Category Deleted Succesfully!');
    }
}
