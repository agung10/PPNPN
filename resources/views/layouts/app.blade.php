<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN: Head-->

<head>
    @include('layouts.component.head')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
    <body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@elseif(\Auth::user()->role == "User")
    <body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns" data-open="click" data-menu="horizontal-menu" data-col="2-columns">
@endif


        <!-- BEGIN: Header-->
        @include('layouts.component.header')
        <!-- END: Header-->

        <!-- BEGIN: Main Menu-->
        @include('layouts.component.main-menu')
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        @yield('content')
        <!-- END: Content-->


        <!-- BEGIN: Customizer-->
        @include('layouts.component.customizer')
        <!-- End: Customizer-->

        <!-- BEGIN: Footer-->
        @include('layouts.component.footer')
        <!-- END: Footer-->

    </body>
    <!-- END: Body-->

    @include('layouts.component.script')

</html>