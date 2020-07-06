<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Client;
use App\Home;
use App\Contact;
use App\Product;
use App\DetailProduct;

class PagesController extends Controller
{
    public function home(){
        $home = Home::orderByDesc('id')->paginate(1);
        $client = Client::all();
        $contact = Contact::all();
        $product = Product::all();
        $detailProduct = DetailProduct::all();
        return view('user.content.home', compact('home', 'client','contact','product','detailProduct'));
    }

    public function product(){
        $home = Home::orderByDesc('id')->paginate(1);
        $product = Product::all();
        $detailProduct = DetailProduct::all();
        return view('user.content.product', compact('product','detailProduct','home'));
    }
    
    

    public function client(){
        $home = Home::orderByDesc('id')->paginate(1);
        $clients = Client::all();
        return view('user.content.client', compact('clients', 'home'));
    }

    public function contact(){
        $home = Home::orderByDesc('id')->paginate(1);
        $contact = Contact::all();
        return view('user.content.contact', compact('contact','home'));
    }
}
