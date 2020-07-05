<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Client;
use App\Home;
use App\Lapor;

class PagesController extends Controller
{
    public function home(){
        $home = Home::all();
        $client = Client::all();
        return view('user.content.home', compact('home', 'client'));
        // dd($home[0]['logo']);
        // return view('user.content.home', compact('home'));
    }

    public function product(){
        $home = Home::all();
        return view('user.content.product', compact('home'));
        return view('user.content.product');
    }

    public function client(){
        $clients = Client::all();
        $home = Home::all();
        return view('user.content.contact', compact('home'));
    }
}
