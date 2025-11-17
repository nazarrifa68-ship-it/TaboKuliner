<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tabo Kuliner</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/Home.css')}}" />
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
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/Menu" >Menu</a></li>
            <li><a href="/About">About Tabo</a></li>
            <li><a href="/Contact">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a style="text-decoration: none" href="/Login" class="btn login">Login</a>
            <a style="text-decoration: none" href="/Register" class="btn register">Register</a>
        </div>
    </nav>
  <!-- HERO SECTION -->
  <section class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1>RASAKAN CITA RASA AUTENTIK<br>SUMATERA UTARA</h1>
      <p>Temukan cita rasa autentik dari jantung Sumatera Utara sebuah perjalanan kuliner yang merayakan tradisi, rempah, dan warisan budaya.</p>
    </div>
  </section>

  <section class="feature-section">
  <div class="feature-card">
    <img src="Icons/Rempahpilihan.svg" alt="Rempah Pilihan">
    <h3>REMPAH PILIHAN</h3>
  </div>

  <div class="feature-card">
    <img src="Icons/Resepleluhur.svg" alt="Resep Leluhur">
    <h3>RESEP LELUHUR</h3>
  </div>

  <div class="feature-card">
    <img src="Icons/Bahanberkualitas.svg" alt="Bahan Berkualitas">
    <h3>BAHAN BERKUALITAS</h3>
  </div>
</section>

<!-- menu andalan kami -->
<div class="container">
        <h1>MENU ANDALAN KAMI</h1>
        
        <p class="subtitle">
            Dari ribuan kekayaan rasa, berikut adalah hidangan-hidangan yang paling dicari dan wajib Anda coba untuk merasakan esensi kuliner Sumatera Utara.
        </p>

        <div class="menu-grid">
            <div class="menu-item">
                <img src="image/img_menu/Soto_medan.png" alt="Menu 1">
            </div>
            <div class="menu-item">
                <img src="image/img_menu/Saksang.jpg" alt="Menu 2">
            </div>
            <div class="menu-item">
                <img src="image/img_menu/Arsik_Ikan_Mas.png" alt="Menu 3">
            </div>
            <div class="menu-item">
                <img src="image/img_menu/Soto_Bebek_Medan.png" alt="Menu 4">
            </div>
            <div class="menu-item">
                <img src="image/img_menu/Naniura.png" alt="Menu 5">
            </div>
           <div class="menu-item">
                <img src="image/img_menu/Bika_Ambon.png" alt="Menu 6">
            </div>
        </div>

        <p class="description">
          Jangan hanya melihat gambarnya. Tutup mata Anda dan bayangkan aroma andaliman yang pedas menggigit, kuah Saksang yang kental dan kaya bumbu, atau segarnya Naniura yang melumer di lidah
        </p>

        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=1200&h=500&fit=crop" alt="Dining Experience">
        </div>
    </div>
{{-- footer  --}}
<footer class="tabo-footer">
    <div class="footer-container">

        <div class="footer-col">
            <div class="logo-wrapper">
                <img src="{{asset('image/SURALOGOPUTIH.png')}}" alt="Logo Tabo Kuliner" class="logo-image">
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
  <script>
    const toggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');
    toggle.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });
  </script>
</html>

