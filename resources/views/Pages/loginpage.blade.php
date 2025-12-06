<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tabo Kuliner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Login.css')}}">
    <style>
        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .alert-danger {
            background-color: #fee;
            border: 1px solid #fcc;
            color: #c33;
        }

        .alert-success {
            background-color: #efe;
            border: 1px solid #cfc;
            color: #3c3;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Login Form -->
        <div class="login-left">
            <div class="login-box">
                <h1>Selamat Datang</h1>
                <p class="welcome-text">
                    Jika kamu belum pernah membuat akun, maka kamu bisa melakukannya dengan cara 
                    <a href="{{ route('registerpage') }}" class="register-link">Klik Disini</a>
                </p>

                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Username Input -->
                    <div class="input-group">
                        <div class="input-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <input type="text" 
                               name="username" 
                               placeholder="Username atau Email" 
                               value="{{ old('username') }}" 
                               required>
                    </div>

                    <!-- Password Input -->
                    <div class="input-group">
                        <div class="input-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div style="margin-bottom: 20px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" name="remember" style="width: auto;">
                            <span style="font-size: 0.9rem; color: #666;">Ingat Saya</span>
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn-login">Masuk</button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>Login dengan cara lain</span>
                </div>

                <!-- Social Login Buttons -->
                <div class="social-login">
                    <button class="btn-social btn-google" type="button">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                        <span>Masuk dengan <strong>google</strong></span>
                    </button>

                    <button class="btn-social btn-facebook" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#1877F2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span>Masuk dengan <strong>Facebook</strong></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="login-right">
            <div class="circle-image">
                <img src="{{asset('image/login-image.jpg')}}" alt="Sumatera Culture">
            </div>
        </div>
    </div>
</body>
</html>