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
                <li class="has-sub {{Route::currentRouteNamed(['semesters','semester','studio','courses']) ?  'active' : ''}} {{Route::currentRouteNamed(['semesters']) ?  'expand' : ''}}">
                    <a class="sidenav-item-link {{Route::currentRouteNamed(['semesters']) ?  '' : 'collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#semesters" aria-expanded="{{Route::currentRouteNamed(['semesters']) ?  'true' : 'false'}}">
                        <i class="fa-duotone fa-book"></i>
                        <span class="nav-text">Semesters</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Route::currentRouteNamed(['semesters']) ?  'show' : ''}}" id="semesters" data-parent="#sidebar-menu" style="">
                        <div class="sub-menu">
                            <li class="{{Route::currentRouteNamed(['semesters']) ?  'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route('semesters')}}">
                                    <span class="nav-text">List of Semesters</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
