<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\DetailProduct;

class PagesController extends Controller
{

    public function home(){
        return view('user.content.home');
    }

    public function product(){
        $product = Product::all();
        $detailProduct = DetailProduct::all();
        return view('user.content.product', compact('product','detailProduct'));
    }
    
    

    public function client(){
        return view('user.content.client');
    }

    public function contact(){
        return view('user.content.contact');
    }
}
