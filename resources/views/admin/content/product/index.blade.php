@extends('admin.master')
@section('title','Product')
@section('product','active')
@section('content')
    
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 md-12 lg-12">
                <div class="py-4">
                    <h1 class="text-left">Data Of Product</h1>
                    <hr>
                    <a href="{{ route('product.create') }}" class="btn btn-warning">Add Product</a>
                </div>

                @if (session()->has('pesan'))
                    <div class="alert alert-success">
                        {{ session()->get('pesan') }}
                    </div> 
                @endif

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name of Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Jenis Product</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($product as $tampil)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $tampil->nama }}</td>
                              <td>{{ $tampil->description }}</td>
                              <td>
                                  <img src="{{ Storage::url($tampil->image) }}" alt="" style="width:150px;">
                              </td>
                              <td>{{ $tampil->detail_product->jenis_product }}</td>
                              <td>
                                  <div class="d-flex">
                                      <a href="{{ route('product.edit',['product' =>$tampil->id]) }}" class="btn btn-warning">Edit</a>
                                      <form action="{{ route('product.destroy', ['product' =>$tampil->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger ml-1">Delete</button>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                      @empty
                          <td colspan="5" class="text-center">Data Kosong</td>
                      @endforelse
                    </tbody>
                  </table>

            </div>
        </div>
    </div>

</div>
    
@endsection