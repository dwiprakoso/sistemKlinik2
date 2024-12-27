{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.components.layout')  <!-- Menggunakan layout.blade.php yang ada di folder components -->
@section('content')
<div class="container-fluid">
    <h2>Dashboard Pasien</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.pasien.create') }}">
                <button class="btwn btn-primary rounded">Tambah Pasien</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No KTP</th>
                            <th>No Hp</th>
                            <th>No RM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $pasien)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->no_ktp }}</td>
                                    <td>{{ $pasien->no_hp }}</td>
                                    <td>{{ $pasien->no_rm }}</td>
                                    <td>
                                        {{-- kalau menggunakan controller, route diambil dari route list --}}
                                        <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-primary p-1">Edit</a>
                                        <form action="{{ route('admin.pasien.destroy', $pasien->id ) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger p-1">Delete</button>
                                        </form>
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
