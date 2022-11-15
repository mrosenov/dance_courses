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
                <li class="has-sub {{Route::currentRouteNamed(['semesters','semester','studio','courses','course']) ?  'active' : ''}} {{Route::currentRouteNamed(['semesters']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['semesters','semester','studio','courses','course']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#semesters" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-duotone fa-book"></i>
                        <span class="nav-text">Semesters</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['semesters','semester','studio','courses','course']) ?  'show' : ''}}" id="semesters" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['semesters','semester','studio','courses','course']) ?  'active' : ''}}">
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
                <li class="has-sub {{Route::currentRouteNamed(['users']) ?  'active' : ''}} {{Route::currentRouteNamed(['users']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['users']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#users" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-duotone fa-users"></i>
                        <span class="nav-text">Users</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['users','teachers','students']) ?  'show' : ''}}" id="users" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['users']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('users')}}">
                                    <span class="nav-text">List of all users</span>
                                </a>
                            </li>
                            <li class="{{Route::currentRouteNamed(['teachers']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('teachers')}}">
                                    <span class="nav-text">List of all teachers</span>
                                </a>
                            </li>
                            <li class="{{Route::currentRouteNamed(['students']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('students')}}">
                                    <span class="nav-text">List of all students</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="{{Route::currentRouteNamed(['age-groups']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('age-groups')}}">
                        <i class="fa-duotone fa-child-reaching"></i>
                        <span class="nav-text">Age Groups</span>
                    </a>
                </li>
                <li class="{{Route::currentRouteNamed(['dance-styles']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('dance-styles')}}">
                        <i class="fa-duotone fa-list-music"></i>
                        <span class="nav-text">Dance Styles</span>
                    </a>
                </li>
                <li class="has-sub {{Route::currentRouteNamed(['blog-category','blog-posts']) ?  'active' : ''}} {{Route::currentRouteNamed(['users']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['blog-category']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#blogs" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-brands fa-blogger"></i>
                        <span class="nav-text">Blogs</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['blog-category','blog-posts']) ?  'show' : ''}}" id="blogs" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['blog-category']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('blog-category')}}">
                                    <span class="nav-text">List of all categories</span>
                                </a>
                            </li>
                            <li class="{{Route::currentRouteNamed(['blog-posts']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('blog-posts')}}">
                                    <span class="nav-text">List of all posts</span>
                                </a>
                            </li>
                            <li class="{{Route::currentRouteNamed(['']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('students')}}">
                                    <span class="nav-text">List of all comments</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="{{Route::currentRouteNamed(['holidays','holidays-semester']) ?  'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('holidays')}}">
                        <i class="fa-duotone fa-lights-holiday"></i>
                        <span class="nav-text">Holidays</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>
