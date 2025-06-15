@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-modal.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}" />
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
                                <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Tanggal
                                    Aktivasi:</label>
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
                                    Aktivasi:</label>
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
                                @foreach ($toko as $tk)
                                    <tr>
                                        <td>{{ ucwords($tk->name) }}</td>
                                        <td>{{ $tk->jenis_usaha }}</td>
                                        <td>{{ ucwords($tk->user->name) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tk->tgl_pendaftaran)->translatedFormat('l, d F Y') }}
                                        <td>
                                            @if ($tk->status == 2)
                                                <span class="badge outline-badge-success"> Aktif </span>
                                            @else
                                                <span class="badge outline-badge-danger"> Tidak Aktif </span>
                                            @endif
                                        </td>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal"
                                                data-target="#tabsModal-{{ $tk->id }}" title="Detail Toko">
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
                                                data-target="#standardModal-{{ $tk->id }}" title="Verifikasi Toko">
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
                                        <div class="modal fade" id="tabsModal-{{ $tk->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="tabsModalLabel-{{ $tk->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tabsModalLabel-{{ $tk->id }}">
                                                            Detail Toko</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs mb-3" id="myTab-{{ $tk->id }}"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="home-tab-{{ $tk->id }}" data-toggle="tab"
                                                                    href="#home-{{ $tk->id }}" role="tab"
                                                                    aria-controls="home-{{ $tk->id }}"
                                                                    aria-selected="true">Identitas</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab-{{ $tk->id }}"
                                                                    data-toggle="tab" href="#profile-{{ $tk->id }}"
                                                                    role="tab"
                                                                    aria-controls="profile-{{ $tk->id }}"
                                                                    aria-selected="false">Penanggung Jawab</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="contact-tab-{{ $tk->id }}"
                                                                    data-toggle="tab" href="#contact-{{ $tk->id }}"
                                                                    role="tab"
                                                                    aria-controls="contact-{{ $tk->id }}"
                                                                    aria-selected="false">Deskripsi</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent-{{ $tk->id }}">
                                                            <div class="tab-pane fade show active"
                                                                id="home-{{ $tk->id }}" role="tabpanel"
                                                                aria-labelledby="home-tab-{{ $tk->id }}">
                                                                <ul>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Nama Toko </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ ucwords($tk->name) }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Jenis Usaha</strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->jenis_usaha }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Alamat </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->alamat }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Kelurahan </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->kelurahan }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Kecamatan </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->kecamatan }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Kota atau
                                                                                    Kabupaten</strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->kota }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Provinsi </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->provinsi }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane fade" id="profile-{{ $tk->id }}"
                                                                role="tabpanel"
                                                                aria-labelledby="profile-tab-{{ $tk->id }}">
                                                                <ul>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Pemilik </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ ucwords($tk->user->name) }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <strong class="title">Email </strong>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <span class="modal-text">:
                                                                                    {{ $tk->user->email }}</span>
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
                                                                                    {{ $tk->user->phone ?? 'N/A' }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane fade" id="contact-{{ $tk->id }}"
                                                                role="tabpanel"
                                                                aria-labelledby="contact-tab-{{ $tk->id }}">
                                                                <p class="modal-text">
                                                                    {{ $tk->deskripsi ?? 'Tidak ada deskripsi' }}</p>
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
                                        <div class="modal fade modal-notification" id="standardModal-{{ $tk->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="standardModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document"
                                                id="standardModalLabel">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <div class="icon-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-bell">
                                                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9">
                                                                </path>
                                                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                            </svg>
                                                        </div>
                                                        @if ($tk->status == 2)
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENONAKTIFKAN</strong>
                                                                status Toko <strong>{{ ucwords($tk->name) }}?</strong>
                                                            </p>
                                                        @else
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENGAKTIFKAN</strong>
                                                                status Toko <strong>{{ ucwords($tk->name) }}?</strong>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if ($tk->status == 2)
                                                        <form action="{{ route('toko.nonaktif', $tk->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-footer justify-content-between">
                                                                <button class="btn" data-dismiss="modal"><i
                                                                        class="flaticon-cancel-12"></i> Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Yakin</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('toko.aktif', $tk->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-footer justify-content-between">
                                                                <button class="btn" data-dismiss="modal"><i
                                                                        class="flaticon-cancel-12"></i> Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Yakin</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
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
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script>
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
    </script>
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
