<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.content.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.content.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'pesan'=>'',
            'nama'=>'required',
            'email'=>'required',
            'subjek'=>''
        ]);
        $contact = new Contact();
        $contact->pesan = $validatedData['pesan'];
        $contact->nama = $validatedData['nama'];
        $contact->email = $validatedData['email'];
        $contact->subjek = $validatedData['subjek'];
        $contact->save();
        return redirect()->route('contact-user');
        // dump($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($contact){
        $result = Contact::find($contact);
        return view('admin.content.contact.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact){
        return view('admin.content.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    // public function update(Contact $contact, Request $request){
    //     $validatedData = $request->validate([
    //         'pesan'=>'',
    //         'nama'=>'required',
    //         'email'=>'required',
    //         'subjek'=>''
    //     ]);
    //     $result->pesan = $validatedData['pesan'];
    //     $result->nama = $validatedData['nama'];
    //     $result->email = $validatedData['email'];
    //     $result->subjek = $validatedData['subjek'];
    //     $result->save();
    //     return redirect()->route('contact.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return redirect()->route('contact.index')->with([
            'status' => 'delete',
            'message' => $contact->nama
        ]);
    }
}
