<aside class="main-sidebar sidebar-white-primary elevation-4 d-flex flex-column h-100 pb-4">
  <a href="./" class="brand-link text-decoration-none">
    <img src="{{asset('assets/img/silacut.png')}}" alt="Logo" class="img-fluid">
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
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-secondary w-100 text-start" type="submit">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Logout
        </button>
      </form>
    </div>
  </div>
</aside>
