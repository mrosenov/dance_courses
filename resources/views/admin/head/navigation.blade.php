<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <div class="app-brand">
            <a href="index.html">
                <img src="{{asset('assets/admin/img/logo.png')}}" alt="Mono">
                <span class="brand-name">MONO</span>
            </a>
        </div>
        <div class="sidebar-left" data-simplebar="" style="height: 100%;">
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="{{Route::currentRouteNamed(['admin']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin')}}">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="has-sub {{Route::currentRouteNamed(['semesters','semester','studio','courses','course','add-semester','edit-semester']) ?  'active' : ''}} {{Route::currentRouteNamed(['semesters']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['semesters','semester','studio','courses','course','add-semester','edit-semester']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#semesters" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-duotone fa-book"></i>
                        <span class="nav-text">Semesters</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['semesters','semester','studio','courses','course','add-semester','edit-semester']) ?  'show' : ''}}" id="semesters" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['semesters','semester','studio','courses','course','add-semester','edit-semester']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('semesters')}}">
                                    <span class="nav-text">List of Semesters</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="{{Route::currentRouteNamed(['calendar','semester_calendar']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('calendar')}}">
                        <i class="fa-duotone fa-calendar-days"></i>
                        <span class="nav-text">Semester Calendar</span>
                    </a>
                </li>
                <li class="has-sub {{Route::currentRouteNamed(['users','teachers','students','edit-user','edit-teacher','edit-student']) ?  'active' : ''}} {{Route::currentRouteNamed(['users']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['users','edit-user']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#users" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-duotone fa-users"></i>
                        <span class="nav-text">Users</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['users','teachers','students','edit-user','edit-teacher','edit-student']) ?  'show' : ''}}" id="users" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['users','edit-user']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('users')}}">
                                    <span class="nav-text">List of all users</span>
                                </a>
                            </li>
                            <li class="{{Route::currentRouteNamed(['teachers','edit-teacher']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('teachers')}}">
                                    <span class="nav-text">List of all teachers</span>
                                </a>
                            </li>
                            <li class="{{Route::currentRouteNamed(['students','edit-student']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('students')}}">
                                    <span class="nav-text">List of all students</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="{{Route::currentRouteNamed(['age-groups','add-age-groups','edit-age-groups']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('age-groups')}}">
                        <i class="fa-duotone fa-child-reaching"></i>
                        <span class="nav-text">Age Groups</span>
                    </a>
                </li>
                <li class="{{Route::currentRouteNamed(['dance-styles','add-dance-styles','edit-dance-styles-form']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('dance-styles')}}">
                        <i class="fa-duotone fa-list-music"></i>
                        <span class="nav-text">Dance Styles</span>
                    </a>
                </li>
                <li class="has-sub {{Route::currentRouteNamed(['blog-category','blog-posts','add-blog-category','edit-blog-category-form','add-blog-post','edit-blog-post-form']) ?  'active' : ''}} {{Route::currentRouteNamed(['users']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['blog-category','blog-posts','add-blog-category','edit-blog-category-form','add-blog-post','edit-blog-post-form']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#blogs" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-brands fa-blogger"></i>
                        <span class="nav-text">Blogs</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['blog-category','blog-posts','add-blog-category','edit-blog-category-form','add-blog-post','edit-blog-post-form']) ?  'show' : ''}}" id="blogs" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['blog-category','blog-posts','add-blog-category','edit-blog-category-form','add-blog-post','edit-blog-post-form']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('blog-category')}}">
                                    <span class="nav-text">List of all categories</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="{{Route::currentRouteNamed(['holidays','holidays-semester','add-holiday','edit-holiday-form']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('holidays')}}">
                        <i class="fa-duotone fa-lights-holiday"></i>
                        <span class="nav-text">Holidays</span>
                    </a>
                </li>
                <li class="{{Route::currentRouteNamed(['banners','add-banner','edit-banner-form']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('banners')}}">
                        <i class="fa-duotone fa-image"></i>
                        <span class="nav-text">Banners</span>
                    </a>
                </li>
                <li class="{{Route::currentRouteNamed(['settings']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('settings')}}">
                        <i class="fa-duotone fa-gears"></i>
                        <span class="nav-text">Site Settings</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>
