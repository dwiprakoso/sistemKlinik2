@extends('dokter.components.layout')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Profil</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dokter.updateProfil') }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" />
                    @error('nama') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}" />
                    @error('alamat') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="no_hp">Nomor Telepon</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}" />
                    @error('no_hp') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
