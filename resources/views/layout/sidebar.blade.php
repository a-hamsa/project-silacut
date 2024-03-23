<aside class="main-sidebar sidebar-white-primary elevation-4 d-flex flex-column h-100 pb-4">
  <a href="./" class="brand-link text-decoration-none">
    <img src="assets/img/silacut.png" alt="Logo" class="img-fluid">
  </a>
  <div class="sidebar text-white d-flex flex-column h-100">
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar" style="font-size: 18px;" data-widget="treeview" role="menu" data-accordion="false">
        @include('layout.menu')
      </ul>
      <hr>
    </nav>
    <!-- Logout link outside the nav element -->
    <div class="justify-content-end mt-auto px-1">
      <a href="{{ url('logout') }}" class="btn w-100 d-block text-black" style="background: gray;">
        <div class="row align-items-center">
          <div class="col-auto">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </div>
          <div class="col text-start">
            <span>Logout</span>
          </div>
        </div>
      </a>
    </div>
  </div>
</aside>
