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
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/loaders/custom-loader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toko/outflow/custom-returkonsumen.css') }}">
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Staff Penjualan</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Retur Konsumen</span></li>
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
                                        Retur:</label>
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
                                                        Retur Konsumen
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
                                                                        name="no_series" value="RTKSM11062025-1105"
                                                                        placeholder="No Series" required readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-4">
                                                                    <label><span class="wajib">*</span>Penanggung
                                                                        Jawab</label>
                                                                    <input type="text" class="form-control"
                                                                        name="penanggung_jawab" value="Bayu Safutra"
                                                                        required readonly>
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
                                                                <label for="">Catatan</label>
                                                                <div class="form-group mb-4">
                                                                    <textarea class="form-control" name="catatan" rows="4" placeholder="Catatan Retur Konsumen"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="custom-file-container"
                                                                    data-upload-id="mySecondImage">
                                                                    <label>Bukti Foto (bisa lebih dari 1) <a
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
                                                            <div class="col-lg-4 d-flex justify-content-end align-items-center"
                                                                style="margin-left: auto" id="penjualanSelect">
                                                                <select class="selectpicker form-control"
                                                                    data-live-search="true">
                                                                    <option value="" selected disabled>Pilih No
                                                                        Series Penjualan</option>
                                                                    <option value="PGDRST30052025-1107">PGDRST30052025-1107
                                                                    </option>
                                                                    <option value="PGDRST30052025-1108">PGDRST30052025-1108
                                                                    </option>
                                                                    <option value="PGDRST30052025-1109">PGDRST30052025-1109
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12 mt-5">
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

                                                        <!-- Container untuk list produk manual-->
                                                        <div id="list-container"></div>
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
                                    <th>Tanggal & Waktu</th>
                                    <th>Penjualan</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>RST02062025-1102</td>
                                    <td>Bayu Safutra</td>
                                    <td>{{ \Carbon\Carbon::parse('2025/05/30')->translatedFormat('l, d F Y H:i') }}</td>
                                    <td>PGDRST30052025-1107</td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#lihatbukti"
                                            data-image='["{{ asset('assets/img/90x90.jpg') }}", "{{ asset('assets/img/300x300.jpg') }}"]'
                                            title="Lihat Bukti">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-image table-cancel">
                                                <rect x="3" y="3" width="18" height="18" rx="2"
                                                    ry="2"></rect>
                                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                <polyline points="21 15 16 10 5 21"></polyline>
                                            </svg>
                                        </button>
                                        <button type="button" data-toggle="modal" data-target="#tabsModal"
                                            title="Detail Retur Konsumen">
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
                                    <!-- Modal Lihat Bukti -->
                                    <div class="modal fade" id="lihatbukti" tabindex="-1" role="dialog"
                                        aria-labelledby="lihatbuktiLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="lihatbuktiLabel">Lihat Bukti Retur
                                                        Konsumen
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="noImageMessage"
                                                        style="display: none; text-align: center; color: #4361ee; font-weight: 700;">
                                                        Tidak ada bukti foto yang tersedia</p>
                                                    <div class="text-center">
                                                        <img id="buktiImage" src="" alt="Bukti Foto Restock"
                                                            class="img-fluid" style="max-width: 100%; max-height: 70vh;">
                                                    </div>
                                                    <div class="d-flex justify-content-center mt-3">
                                                        <button id="prevImage" class="btn btn-outline-secondary mr-2"
                                                            disabled>Sebelumnya</button>
                                                        <button id="nextImage" class="btn btn-outline-secondary"
                                                            disabled>Selanjutnya</button>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="tabsModal" tabindex="-1" role="dialog"
                                        aria-labelledby="tabsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tabsModalLabel">Detail Retur Konsumen
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
                                    <th>Penjualan</th>
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

        document.addEventListener('click', function(event) {
            var flatpickrInput = document.getElementById('dateTimeFlatpickr');
            var flatpickrCalendar = document.querySelector('.flatpickr-calendar.open');
            if (flatpickrCalendar && !flatpickrInput.contains(event.target) && !flatpickrCalendar.contains(event
                    .target)) {
                f2.close();
            }
        });

        $(document).ready(function() {
            // Dummy data untuk simulasi list produk dari penjualan
            const dummyPenjualanData = {
                "PGDRST30052025-1107": [{
                        produk: "Beras 10Kg",
                        satuan: 5,
                        satuanType: "Karung"
                    },
                    {
                        produk: "Gula 1Kg",
                        satuan: 10,
                        satuanType: "Sak"
                    },
                    {
                        produk: "Minyak 1L",
                        satuan: 15,
                        satuanType: "Botol"
                    }
                ],
                "PGDRST30052025-1108": [{
                    produk: "Minyak 2L",
                    satuan: 3,
                    satuanType: "Botol"
                }],
                "PGDRST30052025-1109": [{
                        produk: "Tepung 5Kg",
                        satuan: 2,
                        satuanType: "Karung"
                    },
                    {
                        produk: "Garam 500g",
                        satuan: 8,
                        satuanType: "Pack"
                    }
                ]
            };

            // Objek untuk simpan state input
            let inputState = {};

            // Template list produk penjualan (text statis + input)
            const penjualanTemplate = `
                <div class="row px-3 product-items">
                    <div class="col-lg-1 no-list">
                        <span></span>
                    </div>
                    <div class="col-lg-3">
                        <div class="produk-awal">
                            <input type="hidden" name="id_produk[]">
                            <strong class="nama-produk" style="font-size: 16.5px; font-weight: 900; color: #3b3f5c"></strong><br>
                            <em class="jumlah-produk" style="font-size: 15px"></em> <small style="font-size: 13px" class="satuan-produk"></small>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <input type="number" style="font-size: 15px" class="form-control jumlah-retur" min="1" placeholder="Jumlah Retur" required>
                                <div class="input-group-append">
                                    <span class="input-group-text satuan-retur"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="icon-delete">
                            <button type="button" class="delete-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash-2 delete-list">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;

            // Sembunyikan template awal dan hapus dari HTML statis
            $('#list-item-produk').remove();

            // Fungsi update nomor list
            function updateListNumbers() {
                $('#list-container .product-items').each(function(index) {
                    $(this).find('.no-list span').text((index + 1) + '.');
                });
            }

            // Fungsi update rekap
            function updateRekap() {
                const $listContainer = $('#list-container');
                const totalProducts = $listContainer.find('.product-items').length;
                const totalUnits = $listContainer.find('.jumlah-retur').toArray().reduce((sum, input) => {
                    const value = parseInt($(input).val()) || 0;
                    return sum + (value > 0 ? value : 0);
                }, 0);
                $('#total-products').text(totalProducts);
                $('#total-units').text(totalUnits);
            }

            // Event saat selectpicker No Series dipilih
            $('#penjualanSelect select').on('change', function() {
                const selectedValue = $(this).val();
                const $listContainer = $('#list-container');
                $listContainer.empty(); // Kosongkan list sebelum load data baru
                if (selectedValue && selectedValue !== '') {
                    const data = dummyPenjualanData[selectedValue] || [];
                    data.forEach(item => {
                        const $template = $(penjualanTemplate);
                        $template.find('.nama-produk').text(item.produk);
                        $template.find('.jumlah-produk').text(`${item.satuan}`);
                        $template.find('.satuan-produk').text(item.satuanType);
                        $template.find('.satuan-retur').text(item.satuanType);
                        $template.find('.jumlah-retur').attr('max', item.satuan);
                        $listContainer.append($template);
                    });
                    updateListNumbers();
                    restoreInputValues(selectedValue); // Restore nilai input setelah load
                    updateRekap(); // Update rekap setelah load data
                }
            });

            // Fungsi simpan state input
            function saveInputValues(selectedValue) {
                const $listContainer = $('#list-container');
                inputState[selectedValue] = {};
                $listContainer.find('.product-items').each(function(index) {
                    const $input = $(this).find('.jumlah-retur');
                    inputState[selectedValue][index] = $input.val();
                });
            }

            // Fungsi restore state input
            function restoreInputValues(selectedValue) {
                const $listContainer = $('#list-container');
                if (inputState[selectedValue]) {
                    $listContainer.find('.product-items').each(function(index) {
                        const $input = $(this).find('.jumlah-retur');
                        const savedValue = inputState[selectedValue][index];
                        if (savedValue) {
                            $input.val(savedValue);
                        }
                    });
                }
            }

            // Event saat modal ditampilkan
            $('#add').on('shown.bs.modal', function() {
                $('#penjualanSelect select').selectpicker({
                    liveSearch: true
                }).selectpicker('refresh');
                const $select = $('#penjualanSelect select');
                const selectedValue = $select.val();
                const $listContainer = $('#list-container');
                if (selectedValue && selectedValue !== '') {
                    $listContainer.empty();
                    const data = dummyPenjualanData[selectedValue] || [];
                    data.forEach(item => {
                        const $template = $(penjualanTemplate);
                        $template.find('.nama-produk').text(item.produk);
                        $template.find('.jumlah-produk').text(`${item.satuan}`);
                        $template.find('.satuan-produk').text(item.satuanType);
                        $template.find('.satuan-retur').text(item.satuanType);
                        $template.find('.jumlah-retur').attr('max', item.satuan);
                        $listContainer.append($template);
                    });
                    updateListNumbers();
                    restoreInputValues(selectedValue); // Restore nilai input saat modal dibuka
                    updateRekap(); // Update rekap setelah load data
                } else {
                    $listContainer.empty().append(
                        '<div class="empty-text" style="text-align: center; padding: 20px; color: #b0131e; font-weight: 900; font-size: 17.5px;">Silahkan pilih no series penjualan terlebih dahulu!</div>'
                    );
                    $('#total-products').text('0');
                    $('#total-units').text('0'); // Reset rekap kalau nggak ada pilihan
                }
            });

            // Event saat modal ditutup
            $('#add').on('hidden.bs.modal', function() {
                const $select = $('#penjualanSelect select');
                const selectedValue = $select.val();
                if (selectedValue && selectedValue !== '') {
                    saveInputValues(selectedValue); // Simpan nilai input sebelum modal tutup
                }
            });

            // Event klik delete item
            $('#list-container').on('click', '.delete-item', function() {
                const listCount = $('#list-container .product-items').length;
                if (listCount <= 1) {
                    Snackbar.show({
                        text: 'Minimal harus ada 1 produk!',
                        pos: 'bottom-left'
                    });
                    return;
                }
                $(this).closest('.product-items').remove();
                updateListNumbers();
                updateRekap(); // Update rekap setelah delete
            });

            // Validasi jumlah retur
            $('#list-container').on('input', '.jumlah-retur', function() {
                const $input = $(this);
                const max = parseInt($input.attr('max'));
                const value = parseInt($input.val()) || 0;
                if (value > max) {
                    $input.val(max);
                    Snackbar.show({
                        text: `Jumlah retur tidak boleh melebihi ${max} ${$input.next().find('.satuan-retur').text()}!`,
                        pos: 'bottom-left'
                    });
                } else if (value < 1) {
                    $input.val(1);
                    Snackbar.show({
                        text: 'Jumlah retur minimal 1!',
                        pos: 'bottom-left'
                    });
                }
                updateRekap(); // Update rekap saat input berubah
            });

            // Validasi form sebelum submit
            $('#addForm').on('submit', function(e) {
                const $select = $('#penjualanSelect select');
                const $listContainer = $('#list-container');
                if ($select.val() === '' || $select.val() === null || $listContainer.children().length ===
                    0) {
                    e.preventDefault();
                    Snackbar.show({
                        text: 'Silakan pilih No Series penjualan sebelum simpan!',
                        pos: 'bottom-left'
                    });
                    return;
                }
            });
        });

        let currentImages = [];
        let currentImageIndex = 0;

        // Event saat button "Lihat Bukti" diklik
        $('button[data-target="#lihatbukti"]').on('click', function() {
            // Ambil data-image (sudah array dari jQuery data())
            currentImages = $(this).data('image') || [];
            currentImageIndex = 0;

            // Cek apakah ada gambar
            if (currentImages && currentImages.length > 0) {
                // Tampilkan gambar pertama
                $('#buktiImage').attr('src', currentImages[0]);
                $('#buktiImage').attr('alt', 'Bukti Foto Restock');
                $('#buktiImage').show();
                $('#noImageMessage').hide();

                // Hide/show tombol navigasi berdasarkan jumlah gambar
                if (currentImages.length > 1) {
                    $('#prevImage').show();
                    $('#nextImage').show();
                    $('#nextImage').prop('disabled', false);
                } else {
                    $('#prevImage').hide();
                    $('#nextImage').hide();
                }
                $('#prevImage').prop('disabled', true); // Awalnya di gambar pertama
            } else {
                $('#buktiImage').attr('src', '');
                $('#buktiImage').hide();
                $('#noImageMessage').show();
                $('#prevImage').hide();
                $('#nextImage').hide();
            }
        });

        // Event untuk tombol Sebelumnya
        $('#prevImage').on('click', function() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                $('#buktiImage').attr('src', currentImages[currentImageIndex]);
                $('#buktiImage').attr('alt', 'Bukti Foto Restock');

                // Update tombol
                $('#nextImage').prop('disabled', false);
                if (currentImageIndex === 0) {
                    $('#prevImage').prop('disabled', true);
                }
            }
        });

        // Event untuk tombol Selanjutnya
        $('#nextImage').on('click', function() {
            if (currentImageIndex < currentImages.length - 1) {
                currentImageIndex++;
                $('#buktiImage').attr('src', currentImages[currentImageIndex]);
                $('#buktiImage').attr('alt', 'Bukti Foto Restock');

                // Update tombol
                $('#prevImage').prop('disabled', false);
                if (currentImageIndex === currentImages.length - 1) {
                    $('#nextImage').prop('disabled', true);
                }
            }
        });

        // Reset state saat modal ditutup
        $('#lihatbukti').on('hidden.bs.modal', function() {
            currentImages = [];
            currentImageIndex = 0;
            $('#buktiImage').attr('src', '');
            $('#buktiImage').hide();
            $('#noImageMessage').show();
            $('#prevImage').hide();
            $('#nextImage').hide();
        });
    </script>
@endsection
