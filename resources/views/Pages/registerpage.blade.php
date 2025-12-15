<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tabo Kuliner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Register.css')}}">
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
    <div class="register-container">
        <!-- Left Side - Register Form -->
        <div class="register-left">
            <div class="register-box">
                <h1>Membuat Akun</h1>
                <p class="welcome-text">
                    Jika kamu sudah pernah membuat akun, maka kamu bisa melakukannya dengan cara 
                    <a href="{{ route('loginpage') }}" class="login-link">Klik Disini</a>
                </p>

                <form class="register-form" action="{{ route('register') }}" method="POST">
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

                    <!-- Name Input -->
                    <div class="input-group">
                        <div class="input-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <input type="text" 
                               name="name" 
                               placeholder="Masukkan Nama Lengkap" 
                               value="{{ old('name') }}" 
                               required>
                    </div>

                    <!-- Email Input -->
                    <div class="input-group">
                        <div class="input-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <input type="email" 
                               name="email" 
                               placeholder="Masukkan Email" 
                               value="{{ old('email') }}" 
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
                        <input type="password" 
                               name="password" 
                               placeholder="Password (Minimal 8 karakter)" 
                               required>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="btn-register">DAFTAR</button>
                </form>

               
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="register-right">
            <div class="circle-image">
                <img src="{{asset('image/login-image.png')}}" alt="Sumatera Culture">
            </div>
        </div>
    </div>
</body>
</html>