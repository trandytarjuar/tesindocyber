<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                            </div>

                            <form action="{{ route('store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label"> Nama</label>
                                    <!-- <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required> -->
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label"> Alamat</label>
                                    <!-- <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required> -->
                                    <input id="alamat" type="text" class="form-control @error('name') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
                                    @error('alamat')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>

                                    @error('email')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nohp" class="form-label">No Telp</label>
                                    <input type="number" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}" required>

                                    @error('nohp')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password" name="password" class="form-control" required>

                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- <div class="invalid-feedback">
                                        Password minimal 6 karakter dan harus mengandung setidaknya satu karakter huruf besar, satu karakter huruf kecil, satu karakter digit, dan satu karakter non-alphanumeric
                                    </div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>

                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <!-- <div class="invalid-feedback">
                                        Konfirmasi password tidak sesuai
                                    </div> -->
                                </div>



                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary" type="submit"> Sign Up </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="{{ url('/admin/login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2018 - 2021 © Hyper - Coderthemes.com
    </footer>

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <!-- <script>
        (function() {
            'use strict';
            var form = document.getElementById('registration-form');
            var emailInput = document.getElementById('email');
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('password_confirmation');
            var nohpInput = document.getElementById('nohp');

            // Validasi email
            emailInput.addEventListener('input', function(event) {
                if (emailInput.validity.valid) {
                    emailInput.setCustomValidity('');
                } else {
                    emailInput.setCustomValidity('Email harus valid dan maksimal 50 karakter');
                }
            });

            // Validasi password
            passwordInput.addEventListener('input', function(event) {
                var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).*$/;
                if (passwordInput.validity.valid && passwordPattern.test(passwordInput.value)) {
                    passwordInput.setCustomValidity('');
                } else {
                    passwordInput.setCustomValidity('Password minimal 6 karakter dan harus mengandung setidaknya satu karakter huruf besar, satu karakter huruf kecil, satu karakter digit, dan satu karakter non-alphanumeric');
                }
            });
            // Validasi nomor HP
            nohpInput.addEventListener('input', function(event) {
                if (nohpInput.validity.valid) {
                    nohpInput.setCustomValidity('');
                } else {
                    nohpInput.setCustomValidity('Nomor HP harus berupa angka');
                }
            });

            // Submit form
            form.addEventListener('submit', function(event) {
                // Cek validitas form
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        })();
    </script> -->

</body>

</html>