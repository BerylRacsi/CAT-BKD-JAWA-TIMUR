      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <span class="navbar-text">
          Welcome, {{Auth::user()->name}}
          </span>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item small" href="{{ url ('#') }}">
              <i class="fa fa-fw fa-gear"></i>
              Pengaturan
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" data-toggle="modal" data-target="#exampleModal" href="{{ url('#') }}">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>