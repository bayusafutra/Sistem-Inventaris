@extends('layouts.main')
@section('css-custom')
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/admin/custom_dashboard.css') }}" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Manager</span>
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
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-one">
                        <div class="widget-heading">
                            <h5 class="">Tren Inflow & Outflow Produk</h5>
                        </div>
                        <div class="widget-content">
                            <div id="revenueMonthly"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-two">
                        <div class="widget-heading">
                            <h5 class="">Stok Produk</h5>
                        </div>
                        <div class="widget-content">
                            <div id="chart-2" class=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget-one widget">
                        <div class="widget-content">
                            <div class="w-numeric-value">
                                <div class="w-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                        </path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                                <div class="w-content">
                                    <span class="w-values">3,192</span>
                                    <span class="w-numeric-titles">Pengadaan Produk</span>
                                </div>
                            </div>
                            <div class="w-chart">
                                <div id="total-pengadaan"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-three">
                        <div class="widget-heading">
                            <h5 class="">Ringkasan</h5>
                        </div>
                        <div class="widget-content">
                            <div class="order-summary">
                                <div class="summary-list summary-income">
                                    <div class="summery-info">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-shopping-bag">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6">
                                                </line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                        </div>
                                        <div class="w-summary-details">
                                            <div class="w-summary-info">
                                                <h6>Produk <span class="summary-count">2.350 </span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list summary-profit">
                                    <div class="summery-info">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-truck">
                                                <rect x="1" y="3" width="15" height="13"></rect>
                                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                            </svg>
                                        </div>
                                        <div class="w-summary-details">
                                            <div class="w-summary-info">
                                                <h6>Staff Gudang <span class="summary-count">9</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list summary-expenses">
                                    <div class="summery-info">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-credit-card">
                                                <rect x="1" y="4" width="22" height="16" rx="2"
                                                    ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10">
                                                </line>
                                            </svg>
                                        </div>
                                        <div class="w-summary-details">
                                            <div class="w-summary-info">
                                                <h6>Staff Penjualan <span class="summary-count">3</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget-one widget">
                        <div class="widget-content">
                            <div class="w-numeric-value">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-shopping-cart">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                </div>
                                <div class="w-content">
                                    <span class="w-value">3,192</span>
                                    <span class="w-numeric-title">Penjualan Produk</span>
                                </div>
                            </div>
                            <div class="w-chart">
                                <div id="total-penjualan"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-three">
                        <div class="widget-heading">
                            <h5 class="">5 Produk dengan Stok Terendah</h5>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table table-scroll">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="th-content">Nama Produk</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Satuan Produk</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Harga Satuan</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Stok Produk</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="td-content product-name">
                                                    <div class="align-self-center">
                                                        <p class="prd-name">Beras 5Kg</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Karung</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Rp75.000,00</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">5</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td-content product-name">
                                                    <div class="align-self-center">
                                                        <p class="prd-name">Minyak Goreng 1L</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Botol</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Rp12.500,00</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">3</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td-content product-name">
                                                    <div class="align-self-center">
                                                        <p class="prd-name">Gula Pasir 1Kg</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Sak</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Rp14.000,00</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">7</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td-content product-name">
                                                    <div class="align-self-center">
                                                        <p class="prd-name">Kecap Manis 500ml</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Botol</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Rp8.500,00</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">2</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td-content product-name">
                                                    <div class="align-self-center">
                                                        <p class="prd-name">Kopi Bubuk 250gr</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Paket</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">Rp25.000,00</div>
                                            </td>
                                            <td>
                                                <div class="td-content text-center">4</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection
@section('js-custom')
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/toko/manager/custom_dashboard.js') }}"></script>
@endsection
