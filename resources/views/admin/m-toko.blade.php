@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-modal.css') }}" />
    <style>
        table thead {
            background-color: #f0f5ff;
        }

        table tbody tr td button {
            background: none;
            border: none;
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

        .outline-badge-success {
            padding: 2.2px 19px
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Toko</span></li>
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
                        <div class="table-form">
                            <div class="form-group row mr-3">
                                <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Verifikasi
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
                                <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Verifikasi
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
                        <table id="html5-extension" class="display table table-hover non-hover table-striped"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Toko</th>
                                    <th>Jenis Usaha</th>
                                    <th>Pemilik</th>
                                    <th>Tanggal Aktivasi</th>
                                    <th>Status</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Badan Usaha Milik Dafa (BUMD)</td>
                                    <td>Grosir Sembako</td>
                                    <td>Bayu Safutra</td>
                                    <td>{{ \Carbon\Carbon::parse('2025/04/25')->translatedFormat('l, d F Y') }}</td>
                                    <td><span class="badge outline-badge-success"> Aktif </span></td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#tabsModal"
                                            title="Detail Toko">
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
                                        <button type="button" data-toggle="modal" data-target="#standardModal"
                                            title="Verifikasi Toko">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                    <div class="modal fade" id="tabsModal" tabindex="-1" role="dialog"
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
                                                            <a class="nav-link" id="staff-tab" data-toggle="tab"
                                                                href="#staff" role="tab" aria-controls="staff"
                                                                aria-selected="false">Staff</a>
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
                                                            <ul>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Nama Toko </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Badan Usaha Milik
                                                                                Dafa (BUMD)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Jenis Usaha </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Grosir Sembako
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Alamat </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Jl. Sulanjana No
                                                                                56</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Kelurahan </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Jemursari</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Kecamatan </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Wonocolo</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Kota atau Kabupaten
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Surabaya</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Provinsi </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Jawa Timur</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                                            aria-labelledby="profile-tab">
                                                            <ul>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Pemilik </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: Dafa Ariq</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Username </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: dafaariq77</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">Email </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">: dafariq@gmail.com
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong class="title">No Telp </strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="modal-text">:
                                                                                08242882528657</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane fade" id="staff" role="tabpanel"
                                                            aria-labelledby="staff-tab">
                                                            <ol>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <strong class="title">Nama</strong>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            <span class="modal-text">: Rudi Santoso</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <strong class="title">Status</strong>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            : <span class="badge outline-badge-warning"> Staff Gudang </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <strong class="title">Nama</strong>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            <span class="modal-text">: Anita Sari</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <strong class="title">Status</strong>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            : <span class="badge outline-badge-success"> Staff Penjualan </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <strong class="title">Nama</strong>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            <span class="modal-text">: Budi Hartono</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <strong class="title">Status</strong>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            : <span class="badge outline-badge-warning"> Staff Gudang </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ol>
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
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            id="standardModalLabel">
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
                                                    <p class="modal-text">Apakah anda yakin untuk <strong style="font-weight: bolder; color: black">MENONAKTIFKAN</strong>
                                                        status Toko <strong>Badan Usaha Milik Dafa (BUMD)?</strong></p>
                                                </div>
                                                <form action="" method="">
                                                    @csrf
                                                    <div class="modal-footer justify-content-between">
                                                        <button class="btn" data-dismiss="modal"><i
                                                                class="flaticon-cancel-12"></i> Batal</button>
                                                        <button type="submit" class="btn btn-primary">Yakin</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    <td>Badan Usaha Milik Nanang (BUMN)</td>
                                    <td>Grosir Pakaian</td>
                                    <td>Nanang Hidayat</td>
                                    <td>{{ \Carbon\Carbon::parse('2025/05/13')->translatedFormat('l, d F Y') }}</td>
                                    <td><span class="badge outline-badge-danger"> Non Aktif </span></td>
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
                                    <th>Tanggal Aktivasi</th>
                                    <th>Status</th>
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

    <script>
        // Inisialisasi Flatpickr
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
    </script>
@endsection
