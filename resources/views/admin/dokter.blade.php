{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.components.layout')  <!-- Menggunakan layout.blade.php yang ada di folder components -->
@section('content')
<div class="container-fluid">
    <h2>Dashboard Dokter</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.dokter.create') }}">
                <button class="btwn btn-primary rounded">Tambah Dokter</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Poli</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokters as $dokter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->alamat }}</td>
                            <td>{{ $dokter->no_hp }}</td>
                            {{-- <td>{{ $dokter->id_poli }}</td> --}}
                            <td>{{ $dokter->poli->nama_poli ?? 'Poli tidak ditemukan' }}</td>
                            <td>
                                {{-- kalau menggunakan controller, route diambil dari route list --}}
                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.dokter.destroy', $dokter->id ) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
