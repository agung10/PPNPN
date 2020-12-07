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
                <h3 class="content-header-title mb-0 d-inline-block">Data Pendidikan</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item">Pendidikan</li>
                            <li class="breadcrumb-item active">Tabel Data Pendidikan</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="float-md-right">
                    <button type="button" class="btn btn-info btn-min-width btn-glow mb-1 text-white" data-toggle="modal" data-target="#AddPendidikan">
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
                                                    <th>Kode Pendidikan</th>
                                                    <th>Nama Pendidikan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pendidikans as $res)
                                                <tr class="text-center">
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $res->kd_pend }} </td>
                                                    <td> {{ $res->nm_pend }} </td>
                                                    <td>
                                                        <a href="#" __kd_pend="{{ $res->kd_pend }}" __nm_pend="{{ $res->nm_pend }}"  __action="{{ route('pendidikan.update', $res->id) }}" class="warning PendidikanEdit"><i class="la la-pencil"></i></a>
                                                        <a href="#" data-uri="{{ route('pendidikan.destroy', $res->id) }}" data-toggle="modal" data-target="#modalDestroy" class="danger" ><i class="la la-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th style="width: 10px;">No</th>
                                                    <th>Kode Pendidikan</th>
                                                    <th>Nama Pendidikan</th>
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

@include('app.pendidikan.modalAddP')
@include('app.pendidikan.modalEditP')
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
    $('.PendidikanEdit').click(function(){
        let kd_pend = $(this).attr("__kd_pend")
        let nm_pend = $(this).attr("__nm_pend")
        let __action = $(this).attr("__action")

        $('#formEditP').attr('action', __action)
		$("#kd_pendEdit").val(kd_pend)
		$("#nm_pendEdit").val(nm_pend)

        $('#openModalEdit').click()
    })
</script>

<script>
    $('#PendidikanID').addClass('active');

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

        return true;
    }
</script>
@endsection