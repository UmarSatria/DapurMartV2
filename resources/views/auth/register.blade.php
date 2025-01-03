@extends('layouts.app')
@section('content')
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Login Page</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    </head>

    <body class="bg-light">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row w-100">
                <div class="col-md-6 bg-white p-4 shadow rounded">
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/dapur.png') }}" alt="" width="10%">
                    </div>
                    <h1 class="text-center mb-3">Welcome back!</h1>
                    <p class="text-center text-muted mb-4">Enter to get unlimited access to data & information.</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Alert for Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Terjadi kesalahan pada input Anda:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Fullname Input -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input id="fullname" type="text"
                                class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                value="{{ old('fullname') }}" required autocomplete="name" autofocus
                                placeholder="Masukkan nama lengkap Anda">
                            @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Masukkan alamat email Anda">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone Number Input -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon</label>
                            <div class="input-group">
                                <input id="phone_number" type="text" inputmode="numeric" pattern="[0-9]{8,12}"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" required
                                    placeholder="Masukkan nomor telepon Anda (8-12 digit)">
                                <span class="input-group-text">
                                    <i class="fas fa-check" id="checkPhoneNumber" style="color: green; display: none;"></i>
                                    <i class="fas fa-times" id="wrongPhoneNumber" style="color: red; display: none;"></i>
                                </span>
                            </div>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Masukkan password Anda">
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Confirmation Input -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Konfirmasi Password *</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Konfirmasi password Anda">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn" style="background: #81C408; font-weight: semi-bold">
                                Daftar
                            </button>
                        </div>

                        <!-- Login Link -->
                        @if (Route::has('login'))
                            <div class="text-center mt-3">
                                <span>Sudah punya akun?</span>
                                <a class="text-decoration-none" href="{{ route('login') }}"
                                    style="color: black; font-weight: bold">
                                    Masuk
                                </a>
                            </div>
                        @endif
                    </form>


                </div>

                <!-- Right Image Section -->
                <div class="col-md-6 d-none d-md-block bg-light p-0">
                    <img src="img/register.png" alt="" class="bg-cover" width="100%" height="100%">
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function() {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("fa-eye-slash");
            });


            const phoneNumberInput = document.getElementById('phone_number');
            const checkIcon = document.getElementById('checkPhoneNumber');
            const wrongIcon = document.getElementById('wrongPhoneNumber');

            phoneNumberInput.addEventListener('input', function() {
                const value = phoneNumberInput.value;

                if (value.length > 0 && (value.length < 8 || value.length > 12)) {
                    wrongIcon.style.display = 'inline'; // Show wrong icon if input is invalid
                    checkIcon.style.display = 'none'; // Hide check icon
                } else if (value.length >= 8 && value.length <= 12) {
                    checkIcon.style.display = 'inline'; // Show check icon if valid
                    wrongIcon.style.display = 'none'; // Hide wrong icon
                } else {
                    wrongIcon.style.display = 'inline'; // Always show wrong icon if typing starts but still invalid
                    checkIcon.style.display = 'none'; // Hide check icon for invalid input
                }
            });
        </script>
    </body>

    </html>
@endsection
