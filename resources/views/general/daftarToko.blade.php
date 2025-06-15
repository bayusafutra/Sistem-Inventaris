@extends('layouts.main')
@section('css-custom')
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
@endsection
@section('header')
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="work-experience" class="section work-experience" action="{{ route('store-toko') }}" method="POST">
                                @csrf
                                <div class="info">
                                    <h5>Daftarkan Toko Anda Disini</h5>
                                    <small>Segera isi form dibawah ini agar admin dapat memproses pendaftaran toko Anda!</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="work-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="degree2">Nama Toko</label>
                                                        <input type="text" class="form-control mb-4" id="degree2" placeholder="Nama Toko" value="" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree3">Jenis Usaha</label>
                                                                <select class="form-control basic" name="jenis_usaha">
                                                                    <option disabled selected>Pilih Jenis Usaha...</option>
                                                                    <option value="Grosir Sembako">Grosir Sembako</option>
                                                                    <option value="Grosir Makanan & Jajan">Grosir Makanan & Jajan</option>
                                                                    <option value="Grosir Pakaian">Grosir Pakaian</option>
                                                                    <option value="Elektronik">Elektronik</option>
                                                                    <option value="Obat-obatan">Obat-obatan</option>
                                                                    <option value="Material (Bangunan)">Material (Bangunan)</option>
                                                                    <option value="Kosmetik">Kosmetik</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree4">Alamat</label>
                                                                <input type="text" class="form-control mb-4" id="degree4" placeholder="Alamat Toko" value="" name="alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Provinsi</label>
                                                            <select class="selectpicker form-control mb-4" id="provinsi" name="provinsi" data-live-search="true">
                                                                <option value="" selected disabled>Pilih Provinsi</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Kota atau Kabupaten</label>
                                                            <select class="selectpicker form-control mb-4" id="kota" name="kota" data-live-search="true" disabled>
                                                                <option value="" selected disabled>Pilih Kota/Kabupaten</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Kecamatan</label>
                                                            <select class="selectpicker form-control mb-4" id="kecamatan" name="kecamatan" data-live-search="true" disabled>
                                                                <option value="" selected disabled>Pilih Kecamatan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Kelurahan</label>
                                                            <select class="selectpicker form-control mb-4" id="kelurahan" name="kelurahan" data-live-search="true" disabled>
                                                                <option value="" selected disabled>Pilih Kelurahan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Deskripsi Toko</label>
                                                    <textarea class="form-control" placeholder="Jelaskkan secara singkat deskripsi toko Anda" name="deskripsi" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-lg btn-primary submit-profile">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <script src="plugins/sweetalerts/promise-polyfill.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
    <script>
        $(document).ready(function() {
            // Load provinces on page load
            $.get('/get-provinces', function(data) {
                let $provinsi = $('#provinsi');
                $provinsi.empty();
                $provinsi.append('<option value="" selected disabled>Pilih Provinsi</option>');
                $.each(data, function(index, province) {
                    $provinsi.append('<option value="' + province.prov_name + '">' + province.prov_name + '</option>');
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
                        $kota.append('<option value="" selected disabled>Pilih Kota/Kabupaten</option>');
                        $.each(data, function(index, city) {
                            $kota.append('<option value="' + city.city_name + '">' + city.city_name + '</option>');
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
                        $kecamatan.append('<option value="" selected disabled>Pilih Kecamatan</option>');
                        $.each(data, function(index, district) {
                            $kecamatan.append('<option value="' + district.dis_name + '">' + district.dis_name + '</option>');
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
                        $kelurahan.append('<option value="" selected disabled>Pilih Kelurahan</option>');
                        $.each(data, function(index, subdistrict) {
                            $kelurahan.append('<option value="' + subdistrict.subdis_name + '">' + subdistrict.subdis_name + '</option>');
                        });
                        $kelurahan.selectpicker('refresh');
                    });
                } else {
                    $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                }
            });
        });
    </script>
@endsection