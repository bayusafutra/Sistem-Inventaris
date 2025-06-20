@extends('layouts.main')
@section('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
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

        .add-button {
            margin: 18px 18px 0 18px;
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Satuan Produk</span>
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
                        <div class="add-button d-flex justify-content-end">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add"
                                title="Tambah Data">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus-square">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
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
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Satuan
                                                Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <svg style="color: black" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('manager.store-satuan', ['slug' => $toko->slug]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label for="namaSatuan">Nama</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Nama Satuan Produk" autofocus required>
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
                        <table id="alter_pagination" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th class="text-center dt-no-sorting">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($satuanproduk as $sp)
                                    <tr>
                                        <td>{{ ucwords($sp->name) }}</td>
                                        <td>
                                            @if ($sp->isactive === 1)
                                                <span class="badge outline-badge-success"> Aktif </span>
                                            @else
                                                <span class="badge outline-badge-danger"> Tidak Aktif </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal"
                                                data-target="#edit-{{ $sp->id }}" title="Edit Data">
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
                                            <button type="button" data-toggle="modal"
                                                data-target="#standardModal-{{ $sp->id }}" title="Verifikasi Toko">
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
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit-{{ $sp->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Satuan
                                                            Produk</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <svg style="color: black" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="4"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6"
                                                                    y2="18"></line>
                                                                <line x1="6" y1="6" x2="18"
                                                                    y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('manager.edit-satuan') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="idsatuan"
                                                            value="{{ $sp->id }}">
                                                        <div class="modal-body">
                                                            <label for="namaSatuan">Nama</label>
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Nama Satuan Produk"
                                                                value="{{ $sp->name }}" required>
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
                                        <!-- Modal Status -->
                                        <div class="modal fade modal-notification" id="standardModal-{{ $sp->id }}"
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
                                                        @if ($sp->isactive === 1)
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENONAKTIFKAN</strong>
                                                                status satuan produk
                                                                <strong>{{ ucwords($sp->name) }}</strong>?
                                                            </p>
                                                        @else
                                                            <p class="modal-text">Apakah anda yakin untuk <strong
                                                                    style="font-weight: bolder; color: black">MENGAKTIFKAN</strong>
                                                                status satuan produk
                                                                <strong>{{ ucwords($sp->name) }}</strong>?
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if ($sp->isactive === 1)
                                                        <form action="{{ route('manager.master-satuannonaktif', $sp->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-footer justify-content-between">
                                                                <button class="btn" data-dismiss="modal"><i
                                                                        class="flaticon-cancel-12"></i> Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Yakin</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('manager.master-satuanaktif', $sp->id) }}" method="POST">
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
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
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
