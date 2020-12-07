@extends('layouts.app')

@section('PageVendorCSS')
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
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
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/extensions/toastr.min.css')}}">
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Data Jabatan</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item">Jabatan</li>
                            <li class="breadcrumb-item active">Tabel Data Jabatan</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="float-md-right">
                    <button type="button" class="btn btn-info btn-min-width btn-glow mb-1 text-white" data-toggle="modal" data-target="#Addjabatan">
                        <i class="ft-plus"></i>
                        Tambah
                    </button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Semua Data</h4>
                                <hr>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="width: 10px;">No</th>
                                                    <th>Kode Jabatan</th>
                                                    <th>Nama Jabatan</th>
                                                    <th>Kualifikasi Pendidikan</th>
                                                    <th>Lokasi Jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jabatans as $res)
                                                <tr class="text-center">
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $res->kd_jabatan }} </td>
                                                    <td> {{ $res->nm_jabatan }} </td>
                                                    <td> {{ $res->kualifikasi_pend }} </td>
                                                    <td> {{ $res->lokasi_jabatan }} </td>
                                                    <td>
                                                        <a href="#" __kd_jabatan="{{ $res->kd_jabatan }}" __nm_jabatan="{{ $res->nm_jabatan }}" __kualifikasi_pend="{{ $res->kualifikasi_pend }}" __lokasi_jabatan="{{ $res->lokasi_jabatan }}" __action="{{ route('jabatan.update', $res->id) }}" class="warning JabatanEdit"><i class="la la-pencil"></i></a>
                                                        <a href="#" data-uri="{{ route('jabatan.destroy', $res->id) }}" data-toggle="modal" data-target="#modalDestroy" class="danger"><i class="la la-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th style="width: 10px;">No</th>
                                                    <th>Kode Jabatan</th>
                                                    <th>Nama Jabatan</th>
                                                    <th>Kualifikasi Pendidikan</th>
                                                    <th>Lokasi Jabatan Jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@include('app.jabatan.modalAddJ')
@include('app.jabatan.modalEditJ')
@include('layouts.component.modalDestroy')
@endsection

@section('PageVendorJS')
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<!-- END: Page Vendor JS-->
@endsection

@section('PageJS')
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/modal/components-modal.min.js')}}"></script>

<script src="{{asset('app-assets/js/scripts/extensions/toastr.min.js')}}"></script>
@include('layouts.component.alert')

<script>
    $('.JabatanEdit').click(function() {
        let kd_jabatan = $(this).attr("__kd_jabatan")
        let nm_jabatan = $(this).attr("__nm_jabatan")
        let kualifikasi_pend = $(this).attr("__kualifikasi_pend")
        let lokasi_jabatan = $(this).attr("__lokasi_jabatan")
        let __action = $(this).attr("__action")

        $('#formEditJ').attr('action', __action)
        $("#kd_jabatanEdit").val(kd_jabatan)
        $("#nm_jabatanEdit").val(nm_jabatan)
        $("#kualifikasi_pendEdit").val(kualifikasi_pend)
        $("#lokasi_jabatanEdit").val(lokasi_jabatan)

        $('#openModalEdit').click()
    })
</script>

<script>
    $('#JabatanID').addClass('active');

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
@endsection