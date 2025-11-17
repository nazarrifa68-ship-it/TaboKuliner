<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Tabo Kuliner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Menu.css')}}">
    <style>
        
    </style>
</head>
<body>
    <div class="leaf-left">🌿</div>
  <div class="leaf-right">🌿</div>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="image/LOGO.png" alt="Logo Tabo Kuliner">
            <span>Tabo Kuliner</span>
        </div>

        <div class="menu-toggle" id="menu-toggle">&#9776;</div>

        <ul class="nav-links" id="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="#" class="active">Menu</a></li>
            <li><a href="/About">About Tabo</a></li>
            <li><a href="/Contact">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a style="text-decoration: none" href="/Login" class="btn login">Login</a>
            <a style="text-decoration: none" href="/Register" class="btn register">Register</a>
        </div>
    </nav>

    <!-- Special Menu Section -->
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

    <script>
        // Mobile menu toggle
        const toggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');
        toggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Pagination dots interactivity
        document.querySelectorAll('.pagination').forEach(pagination => {
            const dots = pagination.querySelectorAll('.dot');
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    dots.forEach(d => d.classList.remove('active'));
                    dot.classList.add('active');
                });
            });
        });

        // Button click feedback
        document.querySelectorAll('.add-btn, .order-btn, .price-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    </script>
</body>
</html>