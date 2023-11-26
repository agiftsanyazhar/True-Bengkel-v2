{{-- Start Sidebar --}}
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <a href="{{ route('admin.dashboard.index') }}"><h6 class="logo-text text-uppercase">True Bengkel</h6></a>
    </div>
    <div class="toggle-icon ms-auto"><ion-icon name="menu-sharp"></ion-icon>
    </div>
  </div>
  {{-- Navigation --}}
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{ route('admin.dashboard.index') }}">
          <div class="parent-icon">
              <ion-icon name='home-sharp'></ion-icon>
          </div>
          <div class="menu-title">Dashboard</div>
      </a>
    </li>

    <li class="menu-label">Master</li>
    <li>
      <a href="javascript:void(0)" class="has-arrow">
        <div class="parent-icon"><ion-icon name="clipboard-sharp"></ion-icon>
        </div>
        <div class="menu-title">Master Data</div>
      </a>
      <ul>
        <li><a href="{{ route('admin.master.master-data.brand.index') }}"><ion-icon name="ellipse-outline"></ion-icon>Brand</a></li>
        <li><a href="{{ route('admin.master.master-data.jabatan.index') }}"><ion-icon name="ellipse-outline"></ion-icon>Jabatan</a></li>
        <li><a href="{{ route('admin.master.master-data.tipe-motor.index') }}"><ion-icon name="ellipse-outline"></ion-icon>Tipe Motor</a></li>
      </ul>
    </li>
    <li>
      <a href="{{ route('admin.master.about.index') }}">
          <div class="parent-icon">
              <ion-icon name="information-circle-sharp"></ion-icon>
          </div>
          <div class="menu-title">About</div>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.master.gallery.index') }}">
          <div class="parent-icon">
              <ion-icon name="images-sharp"></ion-icon>
          </div>
          <div class="menu-title">Gallery</div>
      </a>
    </li>

    <li class="menu-label">Orders</li>
    <li>
      <a href="{{ route('admin.order.index') }}">
          <div class="parent-icon">
              <ion-icon name="receipt-sharp"></ion-icon>
          </div>
          <div class="menu-title">Order</div>
      </a>
    </li>

    <li class="menu-label">Database</li>
    <li>
      <a href="{{ route('admin.kendaraan.index') }}">
          <div class="parent-icon">
              <ion-icon name="car-sharp"></ion-icon>
          </div>
          <div class="menu-title">Kendaraan</div>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.motor.index') }}">
          <div class="parent-icon">
              <ion-icon name="bicycle-sharp"></ion-icon>
          </div>
          <div class="menu-title">Motor</div>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.spare-part.index') }}">
          <div class="parent-icon">
              <ion-icon name="cog-sharp"></ion-icon>
          </div>
          <div class="menu-title">Spare Parts</div>
      </a>
    </li>
    <li>
      <a href="javascript:void(0)" class="has-arrow">
        <div class="parent-icon"><ion-icon name="people-sharp"></ion-icon>
        </div>
        <div class="menu-title">Users</div>
      </a>
      <ul>
        <li><a href="{{ route('admin.user.all-user.index') }}"><ion-icon name="ellipse-outline"></ion-icon>All Users</a></li>
        <li><a href="{{ route('admin.user.admin.index') }}"><ion-icon name="ellipse-outline"></ion-icon>Admin</a></li>
        <li><a href="{{ route('admin.user.pegawai.index') }}"><ion-icon name="ellipse-outline"></ion-icon>Pegawai</a></li>
        <li><a href="{{ route('admin.user.pelanggan.index') }}"><ion-icon name="ellipse-outline"></ion-icon>Pelanggan</a></li>
      </ul>
    </li>
  </ul>
  {{-- End Navigation --}}
</aside>
{{-- End Sidebar --}}