@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-modal.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}" />
    <style>
        table tbody tr td button {
            background: none;
            border: none;
        }
        .outline-badge-success {
            padding: 2.2px 19px
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Users</span>
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
                        <table id="alter_pagination" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Posisi</th>
                                    <th>Toko</th>
                                    <th>Status</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->panggilan ?? 'N/A' }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->notelp ?? 'N/A' }}</td>
                                        <td>{{ is_null($user->jk) ? 'N/A' : ($user->jk ? 'Pria' : 'Wanita') }}</td>
                                        <td>
                                            @if ($user->jk)
                                                {{ floor(\Carbon\Carbon::parse($user->jk)->diffInYears(\Carbon\Carbon::now())) }}
                                                tahun
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->roleuser == 2)
                                                User Umum
                                            @elseif ($user->roleuser == 3)
                                                Manager
                                            @elseif ($user->roleuser == 4)
                                                Staff Gudang
                                            @elseif ($user->roleuser == 5)
                                                Staff Penjualan
                                            @endif
                                        </td>
                                        <td>{{ $user->toko->name }}</td>
                                        <td>
                                            @if ($user->isactive == true)
                                                <span class="badge outline-badge-success"> Aktif </span>
                                            @else
                                                <span class="badge outline-badge-danger"> Tidak Aktif </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal"
                                                data-target="#standardModal-{{ $user->id }}" title="Verifikasi Toko">
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
                                        <div class="modal fade modal-notification" id="standardModal-{{ $user->id }}"
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
                                                        @if ($user->isactive == true)
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENONAKTIFKAN</strong>
                                                                status User <strong>{{ ucwords($user->name) }}?</strong>
                                                            </p>
                                                        @else
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENGAKTIFKAN</strong>
                                                                status User <strong>{{ ucwords($user->name) }}?</strong>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if ($user->isactive == true)
                                                        <form action="{{ route('admin.master-usernonaktif', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-footer justify-content-between">
                                                                <button class="btn" data-dismiss="modal"><i
                                                                        class="flaticon-cancel-12"></i> Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Yakin</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.master-useraktif', $user->id) }}"
                                                            method="POST">
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
                                    <th>Tanggal Lahir</th>
                                    <th>Posisi</th>
                                    <th>Toko</th>
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
            $('#alter_pagination').DataTable({
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [10, 15, 20, 25, 50, 100],
                "pageLength": 10
            });
        });
    </script>
@endsection
