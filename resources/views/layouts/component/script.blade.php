<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
@yield('PageVendorJS')
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/customizer.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/footer.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('PageJS')
<script src="{{asset('app-assets/js/scripts/modalDestroy.js')}}"></script>
<!-- END: Page JS-->
