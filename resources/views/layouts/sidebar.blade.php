<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Pengaduan Masyarakat</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown {{ Route::is('admin-dashboard') ? 'active' : '' }}">
            @if (Auth::guard('admin')->user()->role == 'admin')
              <a href="{{ route('admin-dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            @endif
            @if (Auth::guard('admin')->user()->role == 'petugas')
            <a href="{{ route('petugas-dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            @endif
          </li>
          <li class="menu-header">Data</li>
          <li class="nav-item dropdown {{ Route::is(['masyarakat.index', 'masyarakat.edit', 'masyarakat.create', 'petugas.index', 'petugas.create', 'petugas.edit', 'pengaduan.index', 'pengaduan-petugas.index']) ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Data</span></a>
            <ul class="dropdown-menu">
              @if (Auth::guard('admin')->user()->role == 'admin')
                <li class="{{ Route::is(['masyarakat.index', 'masyarakat.edit', 'masyarakat.create']) ? 'active' : '' }}"><a class="nav-link" href="{{ route('masyarakat.index') }}">Data Masyarakat</a></li>
                <li class="{{ Route::is(['petugas.index', 'petugas.edit', 'petugas.create']) ? 'active' : '' }}"><a class="nav-link" href="{{ route('petugas.index') }}">Data Petugas</a></li>
                <li class="{{ Route::is(['pengaduan.index']) ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengaduan.index') }}">Data Pengaduan</a></li>
              @endif
              @if (Auth::guard('admin')->user()->role == 'petugas')
              <li class="{{ Route::is(['pengaduan-petugas.index']) ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengaduan-petugas.index') }}">Data Pengaduan</a></li>
              @endif
              
            </ul>
          </li>
          <li class="menu-header">Starter</li>
          <li>
            <a class="nav-link" href="#"><i class="far fa-square">
              </i> <span>Pengaduan</span>
            </a>
          </li>
          <li>
            <a class="nav-link" href="#"><i class="far fa-square">
              </i> <span>Blank Page</span>
            </a>
          </li>

      </ul>
    </aside>
  </div>