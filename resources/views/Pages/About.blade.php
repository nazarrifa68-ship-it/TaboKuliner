@extends('layout.main')

@section('title', 'Home - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/About.css')}}">
@endsection


@section('content')

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

@endsection
