<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Tabo Kuliner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/About.css')}}">
    <style>
        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="image/LOGO.png" alt="Logo Tabo Kuliner">
            <span>Tabo Kuliner</span>
        </div>

        <div class="menu-toggle" id="menu-toggle">&#9776;</div>

        <ul class="nav-links" id="nav-links">
            <li><a href="/" >Home</a></li>
            <li><a href="/Menu" >Menu</a></li>
            <li><a href="#">About Tabo</a></li>
            <li><a href="/Contact">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a style="text-decoration: none" href="/Login" class="btn login">Login</a>
            <a style="text-decoration: none" href="/Register" class="btn register">Register</a>
        </div>
    </nav>

    <!-- Hero Section - TUJUAN -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>TUJUAN</h1>
            <p>E-commerce ini Tidak Hanya Sebuah Platform transaksi, tetapi juga sebuah ruang untuk bercerita. Kami ingin memperkenalkan dunia pada kekayaan kuliner Batak yang mungkin belum banyak dikenal. Dengan menyajikan setiap hidangan melalui artikel yang mendalam dan video yang menarik, kami mengajak Anda untuk merasakan pengalaman autentik dari setiap suapan makanan, sambil mempelajari sejarah dan makna di balik setiap resep. Kami percaya bahwa makanan adalah bahasa universal yang dapat menghubungkan orang-orang dari berbagai latar belakang, dan kami ingin menjadi jembatan yang menghubungkan Anda dengan budaya Batak melalui setiap hidangan yang kami sajikan.</p>
        </div>
    </section>

    <!-- Content Grid - VISI & MISI -->
    <section class="content-section">
        <!-- VISI Card -->
        <div class="content-card visi-card">
            <div class="content-overlay"></div>
            <div class="content-info">
                <h2>VISI</h2>
                <p>Menjadi platform E-Commerce terdepan yang menghubungkan masyarakat dengan kekayaan kuliner tradisional Sumatera Utara, khususnya kuliner Batak, dengan mempromosikan warisan budaya melalui pengalaman kuliner yang autentik dan bermakna.</p>
            </div>
        </div>

        <!-- MISI Card -->
        <div class="content-card misi-card">
            <div class="content-overlay"></div>
            <div class="content-info">
                <h2>MISI</h2>
                <p>• Menyajikan kuliner Batak yang otentik dengan bahan-bahan pilihan dan resep tradisional.</p>
                <p>• Memperkenalkan budaya kuliner Sumatera Utara kepada dunia melalui cerita dan konten edukatif.</p>
                <p>• Membangun komunitas pecinta kuliner yang menghargai kearifan lokal dan tradisi.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="tabo-footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="logo-wrapper">
                    <img src="image/SURALOGOPUTIH.png" alt="Logo Tabo Kuliner" class="logo-image">
                    <h3 class="footer-title">Tabo Kuliner</h3>
                </div>
                <p>Sajikan kehangatan rempah dan kekayaan tradisi Sumatera Utara di meja makan Anda</p>
            </div>

            <div class="footer-col">
                <h3 class="footer-title">Hubungi Kami</h3>
                <p>Email: Tabokuliner@gmail.com</p>
                <p>No Telp : +6287802466375</p>
            </div>

            <div class="footer-col">
                <h3 class="footer-title">Alamat</h3>
                <p>Jl. Perbanas, RT.6/RW.7, Kuningan, Karet Kuningan, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12940</p>
            </div>
        </div>
    </footer>
</body>
</html>