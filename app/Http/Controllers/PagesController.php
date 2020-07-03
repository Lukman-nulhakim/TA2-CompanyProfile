<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class PagesController extends Controller
{

    public function home(){
        return view('user.content.home');
    }

    public function product(){
        return view('user.content.product');
    }

    public function client(){
        return view('user.content.client');
    }

    public function contact(){
        $contact = Contact::all();
        return view('user.content.contact');
    }
}
