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

                
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="login-right">
            <div class="circle-image">
                <img src="{{asset('image/login-image.png')}}" alt="Sumatera Culture">
            </div>
        </div>
    </div>
</body>
</html>