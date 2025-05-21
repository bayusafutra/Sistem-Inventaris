@extends('layouts.main')
@section('css-custom')
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
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
                                <form id="work-experience" class="section work-experience">
                                    <div class="info">
                                        <h5 class="">Daftarkan Toko Anda Disini</h5>
                                        <small>Segera isi form dibawah ini agar admin memproses pendaftaran toko
                                            Anda!</small>
                                        <div class="row mt-5">
                                            <div class="col-md-11 mx-auto">
                                                <div class="work-section">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="degree2">Nama Toko</label>
                                                                <input type="text" class="form-control mb-4"
                                                                    id="degree2" placeholder="Nama Toko" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="degree3">Jenis Usaha</label>
                                                                        <select class="form-control  basic">
                                                                            <option disabled selected>Pilih Jenis Usaha...
                                                                            </option>
                                                                            <option value="Grosir Sembako">Grosir Sembako
                                                                            </option>
                                                                            <option value="Grosir Makanan & Jajan">Grosir
                                                                                Makanan & Jajan</option>
                                                                            <option value="Grosir Pakaian">Grosir Pakaian
                                                                            </option>
                                                                            <option value="Elektronik">Elektronik</option>
                                                                            <option value="Obat-obatan">Obat-obatan</option>
                                                                            <option value="Material (Bangunan)">Material
                                                                                (Bangunan)</option>
                                                                            <option value="Kosmetik">Kosmetik</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="degree4">Alamat</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                            id="degree4" placeholder="Alamat Toko"
                                                                            value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Provinsi</label>
                                                                    <select class="selectpicker form-control mb-4" data-live-search="true">
                                                                        <option selected disabled>Pilih Provinsi
                                                                        </option>
                                                                        <option>Jawa Timur</option>
                                                                        <option>Jawa Barat</option>
                                                                        <option>Papua
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Kota atau Kabupaten</label>
                                                                    <select class="selectpicker form-control mb-4" data-live-search="true">
                                                                        <option selected disabled>Pilih
                                                                            Kota/Kabupaten</option>
                                                                        <option>Jawa Timur</option>
                                                                        <option>Jawa Barat</option>
                                                                        <option>Papua
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Kecamatan</label>
                                                                    <select class="selectpicker form-control mb-4" data-live-search="true">
                                                                        <option selected disabled>Pilih
                                                                            Kecamatan</option>
                                                                        <option>Jawa Timur</option>
                                                                        <option>Jawa Barat</option>
                                                                        <option>Papua
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Kelurahan</label>
                                                                    <select class="selectpicker form-control mb-4" data-live-search="true">
                                                                        <option selected disabled>Pilih
                                                                            Kelurahan</option>
                                                                        <option>Jawa Timur</option>
                                                                        <option>Jawa Barat</option>
                                                                        <option>Papua
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="">Deskripsi Toko</label>
                                                            <textarea class="form-control" placeholder="Jelaskkan secara singkat deskripsi toko Anda" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-lg btn-primary submit-profile">Simpan</button>
                                                        </div>
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
                @include('layouts.partials.footer')
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/dropify/dropify.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="assets/js/users/account-settings.js"></script>
    <script src="assets/js/profile/custom.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
@endsection
