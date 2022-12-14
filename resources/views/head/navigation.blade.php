<header class="edu-header disable-transparent header-sticky header-style-2 header-default ">
    <div class="row align-items-center">
        <div class="col-lg-4 col-xl-3 col-md-6 col-6">
            <div class="logo">
                <a href="index.html">
                    <img class="logo-light" src="{{asset($settings->logo)}}" alt="Site Logo">
                </a>
            </div>
        </div>
        <div class="col-lg-6 d-none d-xl-block">
            <nav class="mainmenu-nav d-none d-lg-block">
                <ul class="mainmenu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="has-droupdown"><a href="#">Courses</a>
                        <ul class="submenu">
                            <li><a href="course-style-1.html">Course Style 1</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-8 col-xl-3 col-md-6 col-6">
            <div class="header-right d-flex justify-content-end">
                <div class="header-menu-bar">
                    <div class="quote-icon quote-search">
                        <button class="white-box-icon search-trigger header-search"><i class="ri-search-line"></i></button>
                    </div>
                    @guest
                        <div class="quote-icon quote-user d-none d-md-block ml--15 ml_sm--5">
                            <a class="edu-btn btn-medium left-icon header-button" href="{{route('login')}}"><i class="ri-user-line"></i>Login / Register</a>
                        </div>
                        <div class="quote-icon quote-user d-block d-md-none ml--15 ml_sm--5">
                            <a class="white-box-icon" href="{{route('login')}}"><i class="ri-user-line"></i></a>
                        </div>
                    @else
                        <div class="quote-icon quote-user d-none d-md-block ml--15 ml_sm--5">
                            <a class="edu-btn btn-medium left-icon header-button" href="{{route('dashboard')}}"><i class="ri-user-line"></i>Profile</a>
                        </div>
                        <div class="quote-icon quote-user d-block d-md-none ml--15 ml_sm--5">
                            <a class="white-box-icon" href="{{route('dashboard')}}"><i class="ri-user-line"></i></a>
                        </div>
                    @endguest

                </div>

                <div class="mobile-menu-bar ml--15 ml_sm--5 d-block d-xl-none">
                    <div class="hamberger">
                        <button class="white-box-icon hamberger-button header-menu">
                            <i class="ri-menu-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
