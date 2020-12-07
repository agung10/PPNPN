@extends('layouts.app')

@section('PageVendorCSS')
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">
@endsection

@section('PageCSS')
@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
@elseif(\Auth::user()->role == "User")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
@endif
<link rel="stylesheet" href="{{asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/animate/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/fonts/simple-line-icons/style.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/core/colors/palette-callout.min.css')}}">
<!-- switch -->
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/forms/switch.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/fonts/simple-line-icons/style.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/core/colors/palette-switch.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/extensions/toastr.min.css')}}">
@endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="users-edit">
                <div class="card border-top-blue border-top-3 box-shadow-1">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i class="ft-user mr-25"></i>
                                        <span class="d-none d-sm-block">Data Diri</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                        <i class="ft-info mr-25"></i>
                                        <span class="d-none d-sm-block">Lainnya</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-sm-2">
                                            <div class="form-group">
                                                @if(empty($data_pelamars->foto))
                                                <center>
                                                    <a href="{{asset('app-assets/images/profile/user-default.jpg')}}" target="_blank">
                                                        <img class="img-thumbnail" src="{{asset('app-assets/images/profile/user-default.jpg')}}" alt="{{ $data_pelamars->nama }}" style="width:160px;height:200px;object-fit:cover;">
                                                    </a>
                                                </center>
                                                @else
                                                <center>
                                                    <a href="{{asset('app-assets/images/berkas/FOTO/'.$data_pelamars->foto)}}" target="_blank">
                                                        <img class="img-thumbnail" src="{{asset('app-assets/images/berkas/FOTO/'.$data_pelamars->foto)}}" alt="{{ $data_pelamars->nama }}" style="width:160px;height:200px;object-fit:cover;">
                                                    </a>
                                                </center>
                                                @endif
                                            </div>
                                            <center>
                                                <h5 class="badge badge-lg badge-info">
                                                    <b>{{ $data_pelamars->nama }}</b>
                                                </h5>
                                            </center>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Nomor KTP</label>
                                                    <input type="text" class="form-control" value="{{ $data_pelamars->no_ktp }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" class="form-control" value="{{ $data_pelamars->tmpt_lahir }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" class="form-control" value="{{ $data_pelamars->tgl_lahir }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Jenis Kelamin</label>
                                                    <input type="text" class="form-control" value="{{ $data_pelamars->jenis_kelamin }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Status</label>
                                                    <center>
                                                        @if(empty($data_pelamars->nomor_ujian))
                                                        <p type="text" class="form-control bg-danger text-white" disabled>
                                                            <b>Belum Diverifikasi</b>
                                                        </p>
                                                        @else
                                                        <p type="text" class="form-control bg-success text-white" disabled>
                                                            <b>Sudah Diverifikasi</b>
                                                        </p>
                                                        @endif
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top: 40px;">
                                                <div class="controls">
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <div class="input-group" style="width: 350px;">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-info mb-1" style="font-size:17px;">
                                                                    Nomor Ujian
                                                                </button>
                                                            </div>

                                                            @if($data_pelamars->nomor_ujian)
                                                            @if($data_pelamars->jenjang == "SMA/SLTA sederajat")
                                                            <input class="form-control text-center text-info" style="font-weight:bold;font-size:17px;" value="1 {{ $data_pelamars->jabatan->kd_jabatan }} {{ $data_pelamars->nomor_ujian }}" disabled>

                                                            @elseif($data_pelamars->jenjang == "D3")
                                                            <input class="form-control text-center text-info" style="font-weight:bold;font-size:17px;" value="1 {{ $data_pelamars->jabatan->kd_jabatan }} {{ $data_pelamars->nomor_ujian }}" disabled>

                                                            @elseif($data_pelamars->jenjang == "D4/S1")
                                                            <input class="form-control text-center text-info" style="font-weight:bold;font-size:17px;" value="1 {{ $data_pelamars->jabatan->kd_jabatan }} {{ $data_pelamars->nomor_ujian }}" disabled>

                                                            @elseif($data_pelamars->jenjang == "S2")
                                                            <input class="form-control text-center text-info" style="font-weight:bold;font-size:17px;" value="1 {{ $data_pelamars->jabatan->kd_jabatan }} {{ $data_pelamars->nomor_ujian }}" disabled>
                                                            @endif
                                                            @else
                                                            <input type="text" class="form-control text-center text-info" placeholder="....." style="font-weight:bold; font-size:17px;" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <h4 class="mb-1">
                                                <b>Data sekolah</b>
                                            </h4>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nomor Ijazah</label>
                                                        <input class="form-control" type="text" value="{{ $data_pelamars->no_ijazah }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="form-group">
                                                        <label>Nama Sekolah</label>
                                                        <input class="form-control" type="text" value="{{ $data_pelamars->nm_sekolah }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenjang</label>
                                                <input class="form-control" type="text" value="{{ $data_pelamars->jenjang }}" disabled>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Fakultas</label>
                                                        <input class="form-control" type="text" value="{{ $data_pelamars->fakultas }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jurusan</label>
                                                        <input class="form-control" type="text" value="{{ $data_pelamars->jurusan }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-2">
                                                    <div class="form-group">
                                                        <label>Nilai IPK</label>
                                                        <input class="form-control text-center" type="text" value="{{ $data_pelamars->ipk }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                            <h4 class="mb-1">
                                                <b>Data jabatan yang akan dilamar</b>
                                            </h4>
                                            <div class="form-group">
                                                <label>Kode Jabatan / Nama Jabatan</label>
                                                <input class="form-control" type="text" value="{{ $data_pelamars->jabatan->kd_jabatan }} / {{ $data_pelamars->jabatan->nm_jabatan }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Kualifikasi Pendidikan</label>
                                                <input class="form-control" type="text" value="{{ $data_pelamars->jabatan->kualifikasi_pend }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi Jabatan</label>
                                                <input class="form-control" type="text" value="{{ $data_pelamars->jabatan->lokasi_jabatan }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(\Auth::user()->role == "User")
                            <div class="float-md-right">
                                <a href="{{ route('data_pelamar.edit', $data_pelamars->id) }}" class="btn btn-warning btn-min-width btn-glow mb-1 text-white">
                                    <i class="ft-edit"></i>
                                    Ubah Data
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <section id="cardAnimation" class="cardAnimation">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-top-blue border-top-3 box-shadow-1">
                            <div class="card-header">
                                <h4 class="card-title">Lampiran Berkas Data</h4>
                                <hr>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-h font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw">
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize">
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x">
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="alert alert-icon-left alert-arrow-left alert-warning alert-dismissible mb-2" role="alert">
                                        <span class="alert-icon">
                                            <i class="la la-info-circle"></i>
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        @if(\Auth::user()->role != "User")
                                        <strong>
                                            Verifikasi data untuk mendapatkan nomor ujian peserta!
                                        </strong>
                                        @else
                                        <strong>
                                            Nomor ujian akan muncul setelah data yang anda masukan diverifikasi oleh admin!
                                        </strong>
                                        @endif
                                    </div>

                                    @if(\Auth::user()->role == "User")
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="card box-shadow-0" data-appear="appear" data-animation="slideInDown">
                                                <div class="card-header bg-secondary white">
                                                    <h4 class="card-title white text-center">
                                                        Scan KTP
                                                    </h4>
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body border-bottom-info">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3">
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <center>
                                                                    <h6 class="badge badge-md badge-danger">Belum Disetujui</h6>
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64" style="margin-left:8%;">
                                                                    </a>
                                                                    <br>
                                                                    <a href="" style="color:#000;">Lihat Foto</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-12">
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="card box-shadow-0" data-appear="appear" data-animation="fadeInDown">
                                                <div class="card-header white bg-secondary">
                                                    <h4 class="card-title white text-center">
                                                        Scan Ijazah
                                                    </h4>
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body border-bottom-info">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3">
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <center>
                                                                    <h6 class="badge badge-md badge-danger">Belum Disetujui</h6>
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64" style="margin-left:8%;">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat Foto</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="card box-shadow-0" data-appear="appear" data-animation="slideInUp">
                                                <div class="card-header white bg-secondary">
                                                    <h4 class="card-title white text-center">
                                                        Scan Transkrip
                                                    </h4>
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body border-bottom-info">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3">
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <center>
                                                                    <h6 class="badge badge-md badge-danger">Belum Disetujui</h6>
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64" style="margin-left:8%;">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat Foto</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="card box-shadow-0" data-appear="appear" data-animation="zoomInLeft">
                                                <div class="card-header white bg-secondary">
                                                    <h4 class="card-title white text-center">
                                                        Scan Surat Lamaran
                                                    </h4>
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body border-bottom-info">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3">
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <center>
                                                                    <h6 class="badge badge-md badge-danger">Belum Disetujui</h6>
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64" style="margin-left:8%;">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat PDF</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="card box-shadow-0" data-appear="appear" data-animation="fadeInLeft">
                                                <div class="card-header white bg-secondary">
                                                    <h4 class="card-title white text-center">
                                                        Scan Lembar Isian
                                                    </h4>
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body border-bottom-info">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3">
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <center>
                                                                    <h6 class="badge badge-md badge-danger">Belum Disetujui</h6>
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64" style="margin-left:8%;">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat PDF</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
                                    <form method="POST" action="{{ url('verifikasiPelamar/'.$data_pelamars->no_ktp) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="card box-shadow-0" data-appear="appear" data-animation="slideInDown">
                                                    <div class="card-header bg-secondary white">
                                                        <h4 class="card-title white text-center">
                                                            Scan KTP
                                                        </h4>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body border-bottom-info">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-1">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat Foto</a>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <center>
                                                                        @if($data_pelamars->s_ktp == "Disetujui")
                                                                        <h6>
                                                                            <b>Disetujui</b>
                                                                        </h6>
                                                                        <div class="bootstrap-switch bootstrap-switch-on" style="width: 76px;">
                                                                            <div class="bootstrap-switch-container" style="width: 120px; margin-left: 0px;">
                                                                                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 50px;">ON</span>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <h6>
                                                                            <b>Belum Disetujui</b>
                                                                        </h6>
                                                                        <input type="checkbox" class="switchBootstrap" id="switchBootstrap18" data-on-color="success" data-off-color="danger" />
                                                                        @endif
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="card box-shadow-0" data-appear="appear" data-animation="fadeInDown">
                                                    <div class="card-header white bg-secondary">
                                                        <h4 class="card-title white text-center">
                                                            Scan Ijazah
                                                        </h4>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body border-bottom-info">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-1">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat Foto</a>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <center>
                                                                        @if($data_pelamars->s_ijazah == "Disetujui")
                                                                        <h6>
                                                                            <b>Disetujui</b>
                                                                        </h6>
                                                                        <div class="bootstrap-switch bootstrap-switch-on" style="width: 76px;">
                                                                            <div class="bootstrap-switch-container" style="width: 120px; margin-left: 0px;">
                                                                                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 50px;">ON</span>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <h6>
                                                                            <b>Belum Disetujui</b>
                                                                        </h6>
                                                                        <input type="checkbox" class="switchBootstrap" id="switchBootstrap18" data-on-color="success" data-off-color="danger" />
                                                                        @endif
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="card box-shadow-0" data-appear="appear" data-animation="slideInUp">
                                                    <div class="card-header white bg-secondary">
                                                        <h4 class="card-title white text-center">
                                                            Scan Transkrip
                                                        </h4>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body border-bottom-info">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-1">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat Foto</a>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <center>
                                                                        @if($data_pelamars->s_transkrip == "Disetujui")
                                                                        <h6>
                                                                            <b>Disetujui</b>
                                                                        </h6>
                                                                        <div class="bootstrap-switch bootstrap-switch-on" style="width: 76px;">
                                                                            <div class="bootstrap-switch-container" style="width: 120px; margin-left: 0px;">
                                                                                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 50px;">ON</span>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <h6>
                                                                            <b>Belum Disetujui</b>
                                                                        </h6>
                                                                        <input type="checkbox" class="switchBootstrap" id="switchBootstrap18" data-on-color="success" data-off-color="danger" />
                                                                        @endif
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-sm-12">
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="card box-shadow-0" data-appear="appear" data-animation="zoomInLeft">
                                                    <div class="card-header white bg-secondary">
                                                        <h4 class="card-title white text-center">
                                                            Scan Surat Lamaran
                                                        </h4>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body border-bottom-info">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-1">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat PDF</a>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <center>
                                                                        @if($data_pelamars->s_srt_lamaran == "Disetujui")
                                                                        <h6>
                                                                            <b>Disetujui</b>
                                                                        </h6>
                                                                        <div class="bootstrap-switch bootstrap-switch-on" style="width: 76px;">
                                                                            <div class="bootstrap-switch-container" style="width: 120px; margin-left: 0px;">
                                                                                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 50px;">ON</span>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <h6>
                                                                            <b>Belum Disetujui</b>
                                                                        </h6>
                                                                        <input type="checkbox" class="switchBootstrap" id="switchBootstrap18" data-on-color="success" data-off-color="danger" />
                                                                        @endif
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="card box-shadow-0" data-appear="appear" data-animation="fadeInLeft">
                                                    <div class="card-header white bg-secondary">
                                                        <h4 class="card-title white text-center">
                                                            Scan Lembar Isian
                                                        </h4>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body border-bottom-info">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-1">
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <a class="mr-1" href="#">
                                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users view avatar" class="users-avatar-shadow" height="64" width="64">
                                                                    </a>
                                                                    <br>
                                                                    <a href="#" style="color:#000;">Lihat PDF</a>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <center>
                                                                        @if($data_pelamars->s_lembar_isian == "Disetujui")
                                                                        <h6>
                                                                            <b>Disetujui</b>
                                                                        </h6>
                                                                        <div class="bootstrap-switch bootstrap-switch-on" style="width: 76px;">
                                                                            <div class="bootstrap-switch-container" style="width: 120px; margin-left: 0px;">
                                                                                <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 50px;">ON</span>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <h6>
                                                                            <b>Belum Disetujui</b>
                                                                        </h6>
                                                                        <input type="checkbox" class="switchBootstrap" id="switchBootstrap18" data-on-color="success" data-off-color="danger" checked name="check_lembar" />
                                                                        @endif
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($data_pelamars->s_ktp == "Disetujui" &&
                                            $data_pelamars->s_ijazah == "Disetujui" &&
                                            $data_pelamars->s_transkrip == "Disetujui" &&
                                            $data_pelamars->s_srt_lamaran == "Disetujui" &&
                                            $data_pelamars->s_lembar_isian == "Disetujui")
                                        @else
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-info mb-1">
                                                Verifikasi Data
                                            </button>
                                        </div>
                                        @endif
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('PageVendorJS')
<script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/animation/jquery.appear.js')}}"></script>
<!-- switch -->
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
@endsection

@section('PageJS')
<script src="{{asset('app-assets/js/scripts/extensions/toastr.min.js')}}"></script>
@include('layouts.component.alert')

<script src="{{asset('app-assets/js/scripts/animation/animation.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/switch.min.js')}}"></script>
@endsection