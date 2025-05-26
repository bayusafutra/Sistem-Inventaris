@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <style>
        .table-responsive>.table {
            background: transparent;
        }

        table thead {
            background-color: #f0f5ff
        }

        table tbody tr td button {
            background: none;
            border: none
        }

        .position-relative {
            position: relative;
        }

        .clear-icon {
            position: absolute;
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            display: none;
            font-weight: bold;
            color: #888ea8;
        }

        .clear-icon:hover {
            color: #e7515a;
        }

        .form-control-sm.flatpickr {
            padding-right: 30px;
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Verifikasi Pendaftaran
                                        Toko</span></li>
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
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-form">
                            <div class="form-group row mr-3">
                                <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Tanggal
                                    Awal:</label>
                                <div class="col-sm-7 position-relative">
                                    <input type="text" class="form-control form-control-sm flatpickr" name="min"
                                        id="min" placeholder="Pilih tanggal awal">
                                    <span class="clear-icon" id="clear-min">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Tanggal
                                    Akhir:</label>
                                <div class="col-sm-7 position-relative">
                                    <input type="text" class="form-control form-control-sm flatpickr" name="max"
                                        id="max" placeholder="Pilih tanggal akhir">
                                    <span class="clear-icon" id="clear-max">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table id="range-search" class="display table table-hover table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Toko</th>
                                    <th>Jenis Usaha</th>
                                    <th>Pemilik</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Badan Usaha Milik Dafa (BUMD)</td>
                                    <td>Grosir Sembako</td>
                                    <td>Bayu Safutra</td>
                                    <td>2025/04/25</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#tabsModal">
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
                                        <!-- Button trigger modal -->
                                        <button type="button" data-toggle="modal"
                                            data-target="#standardModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clipboard table-cancel">
                                                <path
                                                    d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                                </path>
                                                <rect x="8" y="2" width="8" height="4" rx="1"
                                                    ry="1"></rect>
                                            </svg>
                                        </button>
                                    </td>
                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="tabsModal" role="dialog"
                                        aria-labelledby="tabsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tabsModalLabel">Detail Toko</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                                href="#home" role="tab" aria-controls="home"
                                                                aria-selected="true">Identitas</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                                href="#profile" role="tab" aria-controls="profile"
                                                                aria-selected="false">Penanggung Jawab</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                                href="#contact" role="tab" aria-controls="contact"
                                                                aria-selected="false">Deskripsi</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="home"
                                                            role="tabpanel" aria-labelledby="home-tab">
                                                            <p class="modal-text">Vivamus vitae hendrerit neque. Orci
                                                                varius natoque penatibus et magnis dis parturient
                                                                montes, nascetur ridiculus mus. Morbi consequat auctor
                                                                turpis, vitae dictum augue efficitur vitae. Vestibulum a
                                                                risus ipsum. Quisque nec lacus dolor. Quisque ornare
                                                                tempor orci id rutrum.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                                            aria-labelledby="profile-tab">
                                                            <p class="modal-text">Fusce ac fringilla ex. Sed ligula
                                                                ipsum, fringilla ut orci nec, suscipit commodo felis.
                                                                Sed imperdiet eros dignissim, vehicula erat vel, rutrum
                                                                lorem. In porttitor id ante nec laoreet. Etiam quis
                                                                sapien ac nunc ullamcorper elementum. Fusce ullamcorper
                                                                ante convallis nisl eleifend, sit amet dapibus urna
                                                                eleifend.</p>
                                                        </div>
                                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                                            aria-labelledby="contact-tab">
                                                            <p class="modal-text">Pellentesque semper tortor id ligula
                                                                ultrices suscipit. Donec viverra vulputate lectus non
                                                                consectetur. Donec ac interdum lacus. Donec euismod nisi
                                                                at justo molestie elementum. Vivamus vitae hendrerit
                                                                neque. Orci varius natoque penatibus et magnis dis
                                                                parturient montes, nascetur ridiculus mus.</p>
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
                                    <!-- Modal ACC -->
                                    <div class="modal fade modal-notification" id="standardModal" tabindex="-1"
                                        role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" id="standardModalLabel">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <div class="icon-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-bell">
                                                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9">
                                                            </path>
                                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                        </svg>
                                                    </div>
                                                    <p class="modal-text">Apakah anda yakin untuk menerima permohonan pendaftaran Toko <strong>Badan Usaha Milik Dafa (BUMD)?</strong></p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button class="btn" data-dismiss="modal"><i
                                                            class="flaticon-cancel-12"></i> Batal</button>
                                                    <button type="button" class="btn btn-primary">Yakin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <td>Badan Usaha Milik Nanang (BUMN)</td>
                                    <td>Grosir Pakaian</td>
                                    <td>Nanang Hidayat</td>
                                    <td>2025/05/13</td>
                                    <td class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-list table-cancel">
                                            <line x1="8" y1="6" x2="21" y2="6"></line>
                                            <line x1="8" y1="12" x2="21" y2="12"></line>
                                            <line x1="8" y1="18" x2="21" y2="18"></line>
                                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-clipboard table-cancel">
                                            <path
                                                d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                            </path>
                                            <rect x="8" y="2" width="8" height="4" rx="1"
                                                ry="1"></rect>
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Toko</th>
                                    <th>Jenis Usaha</th>
                                    <th>Pemilik</th>
                                    <th>Tanggal Pendaftaran</th>
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
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script>
        // Inisialisasi Flatpickr
        const minPicker = $("#min").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
            onChange: function(selectedDates, dateStr) {
                // Tampilkan/sembunyikan ikon clear berdasarkan apakah ada tanggal
                $("#clear-min").toggle(!!dateStr);
            }
        });

        const maxPicker = $("#max").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
            onChange: function(selectedDates, dateStr) {
                $("#clear-max").toggle(!!dateStr);
            }
        });

        // Fungsi untuk mengonversi format tanggal
        function convertDateFormat(dateStr) {
            if (!dateStr) return null;
            return dateStr.replace(/\//g, "-");
        }

        // Filter DataTable
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var min = $("#min").val();
            var max = $("#max").val();
            var dateStr = data[3];
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

        $(document).ready(function() {
            var table = $("#range-search").DataTable({
                dom: "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                oLanguage: {
                    oPaginate: {
                        sPrevious: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        sNext: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                    },
                    sInfo: "Showing page _PAGE_ of _PAGES_",
                    sSearch: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    sSearchPlaceholder: "Search...",
                    sLengthMenu: "Results :  _MENU_",
                },
                stripeClasses: [],
                lengthMenu: [10, 20, 25, 50, 100],
                pageLength: 10,
            });

            // Event listener untuk redraw tabel saat tanggal berubah
            $("#min, #max").on("change", function() {
                table.draw();
            });

            // Event listener untuk tombol clear
            $("#clear-min").on("click", function() {
                minPicker.clear();
                $("#clear-min").hide();
                table.draw();
            });

            $("#clear-max").on("click", function() {
                maxPicker.clear();
                $("#clear-max").hide();
                table.draw();
            });
        });
    </script>
    {{-- <script>
        $("#min, #max").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
        });

        function convertDateFormat(dateStr) {
            if (!dateStr) return null;
            return dateStr.replace(/\//g, "-");
        }

        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var min = $("#min").val();
            var max = $("#max").val();
            var dateStr = data[3];

            var date = convertDateFormat(dateStr);
            var dateObj = date ? new Date(date) : null;

            var minDate = min ? new Date(min) : null;
            var maxDate = max ? new Date(max) : null;
            if (!minDate && !maxDate) {
                return true;
            }
            if (minDate && !maxDate && dateObj) {
                return dateObj >= minDate;
            }
            if (!minDate && maxDate && dateObj) {
                return dateObj <= maxDate;
            }
            if (minDate && maxDate && dateObj) {
                return dateObj >= minDate && dateObj <= maxDate;
            }

            return false;
        });

        $(document).ready(function() {
            var table = $("#range-search").DataTable({
                dom: "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                oLanguage: {
                    oPaginate: {
                        sPrevious: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        sNext: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                    },
                    sInfo: "Showing page _PAGE_ of _PAGES_",
                    sSearch: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    sSearchPlaceholder: "Search...",
                    sLengthMenu: "Results :  _MENU_",
                },
                stripeClasses: [],
                lengthMenu: [10, 20, 25, 50, 100],
                pageLength: 10,
            });

            $("#min, #max").on("change", function() {
                table.draw();
            });
        });
    </script> --}}
@endsection
