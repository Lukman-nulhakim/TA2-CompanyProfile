<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DetailProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.content.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailProduct = DetailProduct::all();
        return view('admin.content.product.create',compact('detailProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'        => 'required',
            'description' => 'required',
            'image'       => 'max:2048',
            'detail_id'   => 'required'
        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/product','public');
        
        Product::create($data);
        return redirect()->route('product.index')->with('pesan',"Data {$validatedData['nama']} berhasil ditambahkan");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $detailProduct = DetailProduct::all();
        return view('admin.content.product.edit',compact('product','detailProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'nama'        => 'required',
            'description' => 'required',
            'image'       => 'max:2048',
            'detail_id'   => 'required'
        ]);
        
        $productId = $product->find($product->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/'.$productId->image);
            $data['image'] = $request->file('image')->store('assets/product','public');
        }

        $productId->update($data);
        $productId->save();
        return redirect()->route('product.index',['product' => $productId->id])->with('pesan',"Update data {$validatedData['nama']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::delete('public/'.$product->image);
        return redirect()->route('product.index')->with('pesan',"Hapus data $product->nama Berhasil ");
    }
}
