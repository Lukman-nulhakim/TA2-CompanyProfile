<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.home.index', [
            'data' => Home::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validates = $request->validate([
            'title' => 'required',
            'img_title' => 'file|image|max:2048',
            'logo' => 'file|image|max:2048',
        ]);
        $validates['img_title'] = $request->file('img_title')->store('assets/img_jumbo', 'public');
        $validates['logo'] = $request->file('logo')->store('assets/logo', 'public');
        Home::create($validates);
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        $validates = $request->validate([
            'title' => 'required',
            'img_title' => 'file|image|max:2048',
            'logo' => 'file|image|max:2048',
        ]);
        if (!empty($validates['img_title'])) {
            Storage::delete('public/'. $home->img_title);
            $validates['img_title'] = $request->file('img_title')->store('assets/img_jumbo', 'public');
        }
        if (!empty($validates['logo'])) {
            Storage::delete('public/'. $home->logo);
            $validates['logo'] = $request->file('logo')->store('assets/logo', 'public');
        }
        $home->update($validates);
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        Storage::delete('public/'. $home->img_title);
        Storage::delete('public/'. $home->logo);
        $home->delete();
        return redirect()->route('home.index');
    }
}
