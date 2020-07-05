@extends('admin.master')
@section('title','Create')
@section('detail','active')
@section('content')

<div class="content-wrapper">
    <div class="container bg-dark mt-5 mb-5" style="width: 30%">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Jenis Product</h2>
                <hr>
                <form action="{{ route('detailProduct.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_product">Jenis Product</label>
                        <select class="custom-select" name="jenis_product" id="jenis_product">
                            <option value="Interior" {{ old('jenis_product') == 'Interior' ? 'selected' : ''}}>
                                Interior
                            </option>
                            <option value="Recent" {{ old('jenis_product') == 'Recent' ? 'selected' : ''}}>
                                Recent
                            </option>
                            <option value="Big Building" {{ old('jenis_product') == 'Big Building' ? 'selected' : ''}}>
                                Big Building
                            </option>
                            <option value="Park" {{ old('jenis_product') == 'Park' ? 'selected' : ''}}>
                                Park
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning mb-3">Save</button>
                </form>
            </div>
        </div>
    </div>
    

</div>

    
@endsection