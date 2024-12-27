{{-- resources/views/admin/dashboard.blade.php --}}
@extends('dokter.components.layout')  <!-- Menggunakan layout.blade.php yang ada di folder components -->
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Periksa</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dokter.jadwal.create') }}">
                <button class="btwn btn-primary rounded">Tambah Jadwal</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration  }}</td>
                        <td>{{ $jadwal->dokter->nama }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->jam_mulai }}</td>
                        <td>{{ $jadwal->jam_selesai }}</td>
                        <td>{{ $jadwal->status }}</td> <!-- Menampilkan status -->

                        <td>
                            <a href="{{ route('dokter.jadwal.edit', $jadwal->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
