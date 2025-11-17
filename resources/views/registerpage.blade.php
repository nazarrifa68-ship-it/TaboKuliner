<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tabo Kuliner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Register.css')}}">
</head>
<body>
    <div class="register-container">
        <!-- Left Side - Register Form -->
        <div class="register-left">
            <div class="register-box">
                <h1>Membuat Akun</h1>
                <p class="welcome-text">
                    Jika kamu sudah pernah membuat akun, maka kamu bisa melakukannya dengan cara 
                    <a href="/login" class="login-link">Klik Disini</a>
                </p>

                <form class="register-form" action="/register" method="POST">
                    <!-- Name Input -->
                    <div class="input-group">
                        <div class="input-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <input type="text" name="name" placeholder="Masukkan Nama" required>
                    </div>

                    <!-- Email Input -->
                    <div class="input-group">
                        <div class="input-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <input type="email" name="email" placeholder="Masukkan Email" required>
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

                    <!-- Register Button -->
                    <button type="submit" class="btn-register">MASUK</button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>Login dengan cara lain</span>
                </div>

                <!-- Social Login Buttons -->
                <div class="social-login">
                    <button class="btn-social btn-google">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
                        <span>Masuk dengan <strong>google</strong></span>
                    </button>

                    <button class="btn-social btn-facebook">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#1877F2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span>Masuk dengan <strong>Facebook</strong></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="register-right">
            <div class="circle-image">
                <img src="{{asset('image/register-image.jpg')}}" alt="Sumatera Culture">
            </div>
        </div>
    </div>
</body>
</html>