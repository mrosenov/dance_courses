<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <span class="page-title">dashboard</span>
        <div class="navbar-right ">
            <div class="search-form">
                <form action="index.html" method="get">
                    <div class="input-group input-group-sm" id="input-group-search" style="border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                        <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="button">/</button>
                        </div>
                    </div>
                </form>
                <ul class="dropdown-menu dropdown-menu-search" style="display: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Morbi leo risus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Vestibulum at eros</a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav">
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('assets/admin/img/user/user-xs-01.jpg')}}" class="user-image rounded-circle" alt="User Image">
                        <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a class="dropdown-link-item" href="user-profile.html">
                                <i class="mdi mdi-account-outline"></i>
                                <span class="nav-text">My Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-footer">

                            <a href="{{ route('logout') }}" class="dropdown-link-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="mdi mdi-logout"></i>
                                <span class="nav-text">Log out</span>
                            </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
