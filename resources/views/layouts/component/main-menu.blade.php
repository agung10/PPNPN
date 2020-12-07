@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item" id="DashboardID">
                <a href="{{route('home')}}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="Halaman Utama">Halaman Utama</span>
                </a>
            </li>
            
            <li class=" navigation-header">
                <span data-i18n="Admin Panel">Admin Panel</span>
                <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panel"></i>
            </li>

            <li id="PendidikanID">
                <a href="{{ route('pendidikan.index') }}">
                    <i class="la la-university"></i>
                    <span class="menu-title" data-i18n="Pendidikan">Pendidikan</span>
                </a>
            </li>
            <li id="JabatanID">
                <a href="{{ route('jabatan.index') }}">
                    <i class="la la-user"></i>
                    <span class="menu-title" data-i18n="Jabatan">Jabatan</span>
                </a>
            </li>

            <li class="nav-item" id="DataPelamarID">
                <a href="index-2.html">
                    <i class="la la-clipboard"></i>
                    <span class="menu-title" data-i18n="Data Pelamar">Data Pelamar</span>
                </a>
                <ul class="menu-content">
                    <li id="SemuaDataP">
                        <a class="menu-item" href="{{ route('data_pelamar.index') }}">
                            <i></i>
                            <span data-i18n="eCommerce">Semua Data</span>
                        </a>
                    </li>
                    <li>
                        <a class="menu-item" href="dashboard-ecommerce.html">
                            <i></i>
                            <span data-i18n="eCommerce">Telah Dikonfirmasi</span>
                        </a>
                    </li>
                    <li>
                        <a class="menu-item" href="dashboard-ecommerce.html">
                            <i></i>
                            <span data-i18n="eCommerce">Belum Dikonfirmasi</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" navigation-header">
                <span data-i18n="Akun">Akun</span>
                <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Akun"></i>
            </li>
            
            <li id="AdminID">
                <a href="{{ route('tambahAdmin.index') }}">
                    <i class="la la-user-plus"></i>
                    <span class="menu-title" data-i18n="Tambah Admin">Tambah Admin</span>
                </a>
            </li>
        </ul>
    </div>
</div>
@elseif(\Auth::user()->role == "User")
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-without-dd-arrow navbar-shadow navbar-brand-center navbar-light" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li id="DashboardID" class="active nav-item" >
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="la la-home"></i>
                    <span data-i18n="Dashboard">Halaman Utama</span>
                </a>
            </li>
        </ul>
    </div>
</div>
@endif