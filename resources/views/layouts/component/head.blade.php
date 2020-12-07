 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

 @if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
 <title> Admin PPNPN </title>
 @elseif(\Auth::user()->role == "User")
 <title> PPNPN </title>
 @endif

 <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
 <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/ico/favicon.ico">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
 @yield('PageVendorCSS')
 <!-- END: Vendor CSS-->

 <!-- BEGIN: Theme CSS-->
 <link rel="stylesheet" href="{{asset('app-assets/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('app-assets/css/bootstrap-extended.min.css')}}">
 <link rel="stylesheet" href="{{asset('app-assets/css/colors.min.css')}}">
 <link rel="stylesheet" href="{{asset('app-assets/css/components.min.css')}}">
 <!-- END: Theme CSS-->

 <!-- BEGIN: Page CSS-->
 @yield('PageCSS')
 <!-- END: Page CSS-->

 <link rel="stylesheet" href="{{asset('app-assets/css/custom.css')}}">

 <style>
     #dd-w-0 {
         font-weight: bold;
     }

     #dd-w-0 .dd-w-c,
     #dd-w-0 .dd-ul li,
     #dd-w-0 .dd-s-b-ul ul {
         width: 200px;
     }

     #dd-w-0 .dd-w-c {
         color: #1D2B36;
         background: #FFFFFF;
         border: 1px solid #1e9ff2 !important;
         box-shadow: 0 0 10px 0 rgba(0, 136, 204, 0.45);
         border-radius: 8px
     }

     #dd-w-0 .dd-w-c,
     #dd-w-0 .dd-s-b {
         background: #FFFFFF
     }

     #dd-w-0 .dd-sun,
     #dd-w-0 .dd-s-b-ul li.dd-on {
         color: #1e9ff2 !important
     }

     #dd-w-0 .dd-c .dd-s,
     #dd-w-0 .dd-s-b-s,
     #dd-w-0 .dd-s-b-sub-y,
     #dd-w-0 .dd-sub-y {
         background: #1e9ff2 !important;
         color: #FFFFFF
     }

     #dd-w-0 .dd-c .dd-s a,
     #dd-w-0 .dd-c .dd-s a:hover {
         color: #FFFFFF
     }

     #dd-w-0 .dd-c:after {
         border-left: 1px solid #1e9ff2 !important;
         border-top: 1px solid #1e9ff2 !important
     }

     #dd-w-0.dd-bottom .dd-c:after {
         background: #FFFFFF
     }

     #dd-w-0.dd-top .dd-c:after {
         background: #1e9ff2 !important
     }

     #dd-w-0 .dd-n,
     #dd-w-0 .dd-sun {
         color: #1e9ff2 !important
     }

     #dd-w-0 .dd-sub-y .dd-n {
         color: #FFFFFF
     }

     #dd-w-0 .dd-c .dd-s:hover,
     #dd-w-0 .dd-s-b-s:hover {
         background: #8266c8;
     }
 </style>