@extends('layouts.app')

@section('PageVendorCSS')
<link rel="stylesheet" href="{{asset('app-assets/upload/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">
@endsection

@section('PageCSS')
@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
@elseif(\Auth::user()->role == "User")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
@endif
<link rel="stylesheet" href="{{asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/extensions/toastr.min.css')}}">
@endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Tambah Admin</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <form method="POST" action="{{ route('tambahAdmin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-top-blue border-top-3 box-shadow-1">
                                <div class="card-header">
                                    <h4 class="form-section">
                                        Masukan Foto Profil
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a data-action="collapse">
                                                    <i class="ft-minus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="close">
                                                    <i class="ft-x"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="file" id="input-file-now" class="dropify" data-default-file="" name="profile" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card border-top-blue border-top-3 box-shadow-1">
                                <div class="card-header">
                                    <h4 class="form-section" id="basic-layout-form">
                                        <i class="ft-user-plus"></i>
                                        Tambah Admin
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Nama</label>
                                                        <input type="text" id="name" class="form-control" placeholder="Masukan Nama" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">E-mail Address</label>
                                                        <input type="email" id="email" class="form-control" placeholder="Masukan E-mail" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="password">Kata Sandi</label>
                                                        <input type="password" id="password" class="form-control" placeholder="Masukan Kata Sandi" name="password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mr-1">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-info">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('PageVendorJS')
<script src="{{asset('app-assets/upload/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
@endsection

@section('PageJS')
<script src="{{asset('app-assets/upload/form-file-uploads.min.js')}}"></script>

<script src="{{asset('app-assets/js/scripts/extensions/toastr.min.js')}}"></script>
@include('layouts.component.alert')

<script>
    $('#AdminID').addClass('active');
</script>
@endsection