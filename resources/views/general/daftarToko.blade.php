@extends('layouts.main')
@section('css-custom')
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('header')
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><span>Pendaftaran Toko</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    @if (!$toko)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="work-experience" class="section work-experience"
                                    action="{{ route('store-toko') }}" method="POST">
                                    @csrf
                                    <div class="info">
                                        <h5>Daftarkan Toko Anda Disini</h5>
                                        <small>Segera isi form dibawah ini agar admin dapat memproses pendaftaran toko
                                            Anda!</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="work-section">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="degree2">Nama Toko</label>
                                                            <input type="text" class="form-control mb-4" id="degree2"
                                                                placeholder="Nama Toko" value="" name="name"
                                                                required>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="degree3">Jenis Usaha</label>
                                                                    <select class="form-control basic" name="jenis_usaha"
                                                                        required>
                                                                        <option disabled selected>Pilih Jenis Usaha...
                                                                        </option>
                                                                        <option value="Grosir Sembako">Grosir Sembako
                                                                        </option>
                                                                        <option value="Grosir Makanan & Jajan">Grosir
                                                                            Makanan &
                                                                            Jajan</option>
                                                                        <option value="Grosir Pakaian">Grosir Pakaian
                                                                        </option>
                                                                        <option value="Elektronik">Elektronik</option>
                                                                        <option value="Obat-obatan">Obat-obatan</option>
                                                                        <option value="Material (Bangunan)">Material
                                                                            (Bangunan)
                                                                        </option>
                                                                        <option value="Kosmetik">Kosmetik</option>
                                                                    </select>
                                                                    @error('jenis_usaha')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="degree4">Alamat</label>
                                                                    <input type="text" class="form-control mb-4"
                                                                        id="degree4" placeholder="Alamat Toko"
                                                                        value="" name="alamat" required>
                                                                    @error('alamat')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Provinsi</label>
                                                                <select class="selectpicker form-control mb-4"
                                                                    id="provinsi" name="provinsi"
                                                                    data-live-search="true" required>
                                                                    <option value="" selected disabled>Pilih Provinsi
                                                                    </option>
                                                                </select>
                                                                @error('provinsi')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Kota atau Kabupaten</label>
                                                                <select class="selectpicker form-control mb-4"
                                                                    id="kota" name="kota" data-live-search="true"
                                                                    disabled>
                                                                    <option value="" selected disabled>Pilih
                                                                        Kota/Kabupaten</option>
                                                                </select>
                                                                @error('kota')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Kecamatan</label>
                                                                <select class="selectpicker form-control mb-4"
                                                                    id="kecamatan" name="kecamatan"
                                                                    data-live-search="true" disabled>
                                                                    <option value="" selected disabled>Pilih
                                                                        Kecamatan
                                                                    </option>
                                                                </select>
                                                                @error('kecamatan')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Kelurahan</label>
                                                                <select class="selectpicker form-control mb-4"
                                                                    id="kelurahan" name="kelurahan"
                                                                    data-live-search="true" disabled>
                                                                    <option value="" selected disabled>Pilih
                                                                        Kelurahan
                                                                    </option>
                                                                </select>
                                                                @error('kelurahan')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="">Deskripsi Toko</label>
                                                        <textarea class="form-control" placeholder="Jelaskkan secara singkat deskripsi toko Anda" name="deskripsi"
                                                            rows="4"></textarea>
                                                        @error('deskripsi')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-lg btn-primary submit-profile">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="row invoice layout-top-spacing layout-spacing">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="doc-container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="invoice-container">
                                                <div class="invoice-inbox">
                                                    <div id="ct" class="">
                                                        <div class="invoice-00001">
                                                            <div class="content-section">
                                                                <div class="inv--head-section inv--detail-section">
                                                                    <div class="info mb-5">
                                                                        <h5 class="">Detail Pendaftaran Toko</h5>
                                                                        <small>Harap sabar menunggu, admin sedang memproses
                                                                            pendaftaran
                                                                            toko Anda!
                                                                        </small>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-12 mr-auto">
                                                                            <div class="d-flex">
                                                                                <h3 class="in-heading align-self-center">
                                                                                    {{ strtoupper($toko->name) }}
                                                                                </h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 text-sm-right">
                                                                            <p class="inv-list-number">
                                                                                <span class="inv-title">STATUS : </span>
                                                                                @if ($toko->status == 1)
                                                                                    <span
                                                                                        class="badge outline-badge-warning">
                                                                                        Verifikasi
                                                                                    </span>
                                                                                @elseif ($toko->status == 2)
                                                                                    <span
                                                                                        class="badge outline-badge-primary">
                                                                                        Diterima
                                                                                    </span>
                                                                                @else
                                                                                    <span
                                                                                        class="badge outline-badge-danger">
                                                                                        Ditolak
                                                                                    </span>
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-6 align-self-center mt-3">
                                                                            <p class="inv-street-addr">
                                                                                {{ ucwords($toko->user->name) }}</p>
                                                                            <p class="inv-email-address">
                                                                                {{ $toko->user->email }}
                                                                            </p>
                                                                            <p class="inv-email-address">
                                                                                @if ($toko->user->notelp)
                                                                                    {{ $toko->user->notelp }}
                                                                                @else
                                                                                    -
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                                            <p class="inv-created-date">
                                                                                <span class="inv-title">Tanggal Pendaftaran
                                                                                    :</span>
                                                                                <span
                                                                                    class="inv-date">{{ \Carbon\Carbon::parse($toko->tgl_pendaftaran)->translatedFormat('l, d F Y') }}</span>
                                                                            </p>
                                                                            <p class="inv-due-date">
                                                                                <span class="inv-title">Tanggal Pengesahan
                                                                                    :</span>
                                                                                <span class="inv-date">
                                                                                    @if ($toko->tgl_pengesahan)
                                                                                        {{ \Carbon\Carbon::parse($toko->tgl_pengesahan)->translatedFormat('l, d F Y') }}
                                                                                    @else
                                                                                        -
                                                                                    @endif
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="inv--detail-section inv--customer-detail-section">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                            <p class="inv-to">Detail :</p>
                                                                        </div>
                                                                        <div
                                                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                                            <h6 class=" inv-title">Deskripsi Toko :</h6>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                            <p class="inv-customer-name">{{ $toko->jenis_usaha }}</p>
                                                                            <p class="inv-street-addr">
                                                                                {{ $toko->alamat }}
                                                                            </p>
                                                                            <p class="inv-email-address">
                                                                                {{ $toko->kelurahan }}, {{ $toko->kecamatan }}
                                                                            </p>
                                                                            <p class="inv-email-address">
                                                                                {{ $toko->kota }}, {{ $toko->provinsi }}
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                                            <div class="inv--payment-info">
                                                                                <p>
                                                                                    <span class=" inv-subtitle">
                                                                                        {{ $toko->deskripsi }}
                                                                                    </span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="inv--note">
                                                                        <div class="row mt-4">
                                                                            <div
                                                                                class="col-sm-12 col-12 order-sm-0 order-1">
                                                                                <p>Catatan: Terima kasih telah mempercayai
                                                                                    pengelolaan inventaris toko Anda bersama
                                                                                    kami
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('assets/js/profile/custom.js') }}"></script>
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Load provinces on page load
            $.get('/get-provinces', function(data) {
                let $provinsi = $('#provinsi');
                $provinsi.empty();
                $provinsi.append('<option value="" selected disabled>Pilih Provinsi</option>');
                $.each(data, function(index, province) {
                    $provinsi.append('<option value="' + province.prov_id + '">' + province
                        .prov_name + '</option>');
                });
                $provinsi.selectpicker('refresh');
            });

            // Load cities when province changes
            $('#provinsi').on('change', function() {
                let provId = $(this).val();
                if (provId) {
                    $.get('/get-cities/' + provId, function(data) {
                        let $kota = $('#kota');
                        $kota.prop('disabled', false);
                        $kota.empty();
                        $kota.append(
                            '<option value="" selected disabled>Pilih Kota/Kabupaten</option>');
                        $.each(data, function(index, city) {
                            $kota.append('<option value="' + city.city_id + '">' + city
                                .city_name + '</option>');
                        });
                        $kota.selectpicker('refresh');
                        $('#kecamatan').prop('disabled', true).selectpicker('refresh');
                        $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                    });
                } else {
                    $('#kota').prop('disabled', true).selectpicker('refresh');
                }
            });

            // Load districts when city changes
            $('#kota').on('change', function() {
                let cityId = $(this).val();
                if (cityId) {
                    $.get('/get-districts/' + cityId, function(data) {
                        let $kecamatan = $('#kecamatan');
                        $kecamatan.prop('disabled', false);
                        $kecamatan.empty();
                        $kecamatan.append(
                            '<option value="" selected disabled>Pilih Kecamatan</option>');
                        $.each(data, function(index, district) {
                            $kecamatan.append('<option value="' + district.dis_id + '">' +
                                district.dis_name + '</option>');
                        });
                        $kecamatan.selectpicker('refresh');
                        $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                    });
                } else {
                    $('#kecamatan').prop('disabled', true).selectpicker('refresh');
                }
            });

            // Load subdistricts when district changes
            $('#kecamatan').on('change', function() {
                let disId = $(this).val();
                if (disId) {
                    $.get('/get-subdistricts/' + disId, function(data) {
                        let $kelurahan = $('#kelurahan');
                        $kelurahan.prop('disabled', false);
                        $kelurahan.empty();
                        $kelurahan.append(
                            '<option value="" selected disabled>Pilih Kelurahan</option>');
                        $.each(data, function(index, subdistrict) {
                            $kelurahan.append('<option value="' + subdistrict.subdis_id +
                                '">' + subdistrict.subdis_name + '</option>');
                        });
                        $kelurahan.selectpicker('refresh');
                    });
                } else {
                    $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                }
            });

            @if (session('showAlert'))
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em'
                });

                @if ($errors->any())
                    toast({
                        type: 'error',
                        title: @if ($errors->has('general'))
                            '{{ $errors->first('general') }}'
                        @else
                            '{{ $errors->first() }}'
                        @endif ,
                        padding: '2em',
                    });
                @elseif (session('message'))
                    toast({
                        type: 'success',
                        title: '{{ session('message') }}',
                        padding: '2em',
                    });
                @endif
            @endif

            $('#work-experience').on('submit', function() {
                if ($('.text-danger').length > 0) {
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    });
                    toast({
                        type: 'error',
                        title: $('.text-danger').first().text(),
                        padding: '2em',
                    });
                }
            });
        });
    </script>
@endsection
