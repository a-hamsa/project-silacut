<!-- MENU BKD -->
@if($user->Id_Role == 1)
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('dashboardbkd') ? '':'collapsed' }}" href="{{ url('dashboardbkd') }}">
    <div class="d-flex align-items-center">
      <i class="p-2 fa-solid fa-house"></i>
      <span class="ms-2">Dashboard</span>
    </div>
  </a>
</li>
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('datacutibkd') ? '':'collapsed' }}" href="{{ route('datacutibkd') }}">
    <div class="d-flex align-items-center">
      <i class="p-2 fa-solid fa-clipboard"></i>
      <span class="ms-2">&nbspData Cuti</span>
    </div>
  </a>
</li>

<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('rekapancuti') ? '':'collapsed' }}" href="{{ url('rekapancuti') }}">
    <div class="d-flex align-items-center">
      <i class="p-2 fa-regular fa-file-lines"></i>
      <span class="ms-2">&nbspRekapan Cuti</span>
    </div>
  </a>
</li>

<!-- Komponen -->
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link collapsed" data-bs-target="#registrasi-nav" data-bs-toggle="collapse" href="{{ url('ad_pegawai') }}">
      <i class="fa-solid fa-id-card"></i><span>Komponen</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="registrasi-nav" class="nav-content collapse {{ Request::is('kelolapegawaibkd') || Request::is('kelolaopd') || Request::is('kelolapengguna') ? 'show':'' }}" data-bs-parent="#sidebar-nav">
    <li class="nav-item w-100 d-flex flex-column mb-2">
      <a class="w-100 nav-link {{ Request::is('kelolapegawaibkd') ? 'active':'' }}"href="{{ url('kelolapegawaibkd') }}">
        <i class="bi bi-circle"></i><span>Kelola Pegawai</span>
      </a>
    </li>
    <li class="nav-item w-100 d-flex flex-column mb-2">
      <a class="w-100 nav-link {{ Request::is('kelolaopd') ? 'active':'' }}"href="{{ url('kelolaopd') }}">
        <i class="bi bi-circle"></i><span>Kelola OPD</span>
      </a>
    </li>
    <li class="nav-item w-100 d-flex flex-column mb-2">
      <a class="w-100 nav-link {{ Request::is('kelolapengguna') ? 'active':'' }}"href="{{ url('kelolapengguna') }}">
        <i class="bi bi-circle"></i><span>Kelola Pengguna</span>
      </a>
    </li>
  </ul>
</li>
<!-- Komponen -->

<!-- MENU OPD -->
@elseif ($user->Id_Role == 2)
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('dashboardopd') ? 'active':'collapsed' }}" href="{{ url('dashboardopd') }}">
    <div class="d-flex align-items-center">
      <i class="fa-solid fa-house p-2"></i>
      <span class="ms-2">Dashboard</span>
    </div>
  </a>
  <a class="w-100 nav-link {{ Request::is('datacutiopd') ? 'active':'collapsed' }}" href="{{ url('datacutiopd') }}">
    <div class="d-flex align-items-center">
      <i class="fa-solid fa-clipboard p-2">&ensp;</i>
      <span class="ms-2">Data Cuti</span>
    </div>
  </a>
  <a class="w-100 nav-link {{ Request::is('kelolapegawaiopd') ? 'active':'collapsed' }}" href="{{ url('kelolapegawaiopd') }}">
    <div class="d-flex align-items-center">
      <i class="fa-solid fa-address-card p-2"></i>
      <span class="ms-2">Kelola Pegawai</span>
    </div>
  </a>
</li>


<!-- MENU SUPERADMIN -->
@elseif ($user->Id_Role == 3)
<li class="nav-item">
  <a class="nav-link {{ Request::is('dashboard') ? '':'collapsed' }}" href="{{ url('dashboard') }}">
  <i class="fa-solid fa-house"></i>
      <span>Dashboard</span>
  </a>
</li>

@endif