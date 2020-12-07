<!DOCTYPE html>
<html>
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>PPNPN</title>
    <link rel="apple-touch-icon" href="{{asset('auth/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('auth/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{asset('auth/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/plugins/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{asset('auth/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/colors.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/components.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/themes/semi-dark-layout.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" href="{{asset('auth/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" href="{{asset('auth/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" href="{{asset('auth/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    @yield('authentication')
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('auth/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('auth/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
    <script src="{{asset('auth/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
    <script src="{{asset('auth/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('auth/js/scripts/configs/vertical-menu-light.min.js')}}"></script>
    <script src="{{asset('auth/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('auth/js/core/app.min.js')}}"></script>
    <script src="{{asset('auth/js/scripts/components.min.js')}}"></script>
    <script src="{{asset('auth/js/scripts/footer.min.js')}}"></script>
    <!-- END: Theme JS-->

</body>
<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/extensions/toastr.min.js')}}"></script>
<!-- END: Body-->

</html>