@extends('pasien.components.layout')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Poli</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dokter.updateProfil') }}" method="POST">
                @csrf
                @method('POST')
            
                <div class="mb-3">
                    <label for="nama">No RM</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->no_rm }}" readonly/>
                    @error('nama') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                <div class="mb-3">
                    <label for="nama">Pilih Poli</label>
                    <div class="mb-3">
                        <select name="id_poli" id="id_poli" class="form-control">
                            <option value="">-- Pilih Poli --</option>
                            {{-- @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    @error('nama') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="alamat">Pilih Jadwal</label>
                    <select name="id_poli" id="id_poli" class="form-control">
                        <option value="">-- Pilih Jadwal --</option>
                        {{-- @foreach ($polis as $poli)
                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                        @endforeach --}}
                    </select>
                    @error('alamat') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="no_hp">Keluhan</label>
                    <textarea name="keluhan" id="" cols="30" rows="10" class="form-control"></textarea>
                    {{-- <input type="text-area" name="no_hp" class="form-control" /> --}}
                    @error('no_hp') <span class="text-danger">{{ $message }} </span> @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
