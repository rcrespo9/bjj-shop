<div class="row">
  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <div class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/dashboard/home') }}">Dashboard</a>
        </li>
        @can('manage_orders')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard/orders') }}">Orders</a>
          </li>
        @endcan
        @can('manage_categories')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard/categories') }}">Categories</a>
          </li>
        @endcan
        @can('manage_products')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard/products') }}">Products</a>
          </li>
        @endcan
        @can('manage_users')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard/users') }}">Users</a>
          </li>
        @endcan
      </div>
    </div>
  </nav>

  <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1 class="h2 pt-4 mb-3">{{ $title }}</h1>
    @if (isset($action)) 
      <div class="mb-4">
        {{ $action }}
      </div> 
    @endif
    {{ $slot }}
  </div>
</div>