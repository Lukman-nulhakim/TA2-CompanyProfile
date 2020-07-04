<?php

namespace App\Http\Controllers;

use App\DetailProduct;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailProduct = DetailProduct::all();
        return view('admin.content.detail.index',compact('detailProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'jenis_product' => 'required|unique:detail_products'
        ]);
        DetailProduct::create($validatedData);
        return redirect()->route('detailProduct.index')->with('pesan',"$request->jenis_product berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProduct $detailProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProduct $detailProduct)
    {
        return view('admin.content.detail.edit', compact('detailProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailProduct $detailProduct)
    {
        $validatedData =$request->validate([
            'jenis_product' => 'required|unique:detail_products,jenis_product'
        ]);
        $detailProduct->update($validatedData);
        return redirect()->route('detailProduct.index')->with('pesan',"Jenis $detailProduct->jenis_product berhasil diupdate ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProduct $detailProduct)
    {
        $detailProduct->delete();
        return redirect()->route('detailProduct.index')->with('pesan',"Jenis $detailProduct->jenis_product berhasil diupdate ");
    }
}
