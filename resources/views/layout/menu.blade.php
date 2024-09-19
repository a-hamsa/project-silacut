<!-- MENU BKD -->
@if($user->Id_Role == 1)
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('dashboardbkd') ? 'bg-secondary-subtle':'' }}" href="{{ url('dashboardbkd') }}">
    <div class="d-flex align-items-center">
      <i class="text-primary p-2 fa-solid fa-house"></i>
      <span class="ms-2">Dashboard</span>
    </div>
  </a>
</li>
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('datacutibkd') ? 'bg-secondary-subtle':'' }}" href="{{ route('datacutibkd') }}">
    <div class="d-flex align-items-center">
      <i class="text-info p-2 fa-solid fa-clipboard"></i>
      <span class="ms-2">&nbspData Cuti</span>
    </div>
  </a>
</li>

<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('rekapancuti') ? 'bg-secondary-subtle':'' }}" href="{{ url('rekapancuti') }}">
    <div class="d-flex align-items-center">
      <i class="text-danger p-2 fa-regular fa-file-lines"></i>
      <span class="ms-2">&nbspRekapan Cuti</span>
    </div>
  </a>
</li>

<!-- Komponen -->
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link collapsed" data-bs-target="#registrasi-nav" data-bs-toggle="collapse" href="{{ url('ad_pegawai') }}">
    <div class="d-flex align-items-center">
      <i class="text-danger-emphasis p-2 fa-solid fa-id-card"></i>
      <span class="ms-2">Komponen</span>
      <i class="bi bi-chevron-down ms-auto"></i>
    </div>    
  </a>
  <ul id="registrasi-nav" class="nav-content collapse {{ Request::is('kelolapegawaibkd') || Request::is('kelolaopd') || Request::is('kelolapengguna') ? 'show':'' }}" data-bs-parent="#sidebar-nav">
    <li class="nav-item w-100 d-flex flex-column mb-2">
      <a class="w-100 nav-link {{ Request::is('kelolapegawaibkd') ? 'bg-secondary-subtle':'' }}"href="{{ url('kelolapegawaibkd') }}">
        <div class="d-flex align-items-center">
          <i class="text-danger-emphasis p-2 fa-regular fa-address-card"></i>
          <span class="ms-2">Kelola Pegawai</span>
        </div>  
      </a>
    </li>
    <li class="nav-item w-100 d-flex flex-column mb-2">
      <a class="w-100 nav-link {{ Request::is('kelolaopd') ? 'bg-secondary-subtle':'' }}"href="{{ url('kelolaopd') }}">
        <i class="text-danger-emphasis p-2 fa-solid fa-address-book"></i>
        <span class="ms-2">Kelola OPD</span>
      </a>
    </li>
    <li class="nav-item w-100 d-flex flex-column mb-2">
      <a class="w-100 nav-link {{ Request::is('kelolapengguna') ? 'bg-secondary-subtle':'' }}"href="{{ url('kelolapengguna') }}">
        <i class="text-danger-emphasis p-2 fa-solid fa-users"></i>
        <span class="ms-2">Kelola Pengguna</span>
      </a>
    </li>
  </ul>
</li>
<!-- Komponen -->

<!-- MENU OPD -->
@elseif ($user->Id_Role == 2)
<li class="nav-item w-100 d-flex flex-column">
  <a class="w-100 nav-link {{ Request::is('dashboardopd') ? 'bg-secondary-subtle':'collapsed' }}" href="{{ url('dashboardopd') }}">
    <div class="d-flex align-items-center">
      <i class="text-primary fa-solid fa-house p-2"></i>
      <span class="ms-2">Dashboard</span>
    </div>
  </a>
  <a class="w-100 nav-link {{ Request::is('datacutiopd') ? 'bg-secondary-subtle':'collapsed' }}" href="{{ url('datacutiopd') }}">
    <div class="d-flex align-items-center">
      <i class="text-info fa-solid fa-clipboard p-2">&ensp;</i>
      <span class="ms-2">Data Cuti</span>
    </div>
  </a>
  <a class="w-100 nav-link {{ Request::is('kelolapegawaiopd') ? 'bg-secondary-subtle':'collapsed' }}" href="{{ url('kelolapegawaiopd') }}">
    <div class="d-flex align-items-center">
      <i class="text-danger fa-solid fa-address-card p-2"></i>
      <span class="ms-2">Kelola Pegawai</span>
    </div>
  </a>
</li>

<!-- MENU SUPERADMIN -->
@elseif ($user->Id_Role == 3)
<li class="nav-item">
  <a class="nav-link {{ Request::is('dashboard') ? 'bg-secondary-subtle':'' }}" href="{{ url('dashboard') }}">
  <i class="fa-solid fa-house"></i>
      <span>Dashboard</span>
  </a>
</li>

@endif
