@extends('dokter.components.layout')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Jadwal</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dokter.jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select name="hari" class="form-control" required>
                        <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
                </div>
                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Non-Aktif" {{ $jadwal->status == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                        <option value="Aktif" {{ $jadwal->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Jadwal</button>
            </form>
        </div>
    </div>
</div>
@endsection
