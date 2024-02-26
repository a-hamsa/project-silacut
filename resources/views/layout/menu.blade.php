<!-- MENU BKD -->
@if($user->Id_Role == 1)
<li class="nav-item">
  <a class="nav-link {{ Request::is('dashboard') ? '':'collapsed' }}" href="{{ url('dashboard') }}">
  <i class="fa-solid fa-house"></i>
      <span>Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link {{ Request::is('datacuti') ? '':'collapsed' }}" href="{{ route('datacuti') }}">
      <i class="fa-solid fa-clipboard"></i>
      <span>Data Cuti</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link {{ Request::is('rekapancuti') ? '':'collapsed' }}" href="{{ url('rekapancuti') }}">
      <i class="fa-regular fa-file-lines"></i>
      <span>Rekapan Cuti</span>
  </a>
</li>

<!-- Komponen -->
<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#registrasi-nav" data-bs-toggle="collapse" href="{{ url('ad_pegawai') }}">
      <i class="fa-solid fa-id-card"></i><span>Komponen</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="registrasi-nav" class="nav-content collapse {{ Request::is('kelolapegawaibkd') || Request::is('kelolaopd') || Request::is('kelola_pengguna') ? 'show':'' }}" data-bs-parent="#sidebar-nav">
    <li class="nav-item mb-2">
      <a class="nav-link {{ Request::is('kelolapegawaibkd') ? 'active':'' }}"href="{{ url('kelolapegawaibkd') }}">
        <i class="bi bi-circle"></i><span>Kelola Pegawai</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a class="nav-link {{ Request::is('kelolaopd') ? 'active':'' }}"href="{{ url('kelolaopd') }}">
        <i class="bi bi-circle"></i><span>Kelola OPD</span>
      </a>
    </li>
    <li class="nav-item mb-2">
      <a class="nav-link {{ Request::is('kelola_pengguna') ? 'active':'' }}"href="{{ url('kelolapengguna') }}">
        <i class="bi bi-circle"></i><span>Kelola Pengguna</span>
      </a>
    </li>
  </ul>
</li>
<!-- Komponen -->


<!-- Logout -->
<li class="nav-item">
<a class="nav-link "  href="{{ url('logout') }}">
    <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span>
</a>
</li>

<!-- MENU OPD -->
@elseif ($user->Id_Role == 2)
<li class="nav-item">
  <a class="nav-link {{ Request::is('dashboard') ? '':'collapsed' }}" href="{{ url('dashboard') }}">
  <i class="fa-solid fa-house"></i>
      <span>Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link {{ Request::is('data_cuti') ? '':'collapsed' }}" href="{{ url('data_cuti') }}">
      <i class="fa-solid fa-clipboard"></i>
      <span>Data Cuti</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link {{ Request::is('addpegawai') ? '':'collapsed' }}" href="{{ url('opd/kelolapegawai') }}">
      <i class="fa-solid fa-address-card"></i>
      <span>Kelola Pegawai</span>
  </a>
</li>

<!-- Logout -->
<li class="nav-item" style="margin-top: 416px;">
  <a class="nav-link "  href="{{ url('logout') }}">
      <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span>
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

<!-- Logout -->
<li class="nav-item" style="margin-top: 416px;">
  <a class="nav-link "  href="{{ url('logout') }}">
      <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span>
  </a>
</li>
@endif