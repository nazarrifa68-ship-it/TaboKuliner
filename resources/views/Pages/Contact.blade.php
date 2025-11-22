@extends('layout.main')

@section('title', 'Home - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/Contact.css')}}">
@endsection


@section('content')
<!-- Hero Section - Hubungi Kami -->
<section class="contact-hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>HUBUNGI KAMI</h1>
        <p>Kami dengan senang hati menerima setiap pertanyaan, saran, maupun kerja sama dari Anda! Apakah Anda ingin
            mengetahui lebih banyak tentang kuliner khas Sumatera Utara, melakukan pemesanan, atau berkolaborasi dengan
            kami?</p>
    </div>
</section>

<!-- Contact Information Section -->
<section class="contact-info-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Map Card -->
            <div class="map-card">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2644516890595!2d106.82876731476908!3d-6.225536895502087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e4471e40e9%3A0x9f0e5c3d0e8c3e9f!2sJl.%20Perbanas%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

            <!-- Contact Details Card -->
            <div class="contact-details">
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                    </div>
                    <div class="contact-text">
                        <h3>0813-1716-9044</h3>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="contact-text">
                        <h3>tabokuliner@gmail.com</h3>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="contact-text">
                        <h3>Jl. Perbanas, RT.6/RW.7, Kuningan, Karet Kuningan, Kecamatan Setiabudi, Kota Jakarta
                            Selatan, Daerah Khusus Ibukota Jakarta 12940</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
