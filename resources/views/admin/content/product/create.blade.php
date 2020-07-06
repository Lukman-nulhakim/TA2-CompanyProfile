@extends('admin.master')
@section('title','edit')
@section('product','active')
@section('content')
    
<div class="content-wrapper">
    <div class="container bg-dark mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Data Product</h2>
                <hr>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Product Name</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Isi Nama Product" value="{{ old('nama') }}">
                        @error('nama')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" cols="20">{{ old ('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection