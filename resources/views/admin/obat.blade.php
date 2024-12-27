
@extends('admin.components.layout') <!-- Menggunakan layout.blade.php yang ada di folder components -->
@section('content')
<div class="container-fluid">
    <h2>Dashboard Obat</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.obat.create') }}">
                <button class="btn btn-primary rounded">Tambah Obat</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Kemasan</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $obat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->kemasan }}</td>
                            <td>Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                            <td>
                                <!-- Link Edit -->
                                
                                <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-primary p-1">Edit</a>
                                <!-- Form Delete -->
                                
                                <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="GET" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger p-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $obats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
