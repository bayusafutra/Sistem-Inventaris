@extends('layouts.main')
@section('css-custom')
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dashboard/home.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Akun</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Profil Pengguna</span>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-one">
                        <div class="wellcome pt-4 px-3 text-center">
                            <h3>Selamat Datang di Sistem Inventaris TechnoLogis</h3>
                        </div>
                        <div class="detail-web px-5 py-3">
                            <p>
                                Selamat datang di <strong>TechnoLogis</strong>, solusi modern untuk mengelola inventaris
                                toko Anda dengan mudah dan efisien. Sistem berbasis website kami dirancang untuk membantu
                                Anda memantau stok barang, mencatat transaksi masuk dan keluar, serta menghasilkan laporan
                                secara real-time, semua dalam satu platform yang intuitif. Dengan antarmuka yang sederhana
                                namun canggih, <strong>TechnoLogis</strong> memastikan pengelolaan inventaris menjadi lebih
                                terorganisir, menghemat waktu, dan meningkatkan produktivitas bisnis Anda.
                            </p>
                        </div>
                        <div class="counter-quanty px-5">
                            <div class="simple--counter-container">
                                <div class="counter-container">
                                    <div class="counter-content">
                                        <h1 class="s-counter2 s-counter text-center">75</h1>
                                    </div>
                                    <p class="s-counter-text text-center">TOKO</p>
                                </div>
                                <div class="counter-container">
                                    <div class="counter-content">
                                        <h1 class="s-counter3 s-counter text-center">150</h1>
                                    </div>
                                    <p class="s-counter-text text-center">PENGGUNA</p>
                                </div>
                                <div class="counter-container">
                                    <div class="counter-content">
                                        <h1 class="s-counter4 s-counter text-center">230</h1>
                                    </div>
                                    <p class="s-counter-text text-center">PRODUK</p>
                                </div>
                                <div class="counter-container">
                                    <div class="counter-content">
                                        <h1 class="s-counter5 s-counter text-center">210</h1>
                                    </div>
                                    <p class="s-counter-text text-center">TRANSAKSI MASUK</p>
                                </div>
                                <div class="counter-container">
                                    <div class="counter-content">
                                        <h1 class="s-counter6 s-counter text-center">200</h1>
                                    </div>
                                    <p class="s-counter-text text-center">TRANSAKSI KELUAR</p>
                                </div>
                            </div>
                        </div>
                        <div class="detail-web px-5 pt-2 pt-1">
                            <p>
                                Segera daftarkan toko Anda sekarang dan rasakan kemudahan mengelola inventaris tanpa ribet!
                                <strong>TechnoLogis</strong> cocok untuk berbagai jenis usaha, mulai dari toko ritel,
                                gudang, hingga bisnis skala kecil. Hanya dengan beberapa langkah mudah, Anda bisa mulai
                                mengatur stok, melacak aset, dan membuat keputusan bisnis yang lebih tepat. <a
                                    href="{{ route('pendaftaran-toko') }}" class="ajakan">Bergabunglah</a>
                                bersama kami di <strong>TechnoLogis</strong> hari ini dan jadilah bagian dari revolusi
                                pengelolaan
                                inventaris yang cerdas!
                            </p>
                        </div>
                        <div class="widget-heading">
                            <h5 class="px-4">Grafik Toko</h5>
                            <div class="dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content px-4">
                            <div class="" id="revenueMonthly"></div>
                        </div>

                        <div class="rating px-5 mb-3">
                            <h5>Penilaian Pengguna</h5>
                            <div id="userRatingCarousel" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="5000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                                <div class="widget widget-card-one">
                                                    <div class="widget-content">
                                                        <div class="media">
                                                            <div class="w-img">
                                                                <img src="assets/img/90x90.jpg" alt="avatar">
                                                            </div>
                                                            <div class="media-body">
                                                                <h6>Jimmy Turner</h6>
                                                                <p class="meta-date-time">Monday, Nov 18</p>
                                                            </div>
                                                            <div class="media-rating">
                                                                <span class="rating-stars">
                                                                    <i class="fas fa-star active"></i>
                                                                    <i class="fas fa-star active"></i>
                                                                    <i class="fas fa-star active"></i>
                                                                    <i class="fas fa-star active"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse
                                                            cillum "dolore eu fugiat" nulla pariatur. Excepteur sint
                                                            occaecat cupidatat non proident.</p>
                                                        <div class="w-action">
                                                            <div class="card-like">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-briefcase">
                                                                    <rect x="2" y="7" width="20" height="14"
                                                                        rx="2" ry="2"></rect>
                                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16">
                                                                    </path>
                                                                </svg>
                                                                <span>Badan Usaha Mas Dafa</span>
                                                            </div>
                                                            <div class="read-more">
                                                                <span class="badge outline-badge-success">Manager</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                                <div class="widget widget-card-one">
                                                    <div class="widget-content">
                                                        <div class="media">
                                                            <div class="w-img">
                                                                <img src="assets/img/90x90.jpg" alt="avatar">
                                                            </div>
                                                            <div class="media-body">
                                                                <h6>Sarah Johnson</h6>
                                                                <p class="meta-date-time">Tuesday, Dec 10</p>
                                                            </div>
                                                        </div>
                                                        <p>"Sangat membantu!" TeknoLogis membuat pengelolaan stok jadi jauh
                                                            lebih mudah dan efisien. Fitur laporannya sangat berguna untuk
                                                            bisnis saya.</p>
                                                        <div class="w-action">
                                                            <div class="card-like">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-briefcase">
                                                                    <rect x="2" y="7" width="20" height="14"
                                                                        rx="2" ry="2"></rect>
                                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16">
                                                                    </path>
                                                                </svg>
                                                                <span>Toko Sumber Jaya</span>
                                                            </div>
                                                            <div class="read-more">
                                                                <span class="badge outline-badge-success">Owner</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                                <div class="widget widget-card-one">
                                                    <div class="widget-content">
                                                        <div class="media">
                                                            <div class="w-img">
                                                                <img src="assets/img/90x90.jpg" alt="avatar">
                                                            </div>
                                                            <div class="media-body">
                                                                <h6>Ahmad Fauzi</h6>
                                                                <p class="meta-date-time">Wednesday, Jan 15</p>
                                                            </div>
                                                        </div>
                                                        <p>"TeknoLogis benar-benar solusi terbaik untuk bisnis kecil seperti
                                                            saya. Antarmukanya sederhana, tapi fiturnya sangat lengkap!"</p>
                                                        <div class="w-action">
                                                            <div class="card-like">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-briefcase">
                                                                    <rect x="2" y="7" width="20" height="14"
                                                                        rx="2" ry="2"></rect>
                                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16">
                                                                    </path>
                                                                </svg>
                                                                <span>CV Maju Bersama</span>
                                                            </div>
                                                            <div class="read-more">
                                                                <span class="badge outline-badge-success">Direktur</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                                <div class="widget widget-card-one">
                                                    <div class="widget-content">
                                                        <div class="media">
                                                            <div class="w-img">
                                                                <img src="assets/img/90x90.jpg" alt="avatar">
                                                            </div>
                                                            <div class="media-body">
                                                                <h6>Rina Setiawan</h6>
                                                                <p class="meta-date-time">Friday, Feb 20</p>
                                                            </div>
                                                        </div>
                                                        <p>"Sistemnya sangat intuitif! Saya bisa melacak stok dengan cepat
                                                            dan membuat keputusan bisnis yang lebih baik."</p>
                                                        <div class="w-action">
                                                            <div class="card-like">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-briefcase">
                                                                    <rect x="2" y="7" width="20" height="14"
                                                                        rx="2" ry="2"></rect>
                                                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16">
                                                                    </path>
                                                                </svg>
                                                                <span>UD Sejahtera</span>
                                                            </div>
                                                            <div class="read-more">
                                                                <span class="badge outline-badge-success">Supervisor</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ratingCarousel = document.getElementById('userRatingCarousel');
            if (ratingCarousel) {
                new bootstrap.Carousel(ratingCarousel, {
                    interval: 3000,
                    pause: 'hover',
                });
            }
        });
    </script>
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('plugins/counter/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/custom-home.js') }}"></script>
@endsection
