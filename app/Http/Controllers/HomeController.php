<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $allproducts = Product::latest()->get();
        $user = Auth::user();
        return view('user.home', compact('allproducts','user'));
    }
}
