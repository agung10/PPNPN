@extends('layouts.app')

@section("PageVendorCSS")
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">
@endsection

@section("PageCSS")
@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
@elseif(\Auth::user()->role == "User")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
@endif

<link rel="stylesheet" href="{{asset('app-assets/css/plugins/extensions/toastr.min.css')}}">
@endsection

@section("content")
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Data Pelamar</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item">Pelamar</li>
                            <li class="breadcrumb-item active">Tabel Data Pelamar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row match-height">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Semua Data</h4>
                            <hr>
                            <a class="heading-elements-toggle">
                                <i class="la la-ellipsis-v font-medium-3"></i>
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
                        <div class="card-content mt-1">
                            <div class="table-responsive">
                                <table class="table table-striped zero-configuration table-xl mb-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 5px;">No</th>
                                            <th>Nomor KTP</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jabatan yang dilamar</th>
                                            <th style="width: 12%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('__FUNCTION.tanggal-indo')
                                        @foreach($data_pelamars as $res)
                                        <tr class="pull-up">
                                            <td class="text-truncate">{{ $loop->iteration }}</td>
                                            <td class="text-truncate">{{ $res->no_ktp }}</td>
                                            <td class="text-truncate p-1">
                                                @if(empty($res->foto))
                                                    <img data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{ $res->nama }}" class="media-object rounded-circle avatar avatar-sm pull-up" src="{{('app-assets/images/profile/user-default.jpg')}}" alt="{{ $res->nama }}" style="margin-left: 15px; border: 2px solid #fff; box-shadow: 0 2px 10px 0 rgba(107,111,130,.3);object-fit:cover;">
                                                @else
                                                    <img data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{ $res->nama }}" class="media-object rounded-circle avatar avatar-sm pull-up" src="{{asset('app-assets/images/berkas/FOTO/'.$res->foto)}}" alt="{{ $res->nama }}" style="margin-left: 15px; border: 2px solid #fff; box-shadow: 0 2px 10px 0 rgba(107,111,130,.3);object-fit:cover;">
                                                @endif

                                                {{ $res->nama }}
                                            </td>
                                            <td class="text-truncate">
                                                {{ $res->tgl_lahir }}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger round">
                                                {{ $res->jabatan->kd_jabatan }} / {{ $res->jabatan->nm_jabatan }}
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('data_pelamar.show', $res->no_ktp) }}" class="info" data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Lihat Detail">
                                                    <i class="la la-desktop"></i>
                                                </a>
                                                <a href="#" class="warning" data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Ubah">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                                <a href="#" class="danger" data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Hapus">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@include('layouts.component.modalDestroy')
@endsection

@section("PageVendorJS")
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
@endsection

@section("PageJS")
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/extensions/toastr.min.js')}}"></script>
@include('layouts.component.alert')

<script>
    $('#SemuaDataP').addClass('active');
</script>
@endsection