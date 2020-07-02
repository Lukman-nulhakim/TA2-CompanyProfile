<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Client;

class PagesController extends Controller
{

    public function home(){
        return view('user.content.home');
    }

    public function product(){
        return view('user.content.product');
    }

    public function client(){
        $clients = Client::all();
        return view('user.content.client', compact('clients'));
    }

    public function contact(){
        return view('user.content.contact');
    }
}
