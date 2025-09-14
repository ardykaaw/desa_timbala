<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Admin - Sistem Informasi Desa Timbala</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url("https://rsms.me/inter/inter.css");
        :root {
            --primary-color: #2c5f2d;
            --secondary-color: #97bc62;
            --accent-color: #f9bc60;
        }
        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .navbar-brand h1 {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(151, 188, 98, 0.25);
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>
    <div class="row g-0 flex-fill">
        <div class="col-12 d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-5">
                <div class="card login-container">
                    <div class="card-body">
                        <div class="text-center mb-4 mt-3">
                            <div class="navbar-brand text-dark">
                                <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 60px; margin-bottom: 15px;">
                                <h1 class="m-0">DESA TIMBALA</h1>
                                <p class="text-muted mt-2">Sistem Informasi Desa</p>
                            </div>
                        </div>
                        <div class="px-2">
                            <div class="card-body">
                                <h2 class="h3 text-center mb-4">
                                    <i class="fas fa-user-shield text-primary me-2"></i>
                                    Login Admin
                                </h2>
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Masukan Email" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        @error('password')
                                            <small class="text-danger">Email atau Password salah</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukan Password" required>
                                    </div>
                                    <div class="form-footer mb-3">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                        </button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toast = document.getElementById("toast-simple");

            if (toast) {
                setTimeout(() => {
                    toast.classList.remove("show");
                    toast.classList.add("hide");
                }, 3000); // 5 detik
            }
        });
    </script>
</body>

</html>