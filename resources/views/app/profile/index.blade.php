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
                <h3 class="content-header-title mb-0 d-inline-block">Pengaturan Akun</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item active">Pengaturan Akun</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i class="ft-globe mr-50"></i>
                                    Umum
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="ft-lock mr-50"></i>
                                    Ganti Kata Sandi
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-3">
                        <div class="card border-top-blue border-top-3 box-shadow-1">
                            <div class="card-content">
                                <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="card-body">
                                        <label for="profile">Masukan Profil</label>
                                        @if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
                                            @if(empty(Auth::user()->profile))
                                            <input type="file" id="input-file-events" class="dropify-event" data-default-file="{{asset('app-assets/images/profile/user-default.jpg')}}" name="profile">
                                            @else
                                            <input type="file" id="input-file-events" class="dropify-event" data-default-file="{{asset('app-assets/images/profile/img_upload/Administrator/'.Auth::user()->profile)}}" name="profile">
                                            @endif
                                            @else
                                            @if(empty(Auth::user()->profile))
                                            <input type="file" id="input-file-events" class="dropify-event" data-default-file="{{asset('app-assets/images/profile/user-default.jpg')}}" name="profile">
                                            @else
                                            <input type="file" id="input-file-events" class="dropify-event" data-default-file="{{asset('app-assets/images/profile/img_upload/User/'.Auth::user()->profile)}}" name="profile">
                                            @endif
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-top-blue border-top-3 box-shadow-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="name">Nama</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="email">E-mail Address</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="created_at">Dibuat Pada Tanggal</label>
                                                        <input type="text" class="form-control" value="{{ Auth::user()->created_at }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="updated_at">Diubah Pada Tanggal</label>
                                                        <input type="text" class="form-control" value="{{ Auth::user()->updated_at }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit" class="btn btn-info mr-sm-1 mb-1 mb-sm-0 ">Simpan Perubahan</button>
                                                    <a href="{{ route('home') }}" type="reset" class="btn btn-secondary">Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                        </form>

                                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form method="POST" action="{{ url('profile/'.Auth::user()->id ) }}" novalidate enctype="multipart/form-data">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Kata sandi Lama</label>
                                                                <input type="password" class="form-control" id="account-old-password" required placeholder="Masukan Kata sandi Lama" data-validation-required-message="This old password field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">Kata sandi Baru</label>
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Kata sandi Baru" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Konfirmasi Kata sandi</label>
                                                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required placeholder="Konfirmasi Kata sandi" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-info mr-sm-1 mb-1 mb-sm-0 ">Simpan Perubahan</button>
                                                        <a href="{{ route('home') }}" type="reset" class="btn btn-secondary">Batal</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->
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
    $('#AccountID').addClass('active');
</script>
@endsection