@extends('layout.main')

@section('title', 'Home - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/Home.css')}}">
@endsection


@section('content')
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
    <img src="{{asset('Icons/Rempahpilihan.svg')}}" alt= "Rempah Pilihan">
    <h3>REMPAH PILIHAN</h3>
  </div>

  <div class="feature-card">
    <img src="{{asset('Icons/Resepleluhur.svg')}} "alt="Resep Leluhur">
    <h3>RESEP LELUHUR</h3>
  </div>

  <div class="feature-card">
    <img src="{{asset('Icons/Bahanberkualitas.svg')}}" alt="Bahan Berkualitas">
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
                <img src="{{asset('image/img_menu/Soto_medan.png')}}" alt="Menu 1">
            </div>
            <div class="menu-item">
                <img src="{{asset('image/img_menu/Saksang.jpg')}}" alt="Menu 2">
            </div>
            <div class="menu-item">
                <img src="{{asset('image/img_menu/Arsik_Ikan_Mas.png')}}" alt="Menu 3">
            </div>
            <div class="menu-item">
                <img src="{{asset('image/img_menu/Soto_Bebek_Medan.png')}}" alt="Menu 4">
            </div>
            <div class="menu-item">
                <img src="{{asset('image/img_menu/Naniura.png')}}" alt="Menu 5">
            </div>
           <div class="menu-item">
                <img src="{{asset('image/img_menu/Bika_Ambon.png')}}" alt="Menu 6">
            </div>
        </div>

        <p class="description">
          Jangan hanya melihat gambarnya. Tutup mata Anda dan bayangkan aroma andaliman yang pedas menggigit, kuah Saksang yang kental dan kaya bumbu, atau segarnya Naniura yang melumer di lidah
        </p>

        <div class="hero-image">
             <img src="{{asset('image/img_menu/ketring.png')}}" alt="Dining Experience">
        </div>
    </div>

@endsection
