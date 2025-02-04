<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Desa Kalipait</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #ffffff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 650px;
        }

        .btn-login {
            background: #145DA0;
            color: white;
            transition: 0.3s;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #0E4B7F;
        }

        .forgot-password {
            font-size: 14px;
            color: #145DA0;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Bagian Login -->
        <div class="col-md-6">
            <h3 class="mb-4 fw-bold text-primary">Login</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Input NIK -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK" required>
                    </div>
                    @error('nik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Input Password dengan Show/Hide -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                        <span class="input-group-text" id="togglePassword">
                            <i class="bi bi-eye-slash"></i>
                        </span>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Lupa Password?</a>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="btn btn-login w-100 py-2">Login</button>
            </form>
        </div>

        <!-- Bagian Forgot Password -->
        <div class="col-md-6 text-center d-flex align-items-center justify-content-center">
            <div>
                <h4 class="text-primary fw-bold">Lupa Password?</h4>
                <p class="text-muted">Masukkan email atau NIK Anda untuk mengatur ulang password.</p>
                <a href="{{ route('password.request') }}" class="btn btn-outline-primary">Reset Password</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    });
</script>

</body>
</html>
