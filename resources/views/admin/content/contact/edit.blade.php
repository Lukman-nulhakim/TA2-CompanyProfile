@extends('admin.master')
@section('title','edit')
@section('contact','active')
@section('content')
    
<div class="content-wrapper">
    <div class="container">
        {{-- Isi Content --}}
        <h1 class="text-center">Edit Contact</h1>
        <hr>
        <form action="{{ route('contact.update', ['contact' => $contact->id]) }}" method="POST">
            @method('PATCH') {{-- karna update menggunakan PATCH maka perlu ditambahkan methodnya --}}
            @csrf
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" name="pesan" id="pesan" rows="3">{{ old('pesan') ?? $contact->pesan }}</textarea>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $contact->nama }}">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="on" value="{{ old('email') ?? $contact->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="subjek">Subjek</label>
                <input type="text" class="form-control @error('subjek') is-invalid @enderror" id="subjek" name="subjek" value="{{ old('subjek') ?? $contact->subjek }}">
                @error('subjek')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
        </form>
    </div>
</div>
    
@endsection