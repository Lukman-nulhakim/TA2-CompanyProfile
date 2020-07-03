<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Client;
use App\Home;

class PagesController extends Controller
{

    public function home(){
        $home = Home::all();
        $client = Client::all();
        return view('user.content.home', compact('home', 'client'));
    }

    public function product(){
        $home = Home::all();
        return view('user.content.product', compact('home'));
    }

    public function client(){
        $home = Home::all();
        $clients = Client::all();
        return view('user.content.client', compact('home', 'clients'));
    }

    public function contact(){
        $home = Home::all();
        return view('user.content.contact', compact('home'));
    }
}
