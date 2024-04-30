<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function categoryPage(){
        return view('user.category');
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
