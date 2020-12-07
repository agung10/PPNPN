@extends('layouts.app')

@section('PageVendorCSS')
<link rel="stylesheet" href="{{asset('app-assets/upload/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/datedropper.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/vendors/css/extensions/timedropper.min.css')}}">
@endsection

@section('PageCSS')
@if(\Auth::user()->role == "AdminUtama" || \Auth::user()->role == "Administrator")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
@elseif(\Auth::user()->role == "User")
<link rel="stylesheet" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
@endif
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/forms/wizard.min.css')}}">
<link rel="stylesheet" href="{{asset('app-assets/css/plugins/forms/extended/form-extended.min.css')}}">
@endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Form Isian Pelamar</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Halaman Utama</a>
                            </li>
                            <li class="breadcrumb-item active">Form Pelamar
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Form wzard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <b>
                                        <h4 class="card-title" style="font-size: 20px;">Masukan Data Anda!</h4>
                                    </b>
                                    <span class="card-title">Informasi ini akan memberi tahu kami lebih banyak tentang anda.</span>
                                </center>
                                <hr>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form id="formPelamar" method="POST" action="{{ route('data_pelamar.store') }}"  class="steps-validation wizard-notification" enctype="multipart/form-data">
                                    @csrf
                                        <!-- Step 1 -->
                                        <h6>Data Pribadi</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="file" id="input-file-events" class="dropify-event" data-default-file="{{asset('app-assets/images/profile/user-default.jpg')}}" name="foto">
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="no_ktp">
                                                                Nomor KTP :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="no_ktp" name="no_ktp" maxlength="16" placeholder="Masukan nomor KTP">

                                                            <label for="" style="color:#999;font-size:13px;">Terdiri dari 16 digit angka!</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nama">
                                                                Nama Lengkap :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama lengkap">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tmpt_lahir">
                                                            Tempat Lahir :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Masukan tempat lahir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_lahir">
                                                            Tanggal Lahir :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="animate" name="tgl_lahir" placeholder="Masukan tanggal lahir">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">
                                                            Jenis Kelamin
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <select class="select2 form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                            <option disabled="" selected="">Jenis Kelamin</option>
                                                            <option value="Laki-laki"> Laki-laki </option>
                                                            <option value="Perempuan"> Perempuan </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ktp">
                                                            Scan KTP Berwarna (Asli)
                                                        </label>
                                                        <input type="file" class="form-control" id="ktp" name="ktp">
                                                        <label for="" style="color:#999;font-size:13px;">Format: Gambar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6>Data Sekolah</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="no_ijazah">
                                                            Nomor Ijazah :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="no_ijazah" name="no_ijazah" placeholder="Masukan nomor ijazah">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="nm_sekolah">
                                                            Nama Sekolah :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="nm_sekolah" name="nm_sekolah" placeholder="Masukan nama sekolah">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="jenjang">
                                                            Jenjang
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <select class="select2 form-control" id="jenjang" name="jenjang">
                                                            <option disabled selected>Pilih Jenjang Pendidikan</option>
                                                            <option value="SMA/SLTA Sederajat"> SMA/SLTA Sederajat </option>
                                                            <option value="D3"> D3 </option>
                                                            <option value="D4/S1"> D4/S1 </option>
                                                            <option value="S2"> S2 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="fakultas">
                                                            Fakultas :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Masukan nama fakultas">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="jurusan">
                                                            Jurusan :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukan nama jurusan">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="ipk">
                                                            Nilai IPK :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="ipk" name="ipk" placeholder="Masukan nilai IPK">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ijazah">
                                                            Scan Ijazah (Asli)
                                                        </label>
                                                        <input type="file" class="form-control" id="ijazah" name="ijazah">
                                                        <label for="" style="color:#999;font-size:13px;">Format: Gambar</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="transkrip">
                                                            Scan Transkip Nilai (Asli)
                                                        </label>
                                                        <input type="file" class="form-control" id="transkrip" name="transkrip">
                                                        <label for="" style="color:#999;font-size:13px;">Format: Gambar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 3 -->
                                        <h6>Data Jabatan</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nm_jabatan">
                                                            Pilih Jabatan
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <select class="select2 form-control" id="nm_jabatan" name="nm_jabatan">
                                                            <option disabled selected>Pilih Jabatan</option>
                                                            @foreach($nm_jabatans as $res)
                                                            <option value="{{ $res->nm_jabatan }}">{{ $res->nm_jabatan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <input type="hidden" id="jabatan_id" name="jabatan_id">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kd_jabatan">
                                                            Kode Jabatan
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <select class="select2 form-control" id="kd_jabatan" name="kd_jabatan">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kualifikasi_pend">
                                                            Kualifikasi Pendidikan
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input id="kualifikasi_pend" class="form-control" name="kualifikasi_pend" type="text">

                                                        <label for="" style="color:#999;font-size:13px;">Otomatis</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lokasi_jabatan">
                                                            Lokasi Jabatan
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input id="lokasi_jabatan" class="form-control" name="lokasi_jabatan" type="text">

                                                        <label for="" style="color:#999;font-size:13px;">Otomatis</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="srt_lamaran">
                                                            Surat Lamaran (Ditandatangani di atas materai)
                                                        </label>
                                                        <input type="file" class="form-control" id="srt_lamaran" name="srt_lamaran">
                                                        <label for="" style="color:#999;font-size:13px;">Format: PDF</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lembar_isian">
                                                            Lembar Isian
                                                        </label>
                                                        <input type="file" class="form-control" id="lembar_isian" name="lembar_isian">
                                                        <label for="" style="color:#999;font-size:13px;">Format: PDF</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wzard with step validation section end -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('PageVendorJS')
<script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/datedropper.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/timedropper.min.js')}}"></script>
<script src="{{asset('app-assets/upload/dropify/js/dropify.min.js')}}"></script>
@endsection

@section('PageJS')
<script src="{{asset('app-assets/js/scripts/forms/wizard-steps.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
<script src="{{asset('app-assets/upload/form-file-uploads.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/extensions/date-time-dropper.min.js')}}"></script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        
        return true;
    }
</script>

<script>
    $('#kd_jabatan').attr('disabled', 'disabled');
    $('#nm_jabatan').change(function() {
        var nm_jabatan = $(this).val();
        if (nm_jabatan) {
            $.ajax({
                type: "GET",
                url: "{{ url('getNamaJabatan') }}?nama_jabatan=" + nm_jabatan,
                success: function(key) {
                    if (key) {
                        $('#kualifikasi_pend').val('')
                        $('#lokasi_jabatan').val('')
                        $('#kd_jabatan').empty()
                        $('#kd_jabatan').attr('disabled', false)
                        $('#kd_jabatan').append('<option value="" disabled selected>Kode Jabatan</option>')
                        $.each(key, function(res, value) {
                            $('#kd_jabatan').append('<option value="' + value.kd_jabatan + '">' + value.kd_jabatan + '</option>')
                        })
                    }
                }
            })
        }
    })

    $('#kualifikasi_pend').attr('value', '');
    $('#lokasi_jabatan').attr('value', '');
    $('#kualifikasi_pend').attr('disabled', '');
    $('#lokasi_jabatan').attr('disabled', '');
    $('#kd_jabatan').change(function() {
        var kd_jabatan = $(this).val();
        if (kd_jabatan) {
            $.ajax({
                type: "GET",
                url: "{{ url('getKodeJabatan') }}?kode_jabatan=" + kd_jabatan,
                success: function(key) {
                    if (key) {
                        $.each(key, function(res, value) {
                            $('#kualifikasi_pend').val(value.kualifikasi_pend);
                            $('#lokasi_jabatan').val(value.lokasi_jabatan);
                            $('#jabatan_id').val(value.id);
                        })
                    }
                }
            })
        }
    })
</script>
@endsection