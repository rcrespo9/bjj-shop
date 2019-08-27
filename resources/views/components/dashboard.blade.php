<div class="row">
  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <div class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/dashboard/home') }}">Dashboard</a>
        </li>
      </div>
    </div>
  </nav>

  <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
    {{ $slot }}
  </div>
</div>