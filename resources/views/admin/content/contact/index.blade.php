@extends('admin.master')
@section('title','contact')
@section('contact','active')
@section('content')
    
<div class="content-wrapper">
    <div class="container">
        {{-- Isi Content --}}
        <h1>ini halaman contact</h1>
        <div class="panel-heading">
            <h1 style="text-align: center"><b><u>LIST CONTACT</u></b></h1>
        </div>
        <div class="panel-body"><br>
            {{-- <div class="py-4 d-flex justify-content-end align-items-center">
                <a href="{{ url('admin/contact/create') }}" class="btn btn-primary"><i class="fa fa-share-square-o"></i> Add Data</a>
            </div> --}}
                @if (session()->has('pesan'))
                    <div class="alert alert-succes" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover" id="provinsi">
                    <thead>
                        <tr bgcolor="#f2f2f2">
                            <th>Pesan</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->pesan}}</td>
                                <td>{{ $contact->nama }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subjek }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        {{-- <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a> --}}
                                            <form action="{{ route('contact.destroy', $contact->id) }}" method="post" class="d-inline-block">
                                                @method('delete')
                                                    @csrf
                                                        <button type="submit" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                            </form>
                                    </div>
                                </td>
                            </tr>                        
                            @empty
                                <td colspan="5" class="text-center">Empty Data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection