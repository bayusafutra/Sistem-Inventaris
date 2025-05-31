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
                                <li class="breadcrumb-item active" aria-current="page"><span>Pengadaan Restock</span></li>
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
                                        Pengadaan:</label>
                                    <div class="col-sm-4 position-relative">
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
                                                        Pengadaan
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
                                                <form action="" method="">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group mb-3">
                                                                    <label>No Series</label>
                                                                    <input type="text" class="form-control"
                                                                        name="no_series" placeholder="No Series" required
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-3">
                                                                    <label>Penanggung Jawab</label>
                                                                    <input type="text" class="form-control"
                                                                        name="" placeholder="Penanggung Jawab"
                                                                        readonly required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="">Catatan Pengadaan</label>
                                                                <div class="form-group mb-2">
                                                                    <textarea class="form-control" name="" rows="4" placeholder="Catatan Pengadaan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="line">
                                                        <h5 class="mb-3">List Produk</h5>
                                                        <div id="list-item-produk" class="row px-3">
                                                            <div class="col-lg-1 no-list">
                                                                <span>1.</span>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group mb-3">
                                                                    <select class="selectpicker form-control"
                                                                        data-live-search="true">
                                                                        <option selected disabled>Pilih Nama Produk
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
                                                                            class="form-control list-item"
                                                                            placeholder="Jumlah Satuan">
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
                                    <th>Tanggal Pengadaan</th>
                                    <th>Status</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PGDRST30052025-11</td>
                                    <td>Bayu Safutra</td>
                                    <td>{{ \Carbon\Carbon::parse('2025/05/30')->translatedFormat('l, d F Y') }}</td>
                                    <td><span class="badge outline-badge-success"> Selesai </span></td>
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
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script>
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

        $(document).ready(function() {
            // Variabel counter untuk ID unik
            let listCounter = 1;

            // Langkah 1: Simpan HTML mentah dari elemen <select class="selectpicker"> asli
            // Ini diambil sebelum Selectpicker mengubahnya (sebelum event load.bs.select.data-api jalan)
            const selectPickerHtml = $('#list-item-produk .selectpicker').prop('outerHTML');

            // Langkah 2: Simpan template statis tanpa selectpicker yang sudah diubah
            // Kita hapus elemen selectpicker dari template ini, nanti akan diganti dengan selectPickerHtml
            const initialTemplate = $('#list-item-produk.row.px-3').clone();
            initialTemplate.find('.selectpicker').remove();

            // Fungsi untuk update nomor list
            function updateListNumbers() {
                $('#list-item-produk.row.px-3, #list-item-produk > .row.px-3').each(function(index) {
                    $(this).find('.no-list span').text((index + 1) + '.');
                });
            }

            // Tambah Produk (binding sekali di luar modal event)
            $('.addProduk').off('click').one('click', function handleAddProduct() {
                console.log('Tombol Tambah Produk diklik'); // Debugging
                console.log('Jumlah list sebelum tambah:', $(
                    '#list-item-produk.row.px-3, #list-item-produk > .row.px-3').length);

                // Langkah 3: Buat template baru dari template statis
                var template = initialTemplate.clone();

                // Hapus ID lama dari template
                template.removeAttr('id');

                // Tambah ID unik berdasarkan counter
                var uniqueId = 'list-produk-' + (++listCounter);
                template.attr('id', uniqueId);

                // Langkah 4: Ganti elemen selectpicker dengan HTML asli yang kita simpan tadi
                // Kita masukkan ke dalam .form-group.mb-3 (sesuai struktur HTML-mu)
                template.find('.form-group.mb-3').first().html(selectPickerHtml);

                // Reset input di list baru
                template.find('select').val(''); // Reset selectpicker
                template.find('input[type="number"]').val(''); // Reset input satuan

                // Tambahkan list baru ke container
                $('#list-item-produk').append(template);

                // Update nomor list
                updateListNumbers();

                // Langkah 5: Inisialisasi ulang Selectpicker untuk elemen baru
                try {
                    var newSelectpicker = template.find('.selectpicker');
                    console.log('Elemen selectpicker baru ditemukan:', newSelectpicker.length);
                    console.log('HTML selectpicker:', newSelectpicker.prop('outerHTML')); // Debug struktur
                    newSelectpicker.selectpicker({
                        liveSearch: true // Pastikan search berfungsi
                    });
                    console.log('Selectpicker diinisialisasi untuk ID:', uniqueId);
                    newSelectpicker.on('changed.bs.select', function() {
                        console.log('Opsi dipilih:', $(this).val());
                    });
                } catch (e) {
                    console.error('Error inisialisasi Selectpicker:', e);
                }

                console.log('Jumlah list setelah tambah:', $(
                    '#list-item-produk.row.px-3, #list-item-produk > .row.px-3').length);

                // Re-bind event untuk klik berikutnya
                $('.addProduk').one('click', handleAddProduct);
            });

            // Pastikan modal sudah terbuka untuk binding event hapus dan inisialisasi awal
            $('#add').on('shown.bs.modal', function() {
                // Inisialisasi Selectpicker pertama saat modal dibuka
                $('#list-item-produk .selectpicker').selectpicker({
                    liveSearch: true
                });

                // Hapus List Produk
                $('#list-item-produk').off('click', '.icon-delete button').on('click',
                    '.icon-delete button',
                    function() {
                        var listCount = $('#list-item-produk.row.px-3, #list-item-produk > .row.px-3')
                            .length;
                        console.log('Jumlah list sebelum hapus:', listCount); // Debugging
                        if (listCount <= 1) {
                            alert('Minimal harus ada 1 list produk!');
                            return;
                        }
                        $(this).closest('.row.px-3').remove();
                        updateListNumbers(); // Update nomor setelah hapus
                        console.log('Jumlah list setelah hapus:', $(
                            '#list-item-produk.row.px-3, #list-item-produk > .row.px-3')
                        .length); // Debugging
                    });
            });

            // Reset counter saat modal ditutup
            $('#add').on('hidden.bs.modal', function() {
                listCounter = 1; // Reset counter
            });
        });
    </script>
@endsection
