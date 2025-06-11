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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toko/outflow/custom-penjualan.css') }}">
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Expired</span></li>
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
                                        Pendataan:</label>
                                    <div class="col-sm-4 position-relative">
                                        <input type="text" class="form-control form-control-sm flatpickr" name="min"
                                            id="min" placeholder="Pilih tanggal awal">
                                        <span class="clear-icon" id="clear-min">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
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
                                                        Produk Expired
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
                                                                    <label><span class="wajib">*</span>No Series</label>
                                                                    <input type="text" class="form-control"
                                                                        name="no_series" placeholder="No Series" required
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-4">
                                                                    <label><span class="wajib">*</span>Penanggung
                                                                        Jawab</label>
                                                                    <input type="text" class="form-control"
                                                                        name="" placeholder="Penanggung Jawab"
                                                                        readonly required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group mb-4">
                                                                    <label><span class="wajib">*</span>Tanggal dan
                                                                        Waktu</label>
                                                                    <input id="dateTimeFlatpickr" value="2020-09-19 12:00"
                                                                        class="form-control flatpickr flatpickr-input active"
                                                                        type="text" placeholder="Select Date.."
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Rekap Produk</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="rekap-section" id="tp">
                                                                            <div class="rekap-label text-center">
                                                                                Total Produk</div>
                                                                            <div class="rekap-value text-center"
                                                                                id="total-products">0</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="rekap-section" id="tup">
                                                                            <div class="rekap-label text-center">
                                                                                Total Unit Produk</div>
                                                                            <div class="rekap-value text-center"
                                                                                id="total-units">0</div>
                                                                        </div>
                                                                    </div>
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
                                                                                id="basic-addon6">Satuan</span>
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
                                    <th>Tanggal Pendataan
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PGDRST30052025-1107</td>
                                    <td>Bayu Safutra</td>
                                    <td>{{ \Carbon\Carbon::parse('2025/05/30')->translatedFormat('l, d F Y H:i') }}</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#tabsModal"
                                            title="Detail Expired">
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
                                                    <h5 class="modal-title" id="tabsModalLabel">Detail Pendataan Expired
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="rekap-produk"
                                                                data-toggle="tab" href="#rekaproduk" role="tab"
                                                                aria-controls="rekaproduk" aria-selected="false">Rekap
                                                                Produk</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="staff-tab" data-toggle="tab"
                                                                href="#staff" role="tab" aria-controls="staff"
                                                                aria-selected="false">List Produk</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="rekaproduk"
                                                            role="tabpanel" aria-labelledby="rekap-produk">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="rekap-section-modal" id="tp">
                                                                            <div class="rekap-label-modal text-center">
                                                                                Total Produk</div>
                                                                            <div class="rekap-value-modal text-center">2
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="rekap-section-modal" id="tup">
                                                                            <div class="rekap-label-modal text-center">
                                                                                Total Unit Produk</div>
                                                                            <div class="rekap-value-modal text-center">6
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                    <th>Tanggal Penjualan</th>
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

        document.addEventListener('click', function(event) {
            var flatpickrInput = document.getElementById('dateTimeFlatpickr');
            var flatpickrCalendar = document.querySelector('.flatpickr-calendar.open');
            if (flatpickrCalendar && !flatpickrInput.contains(event.target) && !flatpickrCalendar.contains(event
                    .target)) {
                f2.close();
            }
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

            // Data dummy untuk produk dan satuan dengan stok
            const dummyProducts = [{
                    name: "Beras 10Kg",
                    unit: "Karung",
                    stok: 10
                },
                {
                    name: "Gula 1Kg",
                    unit: "Sak",
                    stok: 15
                },
                {
                    name: "Minyak 2L",
                    unit: "Botol",
                    stok: 8
                },
                {
                    name: "Tepung 5Kg",
                    unit: "Karung",
                    stok: 12
                },
                {
                    name: "Garam 500g",
                    unit: "Pack",
                    stok: 20
                },
                {
                    name: "Mie Instan 40g",
                    unit: "Pcs",
                    stok: 30
                }
            ];

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

            // Fungsi untuk populate selectpicker dengan data dummy
            function populateSelectpicker($select) {
                $select.empty();
                $select.append('<option value="" selected disabled>Pilih Produk</option>');
                dummyProducts.forEach(product => {
                    $select.append(`<option value="${product.name}">${product.name}</option>`);
                });
                $select.selectpicker('refresh');
            }

            // Fungsi untuk update rekap
            function updateRekap() {
                let totalProducts = new Set();
                let totalUnits = 0;

                $('#list-container .row.px-3 .selectpicker').each(function() {
                    const $select = $(this);
                    const productName = $select.val();
                    const $quantityInput = $select.closest('.row.px-3').find('input[type="number"]');
                    const quantity = parseInt($quantityInput.val()) || 0;

                    if (productName && productName !== '' && quantity > 0) {
                        totalProducts.add(productName);
                        totalUnits += quantity;
                    }
                });

                $('#total-products').text(totalProducts.size);
                $('#total-units').text(totalUnits);

                // Cek total stok lintas list
                $('#list-container .row.px-3 .selectpicker').each(function() {
                    const $select = $(this);
                    const productName = $select.val();
                    const $quantityInput = $select.closest('.row.px-3').find('input[type="number"]');
                    const quantity = parseInt($quantityInput.val()) || 0;
                    if (productName && quantity > 0) {
                        const product = dummyProducts.find(p => p.name === productName);
                        const totalUsed = $('#list-container .row.px-3 .selectpicker').toArray()
                            .filter($sel => $sel.value === productName)
                            .reduce((sum, $sel) => sum + (parseInt($($sel).closest('.row.px-3').find(
                                'input[type="number"]').val()) || 0), 0);
                        if (totalUsed > product.stok) {
                            $quantityInput.css('border-color', 'red');
                            Snackbar.show({
                                text: `Total ${productName} (${totalUsed} ${product.unit}) melebihi stok (${product.stok} ${product.unit})!`,
                                pos: 'bottom-left'
                            });
                        } else {
                            $quantityInput.css('border-color', '');
                        }
                    }
                });
            }

            // Tambah Produk
            $('.addProduk').off('click').one('click', function handleAddProduct() {
                var template = initialTemplate.clone();
                template.removeAttr('id');
                var uniqueId = 'list-produk-' + (++listCounter);
                template.attr('id', uniqueId);
                template.addClass('row px-3');
                template.find('.col-lg-5 .form-group.mb-3').first().html(selectPickerHtml);
                var $newSelect = template.find('.selectpicker');
                populateSelectpicker($newSelect);
                $newSelect.val('');
                template.find('input[type="number"]').val('').prop('disabled', true);
                $('#list-container').append(template);
                updateListNumbers();
                try {
                    $newSelect.selectpicker({
                        liveSearch: true
                    });
                    $newSelect.on('changed.bs.select', function() {
                        var $row = $(this).closest('.row.px-3');
                        var $quantityInput = $row.find('input[type="number"]');
                        $quantityInput.prop('disabled', false);
                        var selectedProduct = dummyProducts.find(p => p.name === $(this).val());
                        if (selectedProduct) {
                            $row.find('.input-group-text').text(selectedProduct.unit);
                            $quantityInput.attr('max', selectedProduct.stok);
                        }
                        updateRekap();
                    });
                    template.find('input[type="number"]').on('input', function() {
                        var $row = $(this).closest('.row.px-3');
                        var $select = $row.find('.selectpicker');
                        var selectedProduct = dummyProducts.find(p => p.name === $select.val());
                        var maxStock = selectedProduct ? selectedProduct.stok : 0;
                        var currentValue = parseInt($(this).val()) || 0;
                        if (currentValue > maxStock) {
                            $(this).val(maxStock);
                            Snackbar.show({
                                text: `Jumlah tidak boleh melebihi stok (${maxStock} ${selectedProduct.unit})!`,
                                pos: 'bottom-left'
                            });
                        }
                        updateRekap();
                    });
                } catch (e) {}
                $('.addProduk').one('click', handleAddProduct);
            });

            // Pastikan modal sudah terbuka untuk binding event hapus dan inisialisasi awal
            $('#add').on('shown.bs.modal', function() {
                var $initialSelect = $('#list-item-produk .selectpicker');
                populateSelectpicker($initialSelect);
                $initialSelect.selectpicker({
                    liveSearch: true
                });
                var initialInput = $('#list-item-produk input[type="number"]');
                if ($initialSelect.val() === '' || $initialSelect.val() === null) {
                    initialInput.prop('disabled', true);
                }
                $initialSelect.on('changed.bs.select', function() {
                    initialInput.prop('disabled', false);
                    var selectedProduct = dummyProducts.find(p => p.name === $(this).val());
                    if (selectedProduct) {
                        $(this).closest('.row.px-3').find('.input-group-text').text(selectedProduct
                            .unit);
                        initialInput.attr('max', selectedProduct.stok);
                    }
                    updateRekap();
                });
                initialInput.on('input', function() {
                    var $row = $(this).closest('.row.px-3');
                    var $select = $row.find('.selectpicker');
                    var selectedProduct = dummyProducts.find(p => p.name === $select.val());
                    var maxStock = selectedProduct ? selectedProduct.stok : 0;
                    var currentValue = parseInt($(this).val()) || 0;
                    if (currentValue > maxStock) {
                        $(this).val(maxStock);
                        Snackbar.show({
                            text: `Jumlah tidak boleh melebihi stok (${maxStock} ${selectedProduct.unit})!`,
                            pos: 'bottom-left'
                        });
                    }
                    updateRekap();
                });
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
                    updateRekap();
                });
            });

            // Validasi form sebelum submit
            $('#addForm').on('submit', function(e) {
                let isValid = true;
                const totalUsage = {};
                $('#list-container .row.px-3 .selectpicker').each(function() {
                    const $select = $(this);
                    const productName = $select.val();
                    const $quantityInput = $select.closest('.row.px-3').find(
                        'input[type="number"]');
                    const quantity = parseInt($quantityInput.val()) || 0;

                    if ($select.val() === '' || $select.val() === null) {
                        isValid = false;
                        return false;
                    }

                    if (!totalUsage[productName]) totalUsage[productName] = 0;
                    totalUsage[productName] += quantity;

                    const product = dummyProducts.find(p => p.name === productName);
                    if (totalUsage[productName] > product.stok) {
                        isValid = false;
                        $quantityInput.css('border-color', 'red');
                        Snackbar.show({
                            text: `Total ${productName} (${totalUsage[productName]} ${product.unit}) melebihi stok (${product.stok} ${product.unit})!`,
                            pos: 'bottom-left'
                        });
                        return false;
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                } else {
                    $('#list-container .row.px-3 .selectpicker').each(function() {
                        $(this).closest('.row.px-3').find('input[type="number"]').css(
                            'border-color', '');
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
