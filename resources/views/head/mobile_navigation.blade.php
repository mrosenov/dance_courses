<div class="popup-mobile-menu">
    <div class="inner">
        <div class="header-top">
            <div class="logo">
                <a href="index.html">
                    @if(!empty($settings->logo))
                        <img src="{{asset($settings->logo)}}" alt="Site Logo">
                    @endif
                </a>
            </div>
            <div class="close-menu">
                <button class="close-button">
                    <i class="ri-close-line"></i>
                </button>
            </div>
        </div>
        <ul class="mainmenu">
            <li><a href="#">Home</a></li>
            <li class="has-droupdown"><a href="#">Courses</a>
                <ul class="submenu">
                    <li><a href="course-style-1.html">Course Style 1</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
