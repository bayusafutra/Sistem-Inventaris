@extends('layouts.main')
@section('css-custom')
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
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
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                        data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="general-info" class="section general-info">
                                    <div class="info">
                                        <h6 class="">Informasi Umum</h6>
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <input type="file" id="input-file-max-fs" class="dropify"
                                                                accept=".png,.jpg,.jpeg"
                                                                data-default-file="assets/img/200x200.jpg"
                                                                data-max-file-size="2M" />
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                                Unggah
                                                                Foto</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="namaLengkap">Nama
                                                                            Lengkap</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="namaLengkap" placeholder="Nama Lengkap"
                                                                            value="Jimmy Turner">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="namaPanggilan">Nama
                                                                            Panggilan</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="namaPanggilan" placeholder="Nama Panggilan"
                                                                            value="Jimmy">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="username" placeholder="ciroaples"
                                                                            value="Jimmy">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="email" placeholder="ciroaples"
                                                                            value="ciroaples@gmail.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="profession">Posisi</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="profession" placeholder="Posisi"
                                                                            value="Manager" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="toko">Toko</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="toko" placeholder="Toko"
                                                                            value="Badan Usaha Mas Dafa" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="jk">Jenis
                                                                            Kelamin</label>
                                                                        <select class="form-control" id="jk">
                                                                            <option selected>Pria</option>
                                                                            <option>Wanita</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="dob-input">Tanggal Lahir</label>
                                                                    <div class="d-sm-flex">
                                                                        <input id="basicFlatpickr" value=""
                                                                            class="form-control flatpickr flatpickr-input active"
                                                                            type="text"
                                                                            placeholder="Pilih Tanggal Lahir">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="notelp">No Telp</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="notelp" placeholder="08362936442"
                                                                            value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row px-5 mt-3">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary submit-profile">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="work-platforms" class="section work-platforms" action="" method="POST">
                                    @csrf
                                    <div class="info">
                                        <h5 class="">Ubah Password</h5>
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <!-- Password Saat Ini -->
                                                <div class="field-wrapper input mb-3">
                                                    <label for="current-password" class="form-label">Password
                                                        Saat Ini</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-lock">
                                                                <rect x="3" y="11" width="18" height="11"
                                                                    rx="2" ry="2"></rect>
                                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                            </svg>
                                                        </span>
                                                        <input id="current-password" name="current_password"
                                                            type="password" class="form-control"
                                                            placeholder="Masukkan password saat ini">
                                                        <span class="input-group-text toggle-password"
                                                            data-target="current-password">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Password Baru -->
                                                <div class="field-wrapper input mb-3">
                                                    <label for="new-password" class="form-label">Password
                                                        Baru</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-lock">
                                                                <rect x="3" y="11" width="18" height="11"
                                                                    rx="2" ry="2"></rect>
                                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                            </svg>
                                                        </span>
                                                        <input id="new-password" name="new_password" type="password"
                                                            class="form-control" placeholder="Masukkan password baru">
                                                        <span class="input-group-text toggle-password"
                                                            data-target="new-password">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Ulangi Password Baru -->
                                                <div class="field-wrapper input mb-3">
                                                    <label for="new-password-confirm" class="form-label">Ulangi
                                                        Password Baru</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-lock">
                                                                <rect x="3" y="11" width="18" height="11"
                                                                    rx="2" ry="2"></rect>
                                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                            </svg>
                                                        </span>
                                                        <input id="new-password-confirm" name="new_password_confirmation"
                                                            type="password" class="form-control"
                                                            placeholder="Ulangi password baru">
                                                        <span class="input-group-text toggle-password"
                                                            data-target="new-password-confirm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    @error('new_password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button class="btn btn-primary submit-profile">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/dropify/dropify.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="assets/js/users/account-settings.js"></script>
    <script src="assets/js/profile/custom.js"></script>
@endsection
