{{-- Header --}}
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="{{ route('landing-page.index') }}" class="logo">
      <h1>True Bengkel</h1>
    </a>

    {{-- Navbar --}}
    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{ url()->route('landing-page.index') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url()->route('landing-page.products.index') }}" class="{{ request()->is('products') || request()->is('products/detail/*') ? 'active' : '' }}">Products</a></li>
        <li><a href="{{ url()->route('landing-page.customer-service') }}" class="{{ request()->is('customer-service') ? 'active' : '' }}">Customer Service</a></li>
        <li><a href="{{ url()->route('landing-page.gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li>
          <div class="btn-group" role="group">
            <a href="javascript:void(0)"><i class="bi bi-search"></i></a>
            <a href="javascript:void(0)"><i class="bi bi-cart"></i></a>
          </div>
        </li>
        <li class="text-center">
          <div class="btn-group" role="group">
            <a class="btn-login" href="javascript:void(0)">Surabaya</a>
            <a class="btn-login" href="{{ route('login') }}">Login</a>
          </div>
        </li>
      </ul>
    </nav>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

  </div>
</header>