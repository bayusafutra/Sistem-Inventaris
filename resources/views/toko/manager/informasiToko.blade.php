@extends('layouts.main')
@section('css-custom')
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ ucwords($toko->name) }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Manager</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Informasi Toko</span>
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
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="row invoice layout-top-spacing layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="doc-container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="invoice-container">
                                            <div class="invoice-inbox">
                                                <div id="ct" class="">
                                                    <div class="invoice-00001">
                                                        <div class="content-section">
                                                            <div class="inv--head-section inv--detail-section">
                                                                <div class="info mb-5">
                                                                    <h5 class="">Informasi Toko</h5>
                                                                    @if ($toko->status == 1)
                                                                        <small>Harap sabar menunggu, admin sedang memproses
                                                                            pendaftaran toko Anda!
                                                                        </small>
                                                                    @elseif ($toko->status == 2)
                                                                        <small>Selamat {{ ucwords(auth()->user()->name) }},
                                                                            Pendaftaran toko Anda telah disetujui admin
                                                                        </small>
                                                                    @else
                                                                        <small>Mohon maaf {{ ucwords(auth()->user()->name) }}, Pendaftaran toko Anda telah ditolak admin
                                                                        </small>
                                                                    @endif
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-12 mr-auto">
                                                                        <div class="d-flex">
                                                                            <h3 class="in-heading align-self-center"
                                                                                style="font-weight: 900">
                                                                                {{ strtoupper($toko->name) }}
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 text-sm-right">
                                                                        <p class="inv-list-number">
                                                                            <span class="inv-title">STATUS : </span>
                                                                            @if ($toko->status == 1)
                                                                                <span class="badge outline-badge-warning">
                                                                                    Verifikasi
                                                                                </span>
                                                                            @elseif ($toko->status == 2)
                                                                                <span class="badge outline-badge-primary">
                                                                                    Diterima
                                                                                </span>
                                                                            @else
                                                                                <span class="badge outline-badge-danger">
                                                                                    Ditolak
                                                                                </span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    @php
                                                                        $manager = $toko->user
                                                                            ->where('roleuser', 3)
                                                                            ->first();
                                                                    @endphp

                                                                    <div class="col-sm-6 align-self-center mt-3">
                                                                        <p class="inv-street-addr">
                                                                            {{ ucwords($manager->name) }}</p>
                                                                        <p class="inv-email-address">
                                                                            {{ $manager->email }}</p>
                                                                        <p class="inv-email-address">
                                                                            {{ $manager->notelp ?? '' }}</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                                        <p class="inv-created-date">
                                                                            <span class="inv-title">Tanggal Pendaftaran
                                                                                :</span>
                                                                            <span
                                                                                class="inv-date">{{ \Carbon\Carbon::parse($toko->tgl_pendaftaran)->translatedFormat('l, d F Y') }}</span>
                                                                        </p>
                                                                        <p class="inv-due-date">
                                                                            <span class="inv-title">Tanggal Pengesahan
                                                                                :</span>
                                                                            <span class="inv-date">
                                                                                @if ($toko->tgl_pengesahan)
                                                                                    {{ \Carbon\Carbon::parse($toko->tgl_pengesahan)->translatedFormat('l, d F Y') }}
                                                                                @else
                                                                                    -
                                                                                @endif
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="inv--detail-section inv--customer-detail-section">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                        <p class="inv-to">Detail :</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                                        <h6 class=" inv-title">Deskripsi Toko :</h6>
                                                                    </div>
                                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                        <p class="inv-customer-name">
                                                                            {{ $toko->jenis_usaha }}</p>
                                                                        <p class="inv-street-addr">
                                                                            {{ $toko->alamat }}
                                                                        </p>
                                                                        <p class="inv-email-address">
                                                                            {{ $toko->kelurahan }},
                                                                            {{ $toko->kecamatan }}
                                                                        </p>
                                                                        <p class="inv-email-address">
                                                                            {{ $toko->kota }}, {{ $toko->provinsi }}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                                        <div class="inv--payment-info">
                                                                            <p>
                                                                                <span class=" inv-subtitle">
                                                                                    {{ $toko->deskripsi }}
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="inv--note">
                                                                    <div class="row mt-4">
                                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                            <p>Catatan: Terima kasih telah mempercayai
                                                                                pengelolaan inventaris toko Anda bersama
                                                                                kami
                                                                            </p>
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
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
@endsection
