{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.components.layout')  <!-- Menggunakan layout.blade.php yang ada di folder components -->
@section('content')
<div class="container-fluid">
    <h2>Dashboard Poli</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.poli.create') }}">
                <button class="btwn btn-primary rounded">Tambah Poli</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Poli</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($polis as $poli)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $poli->nama_poli}}</td>
                                    <td>{{ $poli->keterangan }}</td>
                                    <td>
                                        {{-- kalau menggunakan controller, route diambil dari route list --}}
                                        <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-primary p-1">Edit</a>
                                        <form action="{{ route('admin.poli.destroy', $poli->id ) }}" method="POST" style="display:inline;">
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
