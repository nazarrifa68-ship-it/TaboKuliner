@extends('layout.main')

@section('title', 'Menu - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/Menu.css')}}">
@endsection

@section('content')

<section class="special-menu">
        <div class="container">
            <h2>SPECIAL MENU</h2>
            <p class="subtitle">Dari ribuan kekayaan rasa, berikut adalah hidangan-hidangan yang paling dicari dan wajib Anda coba</p>
            
            <div class="menu-grid">
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="image/img_menu/Soto_medan.png" alt="Soto Medan">
                    </div>
                    <h3>Soto Medan</h3>
                    <div class="menu-footer">
                        <span class="price">Rp 25.000</span>
                        <button class="add-btn">+</button>
                    </div>
                </div>

                <div class="menu-card">
                    <div class="menu-image">
                        <img src="image/img_menu/Saksang.jpg" alt="Saksang">
                    </div>
                    <h3>Saksang</h3>
                    <div class="menu-footer">
                        <span class="price">Rp 35.000</span>
                        <button class="add-btn">+</button>
                    </div>
                </div>

                <div class="menu-card">
                    <div class="menu-image">
                        <img src="image/img_menu/Arsik_Ikan_Mas.png" alt="Arsik Ikan Mas">
                    </div>
                    <h3>Arsik Ikan Mas</h3>
                    <div class="menu-footer">
                        <span class="price">Rp 45.000</span>
                        <button class="add-btn">+</button>
                    </div>
                </div>

                <div class="menu-card">
                    <div class="menu-image">
                        <img src="image/img_menu/Soto_Bebek_Medan.png" alt="Soto Bebek Medan">
                    </div>
                    <h3>Soto Bebek Medan</h3>
                    <div class="menu-footer">
                        <span class="price">Rp 30.000</span>
                        <button class="add-btn">+</button>
                    </div>
                </div>

                <div class="menu-card">
                    <div class="menu-image">
                        <img src="image/img_menu/Naniura.png" alt="Naniura">
                    </div>
                    <h3>Naniura</h3>
                    <div class="menu-footer">
                        <span class="price">Rp 40.000</span>
                        <button class="add-btn">+</button>
                    </div>
                </div>

                <div class="menu-card">
                    <div class="menu-image">
                        <img src="image/img_menu/Bika_Ambon.png" alt="Bika Ambon">
                    </div>
                    <h3>Bika Ambon</h3>
                    <div class="menu-footer">
                        <span class="price">Rp 20.000</span>
                        <button class="add-btn">+</button>
                    </div>
                </div>
            </div>

            <div class="pagination">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <!-- Regular Food Section -->
    <section class="regular-food">
        <div class="container">
            <h2>OUR REGULAR FOOD</h2>
            <p class="subtitle">Hidangan reguler kami yang selalu tersedia setiap hari dengan cita rasa yang konsisten</p>
            
            <div class="menu-grid">
                <div class="menu-card regular-card">
                    <div class="menu-image">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400&h=400&fit=crop" alt="Salads">
                    </div>
                    <h3>Salads</h3>
                    <p class="calories">150 Kcal</p>
                    <div class="regular-footer">
                        <button class="price-btn">Rp 15.000</button>
                        <button class="order-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Order
                        </button>
                    </div>
                </div>

                <div class="menu-card regular-card">
                    <div class="menu-image">
                        <img src="https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=400&h=400&fit=crop" alt="Chicken Masala">
                    </div>
                    <h3>Chicken Masala</h3>
                    <p class="calories">280 Kcal</p>
                    <div class="regular-footer">
                        <button class="price-btn">Rp 28.000</button>
                        <button class="order-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Order
                        </button>
                    </div>
                </div>

                <div class="menu-card regular-card">
                    <div class="menu-image">
                        <img src="https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?w=400&h=400&fit=crop" alt="Mutton Kheema">
                    </div>
                    <h3>Mutton Kheema</h3>
                    <p class="calories">320 Kcal</p>
                    <div class="regular-footer">
                        <button class="price-btn">Rp 38.000</button>
                        <button class="order-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Order
                        </button>
                    </div>
                </div>

                <div class="menu-card regular-card">
                    <div class="menu-image">
                        <img src="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=400&h=400&fit=crop" alt="Beef Pasta">
                    </div>
                    <h3>Beef Pasta</h3>
                    <p class="calories">250 Kcal</p>
                    <div class="regular-footer">
                        <button class="price-btn">Rp 32.000</button>
                        <button class="order-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Order
                        </button>
                    </div>
                </div>

                <div class="menu-card regular-card">
                    <div class="menu-image">
                        <img src="https://images.unsplash.com/photo-1626645738196-c2a7c87a8f58?w=400&h=400&fit=crop" alt="Chicken Fry">
                    </div>
                    <h3>Chicken Fry</h3>
                    <p class="calories">290 Kcal</p>
                    <div class="regular-footer">
                        <button class="price-btn">Rp 30.000</button>
                        <button class="order-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Order
                        </button>
                    </div>
                </div>

                <div class="menu-card regular-card">
                    <div class="menu-image">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400&h=400&fit=crop" alt="Special Dessert">
                    </div>
                    <h3>Special Dessert</h3>
                    <p class="calories">180 Kcal</p>
                    <div class="regular-footer">
                        <button class="price-btn">Rp 18.000</button>
                        <button class="order-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Order
                        </button>
                    </div>
                </div>
            </div>

            <div class="pagination">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <!-- Chef Section -->
    <section class="chef-section">
        <div class="container">
            <h2>OUR SPECIAL CHEF's</h2>
            <p class="subtitle">Para chef berpengalaman kami yang ahli dalam masakan tradisional Sumatera Utara</p>
            
            <div class="chef-grid">
                <div class="chef-card">
                    <div class="chef-image">
                        <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?w=400&h=400&fit=crop" alt="Chef Marco">
                    </div>
                    <h3>Chef Marco</h3>
                    <p class="chef-specialty">Italian Cuisine</p>
                </div>

                <div class="chef-card">
                    <div class="chef-image">
                        <img src="https://images.unsplash.com/photo-1581299894007-aaa50297cf16?w=400&h=400&fit=crop" alt="Chef Sarah">
                    </div>
                    <h3>Chef Sarah</h3>
                    <p class="chef-specialty">Asian Fusion</p>
                </div>

                <div class="chef-card">
                    <div class="chef-image">
                        <img src="https://images.unsplash.com/photo-1583394293214-28ded15ee548?w=400&h=400&fit=crop" alt="Chef Antonio">
                    </div>
                    <h3>Chef Antonio</h3>
                    <p class="chef-specialty">Mediterranean</p>
                </div>
            </div>
        </div>
    </section>

@endsection

