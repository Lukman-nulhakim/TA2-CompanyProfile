@extends('admin.master')
@section('title','client')
@section('client','active')
@section('content')

{{-- Content wrapper --}}
<div class="content-wrapper">
    {{-- Container --}}
    <div class="container-fluid">
        <div class="row pt-3">
            <div class="col-12 d-flex justify-content-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_client">
                    <i class="fas fa-plus"></i> Add Clients
                </button>
            </div>
        </div>
                
        <!-- Modal Create-->
        <div class="modal fade" id="create_client" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Clients</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Client</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="foto">Foto Clients</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        {{-- footer modal --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>      
        </div>
        {{-- end Modal Create --}}
            
        {{-- Card --}}
        <div class="card bg-light my-3">
            <div class="card-header bg-dark py-2">
                <div class="row py-2 text-center">
                    <div class="col-md-12">
                        <h1 class="font-italic">Our Clients</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse ($clients as $client)
                        <div class="col-md-4 py-2 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ Storage::url($client->foto) }}" alt="" style="height: 200px">
                                {{-- Card Body --}}
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $client->nama }}</h5>
                                    <p class="card-text">{{ $client->alamat }}</p>
                                    {{-- button --}}
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-2 mr-2">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#edit_client{{ $loop->iteration }}">
                                            <i class="fa-1x fas fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-2">
                                            <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fa-1x fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- end Button --}}
                                </div>
                                {{-- End Card Body --}}
                            </div>
                        </div>
                        
                    <!-- Modal Edit-->
                    <div class="modal fade" id="edit_client{{ $loop->iteration }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Clients</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('client.update',  $client->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama Client</label>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $client->nama }}">
                                                    @error('nama')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') ?? $client->alamat }}</textarea>
                                                    @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="foto">Foto Clients</label>
                                                    <img src="{{ Storage::url($client->foto) }}" alt="" style="height: 100px">
                                                    <input type="file" class="form-control" id="foto" name="foto">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    {{-- footer modal --}}
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>      
                    </div>
                    {{-- end Modal Edit --}}
                    @empty
                    <h1 class="text-center">Belum ada client</h1>
                    @endforelse
                </div>
            </div>
        </div>
        {{-- end Card --}}

        
    </div>
    {{-- end Container --}}
</div>
{{-- end content-wrapper --}}
    
@endsection