<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.allcategory');
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
}
