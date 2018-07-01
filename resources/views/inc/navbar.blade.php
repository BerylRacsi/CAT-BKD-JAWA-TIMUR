<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-header">                 
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" >
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">About Us</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                           
                        @else
                        <li class="nav-item">
                            <span class="navbar-text" style="font-weight: bold;">
                                Welcome, {{ Auth::user()->name }}
                            </span>
                        </li>
                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-user"></i>
                                </a>   

                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li>
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>