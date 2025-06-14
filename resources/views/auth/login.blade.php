<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}">
    <style>
        .form-form .form-form-wrap form .field-wrapper svg.feather-eye {
            top: 46px;
        }
    </style>
</head>

<body>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Masuk</h1>
                        <p class="">Silahkan masuk ke akun Anda untuk melanjutkan.</p>
                        <form method="POST" action="{{ route('post.login') }}" class="text-left">
                            @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Email</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="email" type="text" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="{{ route('lupa-password') }}" class="forgot-pass-link">Lupa Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" type="password" placeholder="Password" value="" class="form-control" name="password" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper mb-2">
                                        <button type="submit" class="btn btn-primary" value="">Masuk</button>
                                    </div>
                                </div>

                                <div class="division d-flex align-items-center">
                                    <div class="col-5 px-0">
                                        <hr>
                                    </div>
                                    <div class="col-2 text-center">
                                        <span>atau</span>
                                    </div>
                                    <div class="col-5 px-0">
                                        <hr>
                                    </div>
                                </div>

                                <div class="social">
                                    <a href="{{ route('google.login') }}" class="btn social-google">
                                        <img src="/assets/icons/icon-google.svg" class="img-fluid google-icon" alt="">
                                        <span class="brand-name">Masuk dengan Google</span>
                                    </a>
                                </div>
                                <div class="register-form text-center mt-3">
                                    <span>Belum punya Akun? <a href="{{ route('register') }}" style="font-weight: 900; color: #3b3f5c">Daftar Disini!</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/authentication/form-2.js') }}"></script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/notification/custom-snackbar.js') }}"></script>

    <script>
        // Trigger snackbar dari session error
        @if (session('error'))
            $(document).ready(function() {
                Snackbar.show({
                    text: '{{ session('error')['message'] }}',
                    pos: 'top-right', // Sesuai contoh templatemu
                    actionText: 'Tutup',
                    actionTextColor: '#fff',
                    backgroundColor: '#e74c3c', // Merah untuk error
                    duration: 5000
                });
            });
        @endif
        @if (session('register'))
            $(document).ready(function() {
                Snackbar.show({
                    text: '{{ session('register')['message'] }}',
                    pos: 'top-right',
                    actionText: 'Tutup',
                    actionTextColor: '#fff',
                    backgroundColor: '#9DC08B',
                    duration: 5000
                });
            });
        @endif
        @if (session('verif'))
            $(document).ready(function() {
                Snackbar.show({
                    text: '{{ session('verif')['message'] }}',
                    pos: 'top-right',
                    actionText: 'Tutup',
                    actionTextColor: '#fff',
                    backgroundColor: '#9DC08B',
                    duration: 5000
                });
            });
        @endif
        @if (session('reset'))
            $(document).ready(function() {
                Snackbar.show({
                    text: '{{ session('reset')['message'] }}',
                    pos: 'top-right',
                    actionText: 'Tutup',
                    actionTextColor: '#fff',
                    backgroundColor: '#9DC08B',
                    duration: 5000
                });
            });
        @endif
        @if (session('reset-success'))
            $(document).ready(function() {
                Snackbar.show({
                    text: '{{ session('reset-success')['message'] }}',
                    pos: 'top-right',
                    actionText: 'Tutup',
                    actionTextColor: '#fff',
                    backgroundColor: '#9DC08B',
                    duration: 5000
                });
            });
        @endif
    </script>
</body>

</html>
