@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-modal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <style>
        table thead {
            background-color: #f0f5ff;
        }

        table tbody tr td button {
            background: none;
            border: none;
        }

        .table-form {
            display: flex;
            margin: 17px 5px 25px 5px;
            justify-content: space-between;
            align-items: center;
        }

        .table-form .col-lg-8 {
            padding-right: 15px;
        }

        .table-form .col-lg-4 {
            display: flex;
            justify-content: flex-end;
            padding-left: 15px;
        }

        strong.title {
            font-weight: 900;
        }

        .position-relative {
            position: relative;
        }

        .clear-icon {
            position: absolute;
            right: 22px;
            top: 45%;
            transform: translateY(-50%);
            cursor: pointer;
            display: none;
            font-weight: bold;
            color: #888ea8;
        }

        .clear-icon:hover {
            color: #e7515a;
        }

        .outline-badge-success {
            padding: 2.2px 19px
        }

        .outline-badge-warning {
            padding: 2.2px 19px
        }

        .form-control-sm.flatpickr {
            padding-right: 30px;
        }

        .product-list {
            max-height: 200px;
            overflow-y: auto;
            padding: 10px;
        }

        .product-item {
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 0;
            margin-bottom: 5px;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .number-list {
            font-weight: 500;
            color: #333;
            margin-right: 10px;
            min-width: 20px;
            text-align: right;
        }

        .product-name {
            font-weight: 500;
            color: #333;
            flex-grow: 1;
        }

        .product-quantity {
            color: #666;
            font-weight: 400;
            margin-left: 10px;
        }

        hr.line {
            border: 1.5px solid black
        }

        h5 {
            font-weight: 900;
            font-size: 20px;
        }

        input.list-item {
            padding: 11px 10px;
        }

        input#ga {
            font-size: 16.5px;
        }

        .row .no-list {
            font-weight: 700;
            font-size: 25px;
            color: #3b3f5c;
            display: flex;
            align-items: center;
        }

        .row .icon-delete {
            display: flex;
            align-items: flex-start;
        }

        .icon-delete button {
            background: none;
            border: none;
        }

        .icon-delete button svg.delete-list {
            cursor: pointer;
            color: #e7515a;
            stroke-width: 2.5;
        }

        .modal-body .add-s-produk {
            transition: all 0.3s ease-out;
            -webkit-transition: all 0.3s ease-out;
            text-align: center;
        }

        .modal-body .add-s-produk button {
            background: none;
            border: none;
        }

        .modal-body .add-s-produk:hover {
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
        }

        .modal-body .add-s-produk .addProduk {
            display: block;
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 700;
            text-align: center;
            display: inline-block;
            cursor: pointer;
        }

        .modal-body .add-s-produk .addProduk:hover {
            color: #4361ee;
        }

        .modal-body .add-s-produk .addProduk svg {
            width: 20px;
            height: 20px;
            vertical-align: text-top;
        }

        .flatpickr-calendar {
            z-index: 1060 !important;
        }

        .custom-file-container__custom-file__custom-file-control__button {
            box-sizing: border-box;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 6;
            display: block;
            height: auto;
            padding: 10px 16px;
            line-height: 1.25;
            background-color: rgba(27, 85, 226, 0.239216);
            color: black;
            border-left: 1px solid #e0e6ed;
            box-sizing: border-box;
        }

        .custom-file-container__image-preview {
            box-sizing: border-box;
            transition: all 0.2s ease;
            margin-top: 34px;
            margin-bottom: 25px;
            height: 250px;
            width: 100%;
            border-radius: 4px;
            background-size: contain;
            background-position: center center;
            background-repeat: no-repeat;
            background-color: #fff;
            overflow: auto;
            padding: 15px;
        }

        .col-lg-3,
        .col-lg-9 {
            min-height: 40px;
        }

        h5 {
            margin-bottom: 0;
        }

        .via-pr,
        .switch {
            display: inline-flex;
            align-items: center;
        }

        .via-pr strong {
            font-weight: 900;
            font-size: 14px;
        }

        .switch {
            margin-bottom: 0;
        }

        .row.px-3 {
            display: flex;
            align-items: center;
            margin-top: 20px;
            width: 100%;
        }

        .col-lg-1,
        .col-lg-5 {
            display: flex;
            align-items: center;
            padding: 0 15px;
            max-width: 100%;
        }

        /* Atur no-list */
        .no-list {
            justify-content: center;
            width: 100%;
        }

        /* Atur form-group */
        .form-group.mb-3 {
            margin-bottom: 0 !important;
            width: 100%;
        }

        /* Atur icon-delete */
        .icon-delete {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        /* Atur lebar selectpicker */
        .selectpicker,
        .bootstrap-select {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;
        }

        /* Atur lebar dropdown selectpicker */
        .bootstrap-select .dropdown-menu {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 100% !important;
        }

        /* Pastikan tombol delete rapi */
        .icon-delete button {
            padding: 0;
            background: none;
            border: none;
            width: 100%;
            height: 44px;
        }

        [class*="col-lg-"]>* {
            box-sizing: border-box;
        }
    </style>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Nama Toko</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Manager</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Restock</span></li>
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
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-form row px-0">
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <label for="min" class="col-sm-3 col-form-label col-form-label-sm">Tanggal
                                        Restock:</label>
                                    <div class="col-sm-4 position-relative">
                                        <input type="text" class="form-control form-control-sm flatpickr" name="min"
                                            id="min" placeholder="Pilih tanggal awal">
                                        <span class="clear-icon" id="clear-min">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-sm-4 position-relative">
                                        <input type="text" class="form-control form-control-sm flatpickr"
                                            name="max" id="max" placeholder="Pilih tanggal akhir">
                                        <span class="clear-icon" id="clear-max">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row" style="margin-right: 0.3px">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#add" title="Tambah Data">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus-square">
                                            <rect x="3" y="3" width="18" height="18" rx="2"
                                                ry="2">
                                            </rect>
                                            <line x1="12" y1="8" x2="12" y2="16"></line>
                                            <line x1="8" y1="12" x2="16" y2="12"></line>
                                        </svg>
                                        Tambah Data
                                    </button>
                                    <!-- Modal Add -->
                                    <div class="modal fade" id="add" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data
                                                        Restock
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <svg style="color: black" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18">
                                                            </line>
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18">
                                                            </line>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form id="addForm" action="#" method="">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group mb-4">
                                                                    <label>No Series</label>
                                                                    <input type="text" class="form-control"
                                                                        name="no_series" placeholder="No Series" required
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-4">
                                                                    <label>Tanggal dan Waktu</label>
                                                                    <input id="dateTimeFlatpickr" value="2020-09-19 12:00"
                                                                        class="form-control flatpickr flatpickr-input active"
                                                                        type="text" placeholder="Select Date..">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="custom-file-container"
                                                                    data-upload-id="mySecondImage">
                                                                    <label>Foto Bukti Restock (bisa lebih dari 1) <a
                                                                            href="javascript:void(0)"
                                                                            class="custom-file-container__image-clear"
                                                                            title="Clear Image">x</a></label>
                                                                    <label class="custom-file-container__custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-container__custom-file__custom-file-input"
                                                                            multiple>
                                                                        <input type="hidden" name="MAX_FILE_SIZE"
                                                                            value="10485760" />
                                                                        <span
                                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                                    </label>
                                                                    <div class="custom-file-container__image-preview">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="line">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-3 d-flex align-items-center">
                                                                <h5>List Produk</h5>
                                                            </div>
                                                            <div
                                                                class="col-lg-9 d-flex justify-content-end align-items-center">
                                                                <div class="via-pr mr-3">
                                                                    <strong>Melalui Pengadaan Restock?</strong>
                                                                </div>
                                                                <label
                                                                    class="switch s-icons s-outline s-outline-dark mr-2">
                                                                    <input type="checkbox" id="restockCheckbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-4 my-3 mr-3" id="pengadaanSelect"
                                                                style="display: none; margin-left: auto;">
                                                                <select class="selectpicker form-control"
                                                                    data-live-search="true" required>
                                                                    <option selected disabled>Pilih No Series Pengadaan
                                                                    </option>
                                                                    <option>PGDRST30052025-1107</option>
                                                                    <option>PGDRST30052025-1108</option>
                                                                    <option>PGDRST30052025-1109</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="list-item-produk" class="row px-3">
                                                            <div class="col-lg-1 no-list">
                                                                <span>1.</span>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group mb-3">
                                                                    <select class="selectpicker form-control"
                                                                        data-live-search="true" required>
                                                                        <option selected disabled>Pilih Produk
                                                                        </option>
                                                                        <option>Beras 10Kg</option>
                                                                        <option>Gula 1Kg</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group mb-3">
                                                                    <div class="input-group">
                                                                        <input id="ga" type="number"
                                                                            min="1" class="form-control list-item"
                                                                            placeholder="Jumlah Satuan" required>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon6">Karung</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="icon-delete">
                                                                    <button class="" type="button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="44" height="44"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-trash-2 delete-list">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11"
                                                                                x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11"
                                                                                x2="14" y2="17"></line>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="add-s-produk mt-3">
                                                            <button class="addProduk" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-plus-circle">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                    <line x1="12" y1="8" x2="12"
                                                                        y2="16"></line>
                                                                    <line x1="8" y1="12" x2="16"
                                                                        y2="12"></line>
                                                                </svg> Tambah Produk
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i
                                                                class="flaticon-cancel-12"></i>Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="html5-extension" class="display table table-hover non-hover table-striped"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Series</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tanggal Restock</th>
                                    <th>Pengadaan Restock</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>RST02062025-1102</td>
                                    <td>Bayu Safutra</td>
                                    <td>{{ \Carbon\Carbon::parse('2025/05/30')->translatedFormat('l, d F Y') }}</td>
                                    <td>PGDRST30052025-1107</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#tabsModal"
                                            title="Detail Pengadaan Restock">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-list table-cancel">
                                                <line x1="8" y1="6" x2="21" y2="6">
                                                </line>
                                                <line x1="8" y1="12" x2="21" y2="12">
                                                </line>
                                                <line x1="8" y1="18" x2="21" y2="18">
                                                </line>
                                                <line x1="3" y1="6" x2="3.01" y2="6">
                                                </line>
                                                <line x1="3" y1="12" x2="3.01" y2="12">
                                                </line>
                                                <line x1="3" y1="18" x2="3.01" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </td>
                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="tabsModal" tabindex="-1" role="dialog"
                                        aria-labelledby="tabsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tabsModalLabel">Detail Pengadaan Restock
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="contact-tab" data-toggle="tab"
                                                                href="#contact" role="tab" aria-controls="contact"
                                                                aria-selected="false">Catatan</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="staff-tab" data-toggle="tab"
                                                                href="#staff" role="tab" aria-controls="staff"
                                                                aria-selected="false">List Produk</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="contact"
                                                            role="tabpanel" aria-labelledby="contact-tab">
                                                            <p class="modal-text">Pellentesque semper tortor id ligula
                                                                ultrices suscipit. Donec viverra vulputate lectus non
                                                                consectetur. Donec ac interdum lacus. Donec euismod nisi
                                                                at justo molestie elementum. Vivamus vitae hendrerit
                                                                neque. Orci varius natoque penatibus et magnis dis
                                                                parturient montes, nascetur ridiculus mus.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="staff" role="tabpanel"
                                                            aria-labelledby="staff-tab">
                                                            <div class="product-list">
                                                                <div class="product-item">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span class="number-list">1.</span>
                                                                        <span class="product-name">Beras 5kg</span>
                                                                        <span class="product-quantity">20 Karung</span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-item">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <span class="number-list">2.</span>
                                                                        <span class="product-name">Gula 1kg</span>
                                                                        <span class="product-quantity">20 Pcs</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-dismiss="modal"><i
                                                            class="flaticon-cancel-12"></i> Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Series</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tanggal Pengadaan</th>
                                    <th>Pengadaan Restock</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection
@section('js-custom')
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/notification/custom-snackbar.js') }}"></script>
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage')
        const minPicker = $("#min").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
            onChange: function(selectedDates, dateStr) {
                $("#clear-min").toggle(!!dateStr);
                $('#html5-extension').DataTable().draw();
            }
        });

        const maxPicker = $("#max").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
            onChange: function(selectedDates, dateStr) {
                $("#clear-max").toggle(!!dateStr);
                $('#html5-extension').DataTable().draw();
            }
        });

        function convertDateFormat(dateStr) {
            if (!dateStr) return null;

            const parts = dateStr.split(', ');
            if (parts.length !== 2) return null;

            const dateParts = parts[1].split(' ');
            if (dateParts.length !== 3) return null;

            const day = dateParts[0];
            const monthName = dateParts[1];
            const year = dateParts[2];

            const months = {
                'Januari': '01',
                'Februari': '02',
                'Maret': '03',
                'April': '04',
                'Mei': '05',
                'Juni': '06',
                'Juli': '07',
                'Agustus': '08',
                'September': '09',
                'Oktober': '10',
                'November': '11',
                'Desember': '12'
            };

            const month = months[monthName];
            if (!month) return null;

            return `${year}-${month}-${day.padStart(2, '0')}`;
        }

        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var min = $("#min").val();
            var max = $("#max").val();
            var dateStr = data[2];
            var date = convertDateFormat(dateStr);

            var dateObj = date ? new Date(date) : null;
            var minDate = min ? new Date(min) : null;
            var maxDate = max ? new Date(max) : null;

            if (!minDate && !maxDate) return true;
            if (minDate && !maxDate && dateObj) return dateObj >= minDate;
            if (!minDate && maxDate && dateObj) return dateObj <= maxDate;
            if (minDate && maxDate && dateObj) return dateObj >= minDate && dateObj <= maxDate;
            return false;
        });

        $("#clear-min").on("click", function() {
            minPicker.clear();
            $("#clear-min").hide();
            $('#html5-extension').DataTable().draw();
        });

        $("#clear-max").on("click", function() {
            maxPicker.clear();
            $("#clear-max").hide();
            $('#html5-extension').DataTable().draw();
        });

        $('#html5-extension').DataTable({
            "dom": "<'dt--top-section'<'row d-flex justify-content-between'<'col-sm-4 d-flex justify-content-start'l><'col-sm-4 d-flex justify-content-center'B><'col-sm-4 d-flex justify-content-end'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [10, 20, 25, 50, 100],
            "pageLength": 10
        });

        var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            defaultDate: new Date(),
            time_24hr: true,
            allowInput: true,
            position: 'auto end',
            maxDate: new Date(),
            onReady: function(selectedDates, dateStr, instance) {
                var now = new Date();
                if (selectedDates[0] && selectedDates[0].toDateString() === now.toDateString()) {
                    var maxTime = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString()
                        .padStart(2, '0');
                    instance.set('maxTime', maxTime); // Misalnya: "03:49" kalau hari ini
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                var now = new Date();
                if (selectedDates[0] && selectedDates[0].toDateString() === now.toDateString()) {
                    var maxTime = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString()
                        .padStart(2, '0');
                    instance.set('maxTime', maxTime); // Set maxTime kalau hari ini
                } else {
                    instance.set('maxTime', null); // Hapus maxTime kalau bukan hari ini
                }
            }
        });

        // Event manual untuk tutup
        document.addEventListener('click', function(event) {
            var flatpickrInput = document.getElementById('dateTimeFlatpickr');
            var flatpickrCalendar = document.querySelector('.flatpickr-calendar.open');
            if (flatpickrCalendar && !flatpickrInput.contains(event.target) && !flatpickrCalendar.contains(event
                    .target)) {
                f2.close();
            }
        });

        $(document).ready(function() {
            // Inisialisasi Selectpicker saat checkbox di-check
            $('#restockCheckbox').on('change', function() {
                var $pengadaanSelect = $('#pengadaanSelect');
                if ($(this).is(':checked')) {
                    $pengadaanSelect.show();
                    $pengadaanSelect.find('.selectpicker').selectpicker({
                        liveSearch: true
                    });
                } else {
                    $pengadaanSelect.hide();
                    $pengadaanSelect.find('.selectpicker').selectpicker('destroy'); // Hapus inisialisasi
                }
            });

            // Pastikan selectpicker di-destroy saat modal ditutup
            $('#add').on('hidden.bs.modal', function() {
                $('#pengadaanSelect').hide();
                $('#pengadaanSelect .selectpicker').selectpicker('destroy');
            });
        });

        $(document).ready(function() {
            // Variabel counter untuk ID unik
            let listCounter = 1;

            // Pastikan container ada, jika tidak, tambah secara dinamis
            let $listContainer = $('#list-container');
            if ($listContainer.length === 0) {
                $listContainer = $('<div id="list-container"></div>');
                $('#list-item-produk').wrap($listContainer);
            }

            // Simpan HTML mentah dari elemen <select class="selectpicker"> asli
            const selectPickerHtml = $('#list-item-produk .selectpicker').prop('outerHTML');

            // Simpan template statis tanpa selectpicker yang sudah diubah
            const initialTemplate = $('#list-item-produk.row.px-3').clone();
            initialTemplate.find('.selectpicker').remove();
            initialTemplate.find('.bootstrap-select').remove();

            // Fungsi untuk update nomor list
            function updateListNumbers() {
                $('.row.px-3').each(function(index) {
                    $(this).find('.no-list span').text((index + 1) + '.');
                });
            }

            // Tambah Produk
            $('.addProduk').off('click').one('click', function handleAddProduct() {
                // Buat template baru dari template statis
                var template = initialTemplate.clone();

                // Hapus ID lama dan tambah ID unik
                template.removeAttr('id');
                var uniqueId = 'list-produk-' + (++listCounter);
                template.attr('id', uniqueId);

                // Pastikan class row dan px-3 ada
                template.addClass('row px-3');

                // Ganti elemen selectpicker dengan HTML asli
                template.find('.col-lg-5 .form-group.mb-3').first().html(selectPickerHtml);

                // Reset input di list baru dan disable input satuan
                template.find('select').val('');
                template.find('input[type="number"]').val('').prop('disabled', true);

                // Tambahkan list baru ke container parent di akhir
                $('#list-container').append(template);

                // Update nomor list
                updateListNumbers();

                // Inisialisasi ulang Selectpicker untuk elemen baru
                try {
                    var newSelectpicker = template.find('.selectpicker');
                    newSelectpicker.selectpicker({
                        liveSearch: true
                    });
                    newSelectpicker.on('changed.bs.select', function() {
                        // Enable input satuan saat opsi dipilih
                        $(this).closest('.row.px-3').find('input[type="number"]').prop('disabled',
                            false);
                    });
                } catch (e) {
                    // Error ditangani tanpa logging
                }

                // Re-bind event untuk klik berikutnya
                $('.addProduk').one('click', handleAddProduct);
            });

            // Pastikan modal sudah terbuka untuk binding event hapus dan inisialisasi awal
            $('#add').on('shown.bs.modal', function() {
                // Inisialisasi Selectpicker pertama saat modal dibuka
                $('#list-item-produk .selectpicker').selectpicker({
                    liveSearch: true
                });

                // Disable input satuan di list awal kecuali sudah dipilih
                var initialSelectpicker = $('#list-item-produk .selectpicker');
                var initialInput = $('#list-item-produk input[type="number"]');
                if (initialSelectpicker.val() === '' || initialSelectpicker.val() === null) {
                    initialInput.prop('disabled', true);
                }
                initialSelectpicker.on('changed.bs.select', function() {
                    initialInput.prop('disabled', false);
                });

                // Hapus List Produk dengan event delegation
                $('#list-container').on('click', '.icon-delete button', function() {
                    var listCount = $('.row.px-3').length;
                    if (listCount <= 1) {
                        Snackbar.show({
                            text: 'Minimal harus ada 1 list produk!',
                            pos: 'bottom-left'
                        });
                        return;
                    }
                    $(this).closest('.row.px-3').remove();
                    updateListNumbers();
                });
            });

            // Validasi form sebelum submit
            $('#addForm').on('submit', function(e) {
                var isValid = true;
                $('.row.px-3 .selectpicker').each(function() {
                    var $select = $(this);
                    if ($select.val() === '' || $select.val() === null) {
                        isValid = false;
                        return false; // Hentikan loop jika ada yang invalid
                    }
                });

                if (!isValid) {
                    e.preventDefault(); // Hentikan submit
                    Snackbar.show({
                        text: 'Silakan pilih produk untuk semua list sebelum simpan!',
                        pos: 'bottom-left'
                    });
                }
            });

            // Reset counter saat modal ditutup
            $('#add').on('hidden.bs.modal', function() {
                listCounter = 1;
            });
        });
    </script>
@endsection
