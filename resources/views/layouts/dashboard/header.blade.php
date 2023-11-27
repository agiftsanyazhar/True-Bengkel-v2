{{-- Start Top Header --}}
  <header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="mobile-menu-button"><ion-icon name="menu-sharp"></ion-icon></div>
      <div class="top-navbar-right ms-auto">

      <ul class="navbar-nav align-items-center">
        <li class="nav-item dropdown dropdown-user-setting">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:void(0)" data-bs-toggle="dropdown">
            <div class="user-setting">
              <h6>Nama <img src="{{ asset('dashboard/img/unnamed.jpg') }}" class="user-img" alt=""></h6>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex flex-row align-items-center gap-2">
                  <img src="{{ asset('dashboard/img/unnamed.jpg') }}" alt="" class="rounded-circle" width="54" height="54">
                  <div>
                    <h6 class="mb-0 dropdown-user-name">Email</h6>
                    <small class="mb-0 dropdown-user-designation text-secondary">Role</small>
                  </div>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="pages-user-profile.html">
                  <div class="d-flex align-items-center">
                    <div><ion-icon name="person-outline"></ion-icon></div>
                    <div class="ms-3"><span>Profile</span></div>
                  </div>
                </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <div><ion-icon name="settings-outline"></ion-icon></div>
                  <div class="ms-3"><span>Setting</span></div>
                </div>
              </a>
            </li>             
            <li><hr class="dropdown-divider"></li>
            <li>
              <form id="formLogOut" action="{{ route('logout') }}" method="POST">
                @csrf
              </form>
              <a class="dropdown-item" href="" onclick="event.preventDefault(); getElementById('formLogOut').submit();">
                <div class="d-flex align-items-center">
                  <div><ion-icon name="log-out-outline"></ion-icon></div>
                  <div class="ms-3"><span>Logout</span></div>
                </div>
              </a>
            </li>
          </ul>
        </li>

        </ul>

      </div>
    </nav>
  </header>
{{-- End Top Header --}}