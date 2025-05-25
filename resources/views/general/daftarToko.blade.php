@extends('layouts.main')
@section('css-custom')
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/apps/invoice-preview.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Pendaftaran Toko</span>
                                </li>
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
                            <form id="work-experience" class="section work-experience">
                                <div class="info">
                                    <h5>Daftarkan Toko Anda Disini</h5>
                                    <small>Segera isi form dibawah ini agar admin dapat memproses pendaftaran toko
                                        Anda!
                                    </small>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="work-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="degree2">Nama Toko</label>
                                                        <input type="text" class="form-control mb-4" id="degree2"
                                                            placeholder="Nama Toko" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree3">Jenis Usaha</label>
                                                                <select class="form-control  basic">
                                                                    <option disabled selected>Pilih Jenis Usaha...
                                                                    </option>
                                                                    <option value="Grosir Sembako">Grosir Sembako
                                                                    </option>
                                                                    <option value="Grosir Makanan & Jajan">Grosir
                                                                        Makanan & Jajan</option>
                                                                    <option value="Grosir Pakaian">Grosir Pakaian
                                                                    </option>
                                                                    <option value="Elektronik">Elektronik</option>
                                                                    <option value="Obat-obatan">Obat-obatan</option>
                                                                    <option value="Material (Bangunan)">Material
                                                                        (Bangunan)</option>
                                                                    <option value="Kosmetik">Kosmetik</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="degree4">Alamat</label>
                                                                <input type="text" class="form-control mb-4"
                                                                    id="degree4" placeholder="Alamat Toko" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Provinsi</label>
                                                            <select class="selectpicker form-control mb-4"
                                                                data-live-search="true">
                                                                <option selected disabled>Pilih Provinsi
                                                                </option>
                                                                <option>Jawa Timur</option>
                                                                <option>Jawa Barat</option>
                                                                <option>Papua
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Kota atau Kabupaten</label>
                                                            <select class="selectpicker form-control mb-4"
                                                                data-live-search="true">
                                                                <option selected disabled>Pilih
                                                                    Kota/Kabupaten</option>
                                                                <option>Jawa Timur</option>
                                                                <option>Jawa Barat</option>
                                                                <option>Papua
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Kecamatan</label>
                                                            <select class="selectpicker form-control mb-4"
                                                                data-live-search="true">
                                                                <option selected disabled>Pilih
                                                                    Kecamatan</option>
                                                                <option>Jawa Timur</option>
                                                                <option>Jawa Barat</option>
                                                                <option>Papua
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Kelurahan</label>
                                                            <select class="selectpicker form-control mb-4"
                                                                data-live-search="true">
                                                                <option selected disabled>Pilih
                                                                    Kelurahan</option>
                                                                <option>Jawa Timur</option>
                                                                <option>Jawa Barat</option>
                                                                <option>Papua
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Deskripsi Toko</label>
                                                    <textarea class="form-control" placeholder="Jelaskkan secara singkat deskripsi toko Anda" rows=""></textarea>
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
                                                                            <h3 class="in-heading align-self-center">NAMA
                                                                                TOKO
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 text-sm-right">
                                                                        <p class="inv-list-number">
                                                                            <span class="inv-title">STATUS : </span>
                                                                            <span class="badge outline-badge-warning">
                                                                                Verifikasi
                                                                            </span>
                                                                            {{-- <span class="badge outline-badge-primary">
                                                                                Diterima
                                                                            </span>
                                                                            <span class="badge outline-badge-danger">
                                                                                Ditolak
                                                                            </span> --}}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-6 align-self-center mt-3">
                                                                        <p class="inv-street-addr">Bayu Safutra</p>
                                                                        <p class="inv-email-address">bayusafutra@gmail.com
                                                                        </p>
                                                                        <p class="inv-email-address">0881965278623</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                                        <p class="inv-created-date">
                                                                            <span class="inv-title">Tanggal Pendaftaran
                                                                                :</span>
                                                                            <span class="inv-date">20 Aug 2020</span>
                                                                        </p>
                                                                        <p class="inv-due-date">
                                                                            <span class="inv-title">Tanggal Pengesahan
                                                                                :</span>
                                                                            <span class="inv-date">26 Aug 2020</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="inv--detail-section inv--customer-detail-section">
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
                                                                        <p class="inv-customer-name">Grosir sembako</p>
                                                                        <p class="inv-street-addr">Jalan in aja dulu No 23
                                                                        </p>
                                                                        <p class="inv-email-address">Jemursari, Wonocolo
                                                                        </p>
                                                                        <p class="inv-email-address">Surabaya, Jawa Timur
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                                        <div class="inv--payment-info">
                                                                            <p>
                                                                                <span class=" inv-subtitle">
                                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                                    adipiscing elit. Duis porttitor.
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="inv--note">
                                                                    <div class="row mt-4">
                                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
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
                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/dropify/dropify.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="assets/js/users/account-settings.js"></script>
    <script src="assets/js/profile/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
@endsection
