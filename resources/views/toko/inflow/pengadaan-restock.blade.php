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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toko/inflow/custom-pengadaan-restock.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components/custom-sweetalert.css') }}" />
    <style>
        .form-group.mb-4 input[readonly] {
            color: #6c757d;
            font-weight: 700;
            font-size: 13px;
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
                                                        Pengadaan Restock
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
                                                <form id="addForm"
                                                    action="{{ route('manager.store-pengadaan-restock', ['slug' => $toko->slug]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group mb-4">
                                                                    <label><span class="wajib">*</span>Tanggal dan
                                                                        Waktu</label>
                                                                    <input id="dateTimeFlatpickr" value=""
                                                                        name="tgl_pengadaan"
                                                                        class="form-control flatpickr flatpickr-input active"
                                                                        type="text" placeholder="Select Date.."
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-4">
                                                                    <label><span class="wajib">*</span>No Series</label>
                                                                    <input type="text" class="form-control"
                                                                        name="noseries" value="{{ $noseries }}"
                                                                        placeholder="No Series" required readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group mb-4">
                                                                    <label><span class="wajib">*</span>Penanggung
                                                                        Jawab</label>
                                                                    <input type="text" class="form-control"
                                                                        name=""
                                                                        value="{{ ucwords(auth()->user()->name) }}"
                                                                        readonly>
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ auth()->user()->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Catatan Pengadaan</label>
                                                                <div class="form-group mb-2">
                                                                    <textarea class="form-control" name="catatan" value="{{ old('catatan') }}" rows="4"
                                                                        placeholder="Catatan Pengadaan"></textarea>
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
                                                                        name="produk_id[]" data-live-search="true"
                                                                        required>
                                                                        <option selected disabled>Pilih Produk
                                                                        </option>
                                                                        @foreach ($produk as $pr)
                                                                            <option value="{{ $pr->id }}"
                                                                                data-satuan="{{ $pr->satuan->name ?? 'Satuan' }}">
                                                                                {{ ucwords($pr->name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <div class="form-group mb-3">
                                                                    <div class="input-group">
                                                                        <input id="ga" type="number"
                                                                            name="quantity[]" min="1"
                                                                            class="form-control list-item"
                                                                            placeholder="Jumlah Satuan" required>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                id="nama-satuan">Satuan</span>
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
                                @foreach ($pengadaanrestock as $prs)
                                    <tr>
                                        <td>{{ $prs->noseries }}</td>
                                        <td>{{ ucwords($prs->user->name) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($prs->tgl_pengadaan)->translatedFormat('l, d F Y H:i') }}
                                        </td>
                                        <td>
                                            @if ($prs->status == 1)
                                                <span class="badge outline-badge-primary"> Aktif </span>
                                            @elseif ($prs->status == 2)
                                                <span class="badge outline-badge-danger"> Tidak Aktif </span>
                                            @else
                                                <span class="badge outline-badge-success"> Selesai </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal"
                                                data-target="#tabsModal-{{ $prs->id }}"
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
                                            <button type="button" data-toggle="modal"
                                                data-target="#standardModal-{{ $prs->id }}"
                                                title="non-Aktif Pengadaan Restock">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-alert-octagon table-cancel">
                                                    <polygon
                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                    </polygon>
                                                    <line x1="12" y1="8" x2="12" y2="12">
                                                    </line>
                                                    <line x1="12" y1="16" x2="12.01" y2="16">
                                                    </line>
                                                </svg>
                                            </button>
                                        </td>
                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="tabsModal-{{ $prs->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tabsModalLabel">Detail Pengadaan
                                                            Restock
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="contact-tab-{{ $prs->id }}"
                                                                    data-toggle="tab" href="#contact-{{ $prs->id }}"
                                                                    role="tab" aria-controls="contact"
                                                                    aria-selected="false">Catatan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="staff-tab-{{ $prs->id }}"
                                                                    data-toggle="tab" href="#staff-{{ $prs->id }}"
                                                                    role="tab" aria-controls="staff"
                                                                    aria-selected="false">List Produk</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active"
                                                                id="contact-{{ $prs->id }}" role="tabpanel"
                                                                aria-labelledby="contact-tab-{{ $prs->id }}">
                                                                <p class="modal-text">{{ $prs->catatan ?? '-' }}</p>
                                                            </div>
                                                            <div class="tab-pane fade" id="staff-{{ $prs->id }}"
                                                                role="tabpanel"
                                                                aria-labelledby="staff-tab-{{ $prs->id }}">
                                                                <div class="product-list">
                                                                    @foreach ($prs->detailpengadaan as $index => $detail)
                                                                        <div class="product-item">
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <span
                                                                                    class="number-list">{{ $index + 1 }}.</span>
                                                                                <span
                                                                                    class="product-name">{{ ucwords($detail->produk->name) }}</span>
                                                                                <span
                                                                                    class="product-quantity">{{ $detail->total_unit }}
                                                                                    {{ ucwords($detail->produk->satuan->name) }}</span>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

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
                                        <!-- Modal Non Aktif -->
                                        <div class="modal fade modal-notification" id="standardModal-{{ $prs->id }}"
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
                                                        @if ($prs->status != 3)
                                                            @if ($prs->status == 1)
                                                                <p class="modal-text">Apakah anda yakin untuk <strong
                                                                        style="font-weight: bolder; color: black">MENONAKTIFKAN</strong>
                                                                    pengadaan restock dengan No Series
                                                                    <strong>{{ $prs->noseries }}</strong>?
                                                                </p>
                                                            @else
                                                                <p class="modal-text">Apakah anda yakin untuk <strong
                                                                        style="font-weight: bolder; color: black">MENGAKTIFKAN</strong>
                                                                    pengadaan restock dengan No Series
                                                                    <strong>{{ $prs->noseries }}</strong>?
                                                                </p>
                                                            @endif
                                                        @else
                                                            <p class="modal-text">Pengadaan Restock ini telah digunakan pada Restock <strong
                                                                    style="font-weight: bolder; color: black">RST180620251-12</strong>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if ($prs->status != 3)
                                                        @if ($prs->status == 1)
                                                            <form
                                                                action="{{ route('manager.pengadaanrestock-nonaktif', $prs->id) }}"
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
                                                            <form
                                                                action="{{ route('manager.pengadaanrestock-aktif', $prs->id) }}"
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
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
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
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/notification/custom-snackbar.js') }}"></script>
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

            // Fungsi untuk rekap produk
            function updateRekap() {
                let totalProducts = new Set();
                let totalUnits = 0;

                $('#list-container .row.px-3 .selectpicker').each(function() {
                    const $select = $(this);
                    const productName = $select.find('option:selected').text();
                    const $quantityInput = $select.closest('.row.px-3').find('input[type="number"]');
                    const quantity = parseInt($quantityInput.val()) || 0;

                    if (productName && productName !== 'Pilih Produk' && quantity > 0) {
                        totalProducts.add(productName);
                        totalUnits += quantity;
                    }
                });

                $('#total-products').text(totalProducts.size);
                $('#total-units').text(totalUnits);

                // Reset border color (tanpa cek stok untuk pengadaan)
                $('#list-container .row.px-3 input[type="number"]').css('border-color', '');
            }

            // Fungsi untuk update satuan berdasarkan produk yang dipilih
            function updateSatuan($select) {
                const $row = $select.closest('.row.px-3');
                const satuan = $select.find('option:selected').data('satuan') || 'Satuan';
                // Capitalize huruf depan setiap kata
                const capitalizedSatuan = satuan.replace(/\b\w/g, l => l.toUpperCase());
                $row.find('#nama-satuan').text(capitalizedSatuan);
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
                        updateRekap(); // Update rekap saat perubahan
                        updateSatuan($(this)); // Update satuan berdasarkan pilihan
                    });
                } catch (e) {
                    // Error ditangani tanpa logging
                }

                // Bind event input quantity untuk list baru
                template.find('input[type="number"]').on('input', function() {
                    updateRekap(); // Update rekap saat input quantity
                });

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
                    updateRekap(); // Update rekap saat perubahan
                    updateSatuan($(this)); // Update satuan berdasarkan pilihan
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
                    updateRekap(); // Update rekap setelah hapus
                });

                // Bind event listener global untuk semua selectpicker dan input quantity
                $('#list-container').on('changed.bs.select', '.selectpicker', function() {
                    updateRekap();
                    updateSatuan($(this)); // Update satuan saat perubahan
                });
                $('#list-container').on('input', 'input[type="number"]', function() {
                    updateRekap();
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
                } else {
                    updateRekap(); // Update rekap terakhir sebelum submit
                }
            });

            // Reset counter saat modal ditutup
            $('#add').on('hidden.bs.modal', function() {
                listCounter = 1;
                updateRekap(); // Reset rekap kalau perlu
            });

            // Inisialisasi rekap saat load
            updateRekap();
        });
    </script>
@endsection
