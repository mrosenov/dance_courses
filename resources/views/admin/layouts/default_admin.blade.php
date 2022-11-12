<!DOCTYPE html>
<html lang="en" dir="ltr">
    @include('admin.head.head')
<body class="navbar-fixed sidebar-fixed" id="body">
<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
</script>
{{--<div id="toaster"></div>--}}

<div class="wrapper">
    @include('admin.head.navigation')
    <div class="page-wrapper">
        @include('admin.head.header')
        <div class="content-wrapper">
            <div class="content">
                @yield('section')
            </div>
        </div>
        @include('admin.footer.footer')
    </div>
</div>

<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/admin/hotkeys-js%403.10.0/dist/hotkeys.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('assets/admin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
<script src="{{asset('assets/admin/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('input[name="dateRange"]').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
            jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
        });
        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
            jQuery(this).val('');
        });
    });
</script>
<script src="{{asset('assets/admin/1.3.6/quill.js')}}"></script>
<script src="{{asset('assets/admin/plugins/toaster/toastr.min.js')}}"></script>
<script src="{{asset('assets/admin/js/mono.js')}}"></script>
<script src="{{asset('assets/admin/js/chart.js')}}"></script>
<script src="{{asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/admin/js/map.js')}}"></script>
<script src="{{asset('assets/admin/js/custom.js')}}"></script>

</body>
</html>
