<!doctype html>
<html class="no-js" lang="en">
@include('head.head')
<body>
<div class="main-wrapper">
@include('head.navigation')
@include('head.mobile_navigation')
@include('head.search_popup')

    @yield('login_section')
    @yield('register_section')
    @yield('section')

@include('footer.footer')
</div>

<div class="rn-progress-parent">
    <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- Modernizer JS -->
<script src="{{asset('assets/js/vendor/modernizr.min.js')}}"></script>
<!-- jQuery JS -->
<script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/sal.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/backtotop.js')}}"></script>
<script src="{{asset('assets/js/vendor/magnifypopup.js')}}"></script>
<script src="{{asset('assets/js/vendor/slick.js')}}"></script>
<script src="{{asset('assets/js/vendor/countdown.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-appear.js')}}"></script>
<script src="{{asset('assets/js/vendor/odometer.js')}}"></script>
<script src="{{asset('assets/js/vendor/isotop.js')}}"></script>
<script src="{{asset('assets/js/vendor/imageloaded.js')}}"></script>
<script src="{{asset('assets/js/vendor/lightbox.js')}}"></script>
<script src="{{asset('assets/js/vendor/wow.js')}}"></script>
<script src="{{asset('assets/js/vendor/paralax.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/paralax-scroll.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/vendor/tilt.jquery.min.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
