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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span>
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
                            <h5 class="">Permohonan Pendaftaran Toko</h5>
                        </div>
                        <div class="widget-content">
                            <div id="grafik1"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-two">
                        <div class="widget-heading">
                            <h5 class="">Toko Berdasarkan Jenis Usaha</h5>
                        </div>
                        <div class="widget-content">
                            <div id="grafik2" class=""></div>
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
                                    <span class="w-values">{{ $jumlahrestock }}</span>
                                    <span class="w-numeric-titles">Total Restock</span>
                                </div>
                            </div>
                            <div class="w-chart">
                                <div id="grafik3"></div>
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
                                                <h6>Produk <span class="summary-count">{{ $jumlahproduk }}</span></h6>
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
                                                <h6>Staff Gudang <span class="summary-count">{{ $jumlahstgudang }}</span>
                                                </h6>
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
                                                <h6>Staff Penjualan <span
                                                        class="summary-count">{{ $jumlahstpenjualan }}</span></h6>
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
                                    <span class="w-value">{{ $jumlahpenjualan }}</span>
                                    <span class="w-numeric-title">Total Penjualan</span>
                                </div>
                            </div>
                            <div class="w-chart">
                                <div id="grafik4"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-three">
                        <div class="widget-heading">
                            <h5 class="">Top 5 Toko Ter-Aktif</h5>
                        </div>
                        <div class="widget-content">
                            <div class="table-responsive">
                                <table class="table table-scroll">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="th-content">Nama Toko</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Jumlah Staff</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Jumlah Produk</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Jumlah Restock</div>
                                            </th>
                                            <th>
                                                <div class="th-content text-center">Jumlah Penjualan</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topTokoAktif as $top)
                                            <tr>
                                                <td>
                                                    <div class="td-content product-name">
                                                        <div class="align-self-center">
                                                            <p class="prd-name">{{ ucwords($top->name) }}</p>
                                                            <p class="prd-category text-primary">{{ $top->jenis_usaha }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-content text-center">{{ $top->staff_count }}</div>
                                                </td>
                                                <td>
                                                    <div class="td-content text-center">{{ $top->produk_count }}</div>
                                                </td>
                                                <td>
                                                    <div class="td-content text-center">{{ $top->restock_count }}</div>
                                                </td>
                                                <td>
                                                    <div class="td-content text-center">{{ $top->penjualan_count }}</div>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <script src="{{ asset('assets/js/admin/custom_dashboard.js') }}"></script>
    <script>
        var options1 = {
            chart: {
                fontFamily: "Nunito, sans-serif",
                height: 365,
                type: "area",
                zoom: {
                    enabled: false,
                },
                dropShadow: {
                    enabled: true,
                    opacity: 0.2,
                    blur: 10,
                    left: -7,
                    top: 22,
                },
                toolbar: {
                    show: false,
                },
                events: {
                    mounted: function(ctx, config) {
                        const highest1 = ctx.getHighestValueInSeries(0);
                        const highest2 = ctx.getHighestValueInSeries(1);

                        ctx.addPointAnnotation({
                            x: new Date(
                                ctx.w.globals.seriesX[0][
                                    ctx.w.globals.series[0].indexOf(highest1)
                                ]
                            ).getTime(),
                            y: highest1,
                            label: {
                                style: {
                                    cssClass: "d-none",
                                },
                            },
                            customSVG: {
                                SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#2196f3" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                cssClass: undefined,
                                offsetX: -8,
                                offsetY: 5,
                            },
                        });

                        ctx.addPointAnnotation({
                            x: new Date(
                                ctx.w.globals.seriesX[1][
                                    ctx.w.globals.series[1].indexOf(highest2)
                                ]
                            ).getTime(),
                            y: highest2,
                            label: {
                                style: {
                                    cssClass: "d-none",
                                },
                            },
                            customSVG: {
                                SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#6d17cb" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                cssClass: undefined,
                                offsetX: -8,
                                offsetY: 5,
                            },
                        });
                    },
                },
            },
            colors: ["#2196f3", "#6d17cb"],
            dataLabels: {
                enabled: false,
            },
            markers: {
                discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        fillColor: "#000",
                        strokeColor: "#000",
                        size: 5,
                    },
                    {
                        seriesIndex: 2,
                        dataPointIndex: 11,
                        fillColor: "#000",
                        strokeColor: "#000",
                        size: 4,
                    },
                ],
            },
            stroke: {
                show: true,
                curve: "smooth",
                width: 2,
                lineCap: "square",
            },
            series: [{
                    name: "Pendaftar",
                    data: @json($pendaftar),
                },
                {
                    name: "Terverifikasi",
                    data: @json($terverifikasi),
                },
            ],
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    show: true,
                },
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: "12px",
                        fontFamily: "Nunito, sans-serif",
                        cssClass: "apexcharts-xaxis-title",
                    },
                },
            },
            yaxis: {
                labels: {
                    formatter: function(value, index) {
                        return value;
                    },
                    offsetX: -22,
                    offsetY: 0,
                    style: {
                        fontSize: "12px",
                        fontFamily: "Nunito, sans-serif",
                        cssClass: "apexcharts-yaxis-title",
                    },
                },
            },
            grid: {
                borderColor: "#e0e6ed",
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                yaxis: {
                    lines: {
                        show: false,
                    },
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: -10,
                },
            },
            legend: {
                position: "top",
                horizontalAlign: "right",
                offsetY: 0,
                fontSize: "16px",
                fontFamily: "Nunito, sans-serif",
                markers: {
                    width: 10,
                    height: 10,
                    strokeWidth: 0,
                    strokeColor: "#fff",
                    fillColors: undefined,
                    radius: 12,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0,
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 20,
                },
            },
            tooltip: {
                theme: "dark",
                marker: {
                    show: true,
                },
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: 0.28,
                    opacityTo: 0.05,
                    stops: [45, 100],
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    legend: {
                        offsetY: 10,
                    },
                },
            }, ],
        };

        var chart1 = new ApexCharts(document.querySelector("#grafik1"), options1);
        chart1.render();
    </script>
    <script>
        var options = {
            chart: {
                type: "donut",
                width: 397,
            },
            colors: ["#2196f3", "#e2a03f", "#8738a7", "#f7dc6f", "#CB0404"],
            dataLabels: {
                enabled: false,
            },
            legend: {
                position: "bottom",
                horizontalAlign: "center",
                fontSize: "14px",
                markers: {
                    width: 10,
                    height: 10,
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 8,
                },
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "50%",
                        background: "transparent",
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: "17px",
                                fontFamily: "Nunito, sans-serif",
                                color: undefined,
                                offsetY: -10,
                            },
                            value: {
                                show: true,
                                fontSize: "26px",
                                fontFamily: "Nunito, sans-serif",
                                color: "20",
                                offsetY: 16,
                                formatter: function(val) {
                                    return val;
                                },
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: "Total",
                                color: "#888ea8",
                                formatter: function(w) {
                                    return w.globals.seriesTotals.reduce(function(a, b) {
                                        return a + b;
                                    }, 0);
                                },
                            },
                        },
                    },
                },
            },
            stroke: {
                show: true,
                width: 2,
            },
            series: @json($businessSeries), // Ganti dengan data dari controller
            labels: @json($businessLabels), // Ganti dengan label dari controller
            responsive: [{
                    breakpoint: 1599,
                    options: {
                        chart: {
                            width: "350px",
                            height: "400px",
                        },
                        legend: {
                            position: "bottom",
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: "85%",
                                },
                            },
                        },
                    },
                },
                {
                    breakpoint: 1439,
                    options: {
                        chart: {
                            width: "350px",
                            height: "390px",
                        },
                        legend: {
                            position: "bottom",
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: "65%",
                                },
                            },
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(document.querySelector("#grafik2"), options);
        chart.render();
    </script>
    <script>
        var options3 = {
            chart: {
                id: "restock",
                type: "area",
                height: 315,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Restock",
                data: @json($restockSeries), // Ganti dengan data dari controller
            }, ],
            labels: @json($restockLabels), // Ganti dengan label dari controller
            yaxis: {
                min: 0,
            },
            grid: {
                padding: {
                    top: 125,
                    right: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            tooltip: {
                x: {
                    show: false,
                },
                theme: "dark",
            },
            colors: ["#27548A"],
        };

        var d_2C_2 = new ApexCharts(document.querySelector("#grafik3"), options3);
        d_2C_2.render();
    </script>
    <script>
        var options4 = {
            chart: {
                id: "sales",
                type: "area",
                height: 315,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Penjualan",
                data: @json($salesSeries),
            }, ],
            labels: @json($salesLabels),
            yaxis: {
                min: 0,
            },
            grid: {
                padding: {
                    top: 125,
                    right: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            tooltip: {
                x: {
                    show: false,
                },
                theme: "dark",
            },
            colors: ["#e7515a"],
        };

        var d_2C_4 = new ApexCharts(document.querySelector("#grafik4"), options4);
        d_2C_4.render();
    </script>
@endsection
