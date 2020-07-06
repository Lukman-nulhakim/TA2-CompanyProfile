@extends('admin.master')
@section('title','Jenis Product')
@section('detail','active')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 md-12 lg-12">
                <div class="py-4">
                    <h1 class="text-left">Jenis Product</h1>
                    <hr>
                    <a href="{{ route('detailProduct.create') }}" class="btn btn-warning">Add Jenis Product</a>
                </div>

                @if (session()->has('pesan'))
                    <div class="alert alert-success">
                            {{ session()->get('pesan') }}
                    </div>
                @endif

                <table class="table table-bordered bg-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Jenis Product</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($detailProduct as $tampil)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tampil->jenis_product }}</td>
                                    
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('detailProduct.edit', $tampil->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('detailProduct.destroy',$tampil->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="3" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    

    
@endsection