@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-modal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
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

        .outline-badge-success {
            padding: 2.2px 19px
        }

        .buttons {
            margin: 18px 20px 0 18px;
        }

        .flatpickr-calendar {
            z-index: 9999 !important;
        }

        .custom-radio {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .col-md-6 {
            padding: 0
        }

        .custom-radio {
            display: flex;
            position: relative;
            cursor: pointer;
        }

        .custom-radio input {
            position: absolute;
            opacity: 0;
        }

        .radio-box {
            display: inline-block;
            padding: 12px 10px;
            border: 1.4px solid #d3d3d3;
            border-radius: 6px;
            color: #333;
            text-align: center;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
            width: 100%;
            color: #6c757d;
        }

        .custom-radio input:checked+.radio-box {
            background: #f4f9ff;
            color: #11326c;
            font-weight: bold;
            border: 2.5px solid #007bff;
        }

        .radio-box:hover {
            border-color: #adb5bd;
            color: #495057;
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $toko->name }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Manager</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Staff</span>
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
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="d-flex align-items-center justify-content-between mb-2 buttons">
                            <div id="export-buttons" class="d-flex gap-2"></div>
                            <div class="add-button d-flex justify-content-end">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add"
                                    title="Tambah Data">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Tambah Data
                                </button>
                                <!-- Modal Add -->
                                <div class="modal fade" id="add" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Staff
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <svg style="color: black" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18">
                                                        </line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <form action="{{ route('manager.store-staff', ['slug' => $toko->slug]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group mb-3">
                                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    id="nama_lengkap" placeholder="Nama Lengkap" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group mb-3">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    id="email" placeholder="Email" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group mb-3">
                                                                <label for="no_telp">No Telp</label>
                                                                <input type="text" class="form-control" name="notelp"
                                                                    id="no_telp" placeholder="No Telp" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group mb-3">
                                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                <select class="form-control" name="jk"
                                                                    id="jenis_kelamin" data-live-search="true" required>
                                                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                                                    <option value="1">Pria</option>
                                                                    <option value="0">Wanita</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group mb-3">
                                                                <label for="basicFlatpickr">Tanggal Lahir</label>
                                                                <div class="d-sm-flex">
                                                                    <input id="basicFlatpickr" name="tgl_lahir"
                                                                        class="form-control flatpickr flatpickr-input active"
                                                                        type="text" placeholder="Pilih Tanggal Lahir"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-3">
                                                                <label>Posisi</label>
                                                                <div class="d-flex">
                                                                    <div class="col-md-6">
                                                                        <label class="custom-radio flex-fill">
                                                                            <input type="radio"name="roleuser"
                                                                                value="4" required>
                                                                            <span class="radio-box"
                                                                                style="margin-right: 15px">Staff
                                                                                Gudang</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="custom-radio flex-fill">
                                                                            <input type="radio" name="roleuser"
                                                                                value="5" required>
                                                                            <span class="radio-box"
                                                                                style="margin-left: 15px">Staff
                                                                                Penjualan</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                        <table id="html5-extension" class="table table-hover table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Posisi</th>
                                    <th>Status</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staff as $st)
                                    <tr>
                                        <td>{{ ucwords($st->name) }}</td>
                                        <td>{{ $st->panggilan ?? 'N/A' }}</td>
                                        <td>{{ $st->email }}</td>
                                        <td>{{ $st->notelp ?? 'N/A' }}</td>
                                        <td>
                                            @if (!is_null($st->jk))
                                                {{ $st->jk ? 'Pria' : 'Wanita' }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($st->tgl_lahir))
                                                {{ floor(\Carbon\Carbon::parse($st->tgl_lahir)->diffInYears(\Carbon\Carbon::now())) }}
                                                tahun
                                            @else
                                                n/A
                                            @endif
                                        </td>
                                        <td>{{ $st->roleuser == 4 ? 'Staff Gudang' : 'Staff Penjualan' }}</td>
                                        <td>
                                            @if ($st->isactive === 1)
                                                <span class="badge outline-badge-success"> Aktif </span>
                                            @else
                                                <span class="badge outline-badge-danger"> Tidak Aktif </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal"
                                                data-target="#standardModal-{{ $st->id }}" title="Verifikasi Toko">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x-octagon table-cancel">
                                                    <polygon
                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                    </polygon>
                                                    <line x1="15" y1="9" x2="9" y2="15">
                                                    </line>
                                                    <line x1="9" y1="9" x2="15" y2="15">
                                                    </line>
                                                </svg>
                                            </button>
                                        </td>
                                        <!-- Modal Status -->
                                        <div class="modal fade modal-notification" id="standardModal-{{ $st->id }}"
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
                                                        @if ($st->isactive === 1)
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENONAKTIFKAN</strong>
                                                                staff <strong>{{ ucwords($st->name) }}</strong>?
                                                            </p>
                                                        @else
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENGAKTIFKAN</strong>
                                                                staff <strong>{{ ucwords($st->name) }}</strong>?
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if ($st->isactive === 1)
                                                        <form action="{{ route('manager.master-staffnonaktif', $st->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-footer justify-content-between">
                                                                <button class="btn" data-dismiss="modal"><i
                                                                        class="flaticon-cancel-12"></i> Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Yakin</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('manager.master-staffaktif', $st->id) }}" method="POST">
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
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Posisi</th>
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
        $(document).ready(function() {
            var table = $('#html5-extension').DataTable({
                "dom": "<'dt--top-section'<'row d-flex justify-content-between'<'col-sm-4 d-flex justify-content-start'l><'col-sm-4 d-flex justify-content-end'f>>>" +
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

            table.buttons().container().appendTo('#export-buttons');
        });
        $(document).ready(function() {
            // Inisialisasi Flatpickr untuk modal Edit
            $('#edit').on('shown.bs.modal', function() {
                // Target input dengan class flatpickr-input
                $(this).find('.flatpickr-input').flatpickr({
                    dateFormat: "Y-m-d",
                    appendTo: $(this).find('.modal-body')[
                        0], // Memastikan kalender dirender di dalam modal
                    static: true, // Membuat kalender tetap di posisi relatif terhadap input
                    position: "autoAbove"
                });
            });

            // Hapus Flatpickr saat modal ditutup
            $('#edit').on('hidden.bs.modal', function() {
                $(this).find('.flatpickr-input').flatpickr("destroy");
            });
        });
    </script>
@endsection
