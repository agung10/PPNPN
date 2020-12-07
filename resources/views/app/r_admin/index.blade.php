@extends('layouts.app')

@section('PageVendorCSS')
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/jkanban/jkanban.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/toastr.css')}}">
@endsection

@section('PageCSS')
@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
@elseif(\Auth::user()->role == "User")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
@endif
<link rel="stylesheet" href="{{asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/pages/users.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/pages/app-kanban.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/animate/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/extensions/toastr.min.css')}}">
@endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Semua Admin</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item">Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <a href="{{ route('tambahAdmin.create') }}" class="btn btn-info btn-min-width btn-glow mb-1 text-white">
                        <i class="ft-plus"></i>
                        Tambah
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- User Profile Cards -->
            <section id="user-profile-cards" class="row mt-2">
                <div class="content-detached">
                    <div class="content-body">
                        <div class="content-overlay"></div>
                        <section class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="bug-list-search">
                                            <div class="bug-list-search-content">
                                                <div class="sidebar-toggle d-block d-lg-none"><i class="ft-menu font-large-1"></i></div>
                                                <form method="GET">
                                                    <div class="position-relative">
                                                        <input type="search" id="search-admin" class="form-control" placeholder="Search Admin..." name="q">
                                                        <div class="form-control-position">
                                                            <i class="la la-search text-size-base text-muted la-rotate-270"></i>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                @foreach($administrators as $res)
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card bg-gradient-striped-info box-shadow-2 border-bottom-blue border-bottom-3">
                        <div class="text-center">
                            <div class="badge badge-primary" style="margin-top:0.5em;">Bergabung pada: {{ $res->created_at }}</div>
                            <br>

                            @if(\Auth::user()->role == "AdminUtama")
                                @if($res->role == "AdminUtama")
                                @else
                                <div class="dropdown float-right">
                                    <button class="kanban-title-button btn btn-default btn-xs" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:0;margin-top:-2.8em">
                                        <i class="ft-more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-130px, 24px, 0px);">

                                        <a class="dropdown-item" href="{{ route('tambahAdmin.edit', $res->id) }}">
                                            <i class="ft-edit mr-50"></i>
                                            Ubah
                                        </a>
                                        <a href="#" data-uri="{{ route('tambahAdmin.destroy', $res->id) }}" data-toggle="modal" data-target="#modalDestroy" class="dropdown-item kanban-delete" id="kanban-delete">
                                            <i class="ft-trash-2 mr-50"></i>
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                                @endif
                            @endif

                            <div class="card-body">
                                @if(empty($res->profile))
                                <img src="{{asset('app-assets/images/profile/user-default.jpg')}}" class="rounded-circle" alt="{{ $res->name }}" style="width:115px; height:115px;object-fit:cover;">
                                @else
                                <img src="{{asset('app-assets/images/profile/img_upload/Administrator/'.$res->profile)}}" class="rounded-circle" alt="{{ $res->name }}" style="width:115px; height:115px;object-fit:cover;">
                                @endif
                            </div>
                            <h4 class="card-title">{{ $res->name }}</h4>
                            <h6 class="card-subtitle text-muted">{{ $res->email }}</h6>
                            <div class="card-body">
                                @if($res->role == "AdminUtama")
                                <div class="badge badge-primary badge-md mr-1 text-white"><i class="ft-user"></i> {{ $res->role }} </div>
                                @else
                                <div class="badge badge-secondary badge-md mr-1 text-white"><i class="ft-user"></i> {{ $res->role }} </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
            <!--/ User Profile Cards -->
        </div>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center pagination-separate">
            <li class="page-item">
                {{$administrators->links()}}
            </li>
        </ul>
    </nav>
</div>
<!-- END: Content-->
@include('layouts.component.modalDestroy')
@endsection

@section('PageVendorJS')
<script src="{{asset('app-assets/vendors/js/jkanban/jkanban.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
@endsection

@section('PageJS')
<script src="{{asset('app-assets/js/scripts/pages/app-kanban.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/modal/components-modal.min.js')}}"></script>

<script src="{{asset('app-assets/js/scripts/extensions/toastr.min.js')}}"></script>
@include('layouts.component.alert')

<script>
    $('#AdminID').addClass('active');
</script>
@endsection