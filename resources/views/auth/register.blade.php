<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Register Boxed | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/register.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
</head>

<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Daftar</h1>
                        <span class="signup-link register">Sudah memiliki akun?
                            <a href="{{ route('login') }}" style="font-weight: 900; color: #3b3f5c;">Masuk
                            </a>
                        </span>
                        <form method="POST" action="{{ route('post.register') }}" class="text-left">
                            @csrf
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="username-field" class="field-wrapper input">
                                            <label for="name">Nama Lengkap</label>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                                <polyline points="17 11 19 13 23 9"></polyline>
                                            </svg>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="email-field" class="field-wrapper input">
                                            <label for="email">EMAIL</label>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-at-sign register">
                                                <circle cx="12" cy="12" r="4"></circle>
                                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                            </svg>
                                            <input id="email" name="email" type="text"
                                                value="{{ old('email') }}" class="form-control" placeholder="Email"
                                                required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="password-field" class="field-wrapper input">
                                            <div class="d-flex justify-content-between">
                                                <label for="password">PASSWORD</label>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-lock">
                                                <rect x="3" y="11" width="18" height="11" rx="2"
                                                    ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                            <input id="password" name="password" type="password"
                                                class="form-control" placeholder="Password" required>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                id="toggle-password" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="password-confirm-field" class="field-wrapper input">
                                            <div class="d-flex justify-content-between">
                                                <label for="password-confirm">ULANGI PASSWORD</label>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-lock">
                                                <rect x="3" y="11" width="18" height="11" rx="2"
                                                    ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                            <input id="password-confirm" name="password_confirmation" type="password"
                                                class="form-control" placeholder="Ulangi Password" required>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                id="toggle-password-confirm" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="division d-flex align-items-center">
                                    <div class="col-5 px-0">
                                        <hr>
                                    </div>
                                    <div class="col-2 text-center">
                                        <span>DETAIL TOKO</span>
                                    </div>
                                    <div class="col-5 px-0">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="degree2">Nama Toko</label>
                                            <input type="text" class="form-control mb-4" id="degree2"
                                                placeholder="Nama Toko" value="" name="nametoko" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-groupp">
                                            <label for="degree3">Jenis Usaha</label>
                                            <select class="form-control basic" name="jenis_usaha" required>
                                                <option disabled selected>Pilih Jenis Usaha...
                                                </option>
                                                <option value="Grosir Sembako">Grosir Sembako
                                                </option>
                                                <option value="Grosir Makanan & Jajan">Grosir
                                                    Makanan &
                                                    Jajan</option>
                                                <option value="Grosir Pakaian">Grosir Pakaian
                                                </option>
                                                <option value="Elektronik">Elektronik</option>
                                                <option value="Obat-obatan">Obat-obatan</option>
                                                <option value="Material (Bangunan)">Material
                                                    (Bangunan)
                                                </option>
                                                <option value="Kosmetik">Kosmetik</option>
                                            </select>
                                            @error('jenis_usaha')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Provinsi</label>
                                        <select class="selectpicker form-control mb-4" id="provinsi" name="provinsi"
                                            data-live-search="true" required>
                                            <option value="" selected disabled>Pilih Provinsi
                                            </option>
                                        </select>
                                        @error('provinsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kota</label>
                                        <select class="selectpicker form-control mb-4" id="kota" name="kota"
                                            data-live-search="true" disabled>
                                            <option value="" selected disabled>Pilih
                                                Kota</option>
                                        </select>
                                        @error('kota')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kecamatan</label>
                                        <select class="selectpicker form-control mb-4" id="kecamatan"
                                            name="kecamatan" data-live-search="true" disabled>
                                            <option value="" selected disabled>Pilih
                                                Kecamatan
                                            </option>
                                        </select>
                                        @error('kecamatan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kelurahan</label>
                                        <select class="selectpicker form-control mb-4" id="kelurahan"
                                            name="kelurahan" data-live-search="true" disabled>
                                            <option value="" selected disabled>Pilih
                                                Kelurahan
                                            </option>
                                        </select>
                                        @error('kelurahan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="degree4">Alamat</label>
                                            <input type="text" class="form-control" id="degree4"
                                                placeholder="Alamat Toko" value="" name="alamat" required>
                                            @error('alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Deskripsi Toko</label>
                                        <textarea class="form-control" placeholder="Jelaskkan secara singkat deskripsi toko Anda" name="deskripsi"
                                            rows="4"></textarea>
                                        @error('deskripsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper mb-2">
                                        <button type="submit" class="btn btn-primary">Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/notification/custom-snackbar.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script>
        @if (session('message'))
            $(document).ready(function() {
                Snackbar.show({
                    text: '{{ session('message') }}',
                    pos: 'bottom-left',
                    actionText: 'Tutup',
                    actionTextColor: '#fff',
                    backgroundColor: '{{ session('type') === 'success' ? '#2ecc71' : '#e74c3c' }}',
                    duration: 3000
                });
            });
        @endif
    </script>
    <script>
        $(document).ready(function() {
            // Load provinces on page load
            $.get('/get-provinces', function(data) {
                let $provinsi = $('#provinsi');
                $provinsi.empty();
                $provinsi.append('<option value="" selected disabled>Pilih Provinsi</option>');
                $.each(data, function(index, province) {
                    $provinsi.append('<option value="' + province.prov_id + '">' + province
                        .prov_name + '</option>');
                });
                $provinsi.selectpicker('refresh');
            });

            // Load cities when province changes
            $('#provinsi').on('change', function() {
                let provId = $(this).val();
                if (provId) {
                    $.get('/get-cities/' + provId, function(data) {
                        let $kota = $('#kota');
                        $kota.prop('disabled', false);
                        $kota.empty();
                        $kota.append(
                            '<option value="" selected disabled>Pilih Kota</option>');
                        $.each(data, function(index, city) {
                            $kota.append('<option value="' + city.city_id + '">' + city
                                .city_name + '</option>');
                        });
                        $kota.selectpicker('refresh');
                        $('#kecamatan').prop('disabled', true).selectpicker('refresh');
                        $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                    });
                } else {
                    $('#kota').prop('disabled', true).selectpicker('refresh');
                }
            });

            // Load districts when city changes
            $('#kota').on('change', function() {
                let cityId = $(this).val();
                if (cityId) {
                    $.get('/get-districts/' + cityId, function(data) {
                        let $kecamatan = $('#kecamatan');
                        $kecamatan.prop('disabled', false);
                        $kecamatan.empty();
                        $kecamatan.append(
                            '<option value="" selected disabled>Pilih Kecamatan</option>');
                        $.each(data, function(index, district) {
                            $kecamatan.append('<option value="' + district.dis_id + '">' +
                                district.dis_name + '</option>');
                        });
                        $kecamatan.selectpicker('refresh');
                        $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                    });
                } else {
                    $('#kecamatan').prop('disabled', true).selectpicker('refresh');
                }
            });

            // Load subdistricts when district changes
            $('#kecamatan').on('change', function() {
                let disId = $(this).val();
                if (disId) {
                    $.get('/get-subdistricts/' + disId, function(data) {
                        let $kelurahan = $('#kelurahan');
                        $kelurahan.prop('disabled', false);
                        $kelurahan.empty();
                        $kelurahan.append(
                            '<option value="" selected disabled>Pilih Kelurahan</option>');
                        $.each(data, function(index, subdistrict) {
                            $kelurahan.append('<option value="' + subdistrict.subdis_id +
                                '">' + subdistrict.subdis_name + '</option>');
                        });
                        $kelurahan.selectpicker('refresh');
                    });
                } else {
                    $('#kelurahan').prop('disabled', true).selectpicker('refresh');
                }
            });

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

            $('#work-experience').on('submit', function() {
                if ($('.text-danger').length > 0) {
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    });
                    toast({
                        type: 'error',
                        title: $('.text-danger').first().text(),
                        padding: '2em',
                    });
                }
            });
        });
    </script>

</body>

</html>
