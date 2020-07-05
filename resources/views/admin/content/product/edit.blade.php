@extends('admin.master')
@section('title','Edit')
@section('product','active')
@section('content')
    
<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="container bg-dark mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Edit Product</h2>
                    <hr>
                    <form action="{{ route('product.update',['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Product Name</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Isi Nama Product" value="{{ old('nama') ?? $product->nama}}">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" cols="20">{{ old ('description') ?? $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <img src="{{ Storage::url($product->image) }}" alt="" style="width: 150px;">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        {{-- Jenis_product --}}
                    <div class="form-group">
                        <label for="detail_id">Jenis Product</label>
                        <select class="form-control" name="detail_id" id="detail_id">
                            @foreach ($detailProduct as $item)
                                <option value="{{ $item->id }}" {{ (old('detail_id') ??$product->detail_product->jenis_product) == $item->jenis_product ? 'selected' : '' }}>
                                    {{ $item->jenis_product }}
                                </option>
                            @endforeach
                        </select>
                        @error('detail_id')
                            {{ $message }}
                        @enderror
                    </div>

                    {{-- End Jenis_product --}}

                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


</div>
    
@endsection