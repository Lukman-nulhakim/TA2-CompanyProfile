<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Client;
use App\Home;
use App\Contact;

class PagesController extends Controller
{
    public function home(){
        $home = Home::all();
        $client = Client::all();
        $contact = Contact::all();
        // dd($home[0]['logo']);
        return view('user.content.home', compact('home', 'client','contact'));
    }

    public function product(){
        $home = Home::all();
        return view('user.content.product');
    }

    public function client(){
        $home = Home::all();
        $clients = Client::all();
        return view('user.content.client', compact('clients', 'home'));
    }

    public function contact(){
        $home = Home::all();
        $contact = Contact::all();
        return view('user.content.contact', compact('contact','home'));
    }
}
