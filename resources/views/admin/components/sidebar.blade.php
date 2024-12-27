<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Sitem Temu Dokter</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        {{-- {{ route('dokter.admin') }} --}}
        <a class="nav-link" href="{{ route('admin.dokter') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dokter</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        {{-- {{ route('pasien.index') }} --}}
        <a class="nav-link" href="{{ route('admin.pasien') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pasien</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        {{-- {{ route('poli.index') }} --}}
        <a class="nav-link" href="{{ route('admin.poli') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Poli</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.obat') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Obat</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <form  class="nav-link" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </li>
    

</ul>
<!-- End of Sidebar -->
