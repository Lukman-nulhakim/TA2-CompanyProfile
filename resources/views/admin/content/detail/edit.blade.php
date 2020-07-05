@extends('admin.master')
@section('title','Edit')
@section('detail','active')
@section('content')
    
<div class="content-wrapper">
    <div class="container bg-dark mt-5 mb-5" style="width: 30%">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Edit Jenis Product</h2>
                <hr>
                <form action="{{ route('detailProduct.update',$detailProduct->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="jenis_product">Jenis Product</label>
                        <select class="custom-select" name="jenis_product" id="jenis_product">
                            <option value="Interior" {{ (old('jenis_product') ??$detailProduct->jenis_product) == 'Interior' ? 'selected' : ''}}>
                                Interior
                            </option>
                            <option value="Recent" {{ (old('jenis_product') ??$detailProduct->jenis_product) == 'Recent' ? 'selected' : ''}}>
                                Recent
                            </option>
                            <option value="Big Building" {{ (old('jenis_product') ??$detailProduct->jenis_product)== 'Big Building' ? 'selected' : ''}}>
                                Big Building
                            </option>
                            <option value="Park" {{ (old('jenis_product') ??$detailProduct->jenis_product) == 'Park' ? 'selected' : ''}}>
                                Park
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning mb-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection