@extends('layout.main')

@section('title', 'Menu - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/Menu.css')}}">
@endsection

@section('content')

<!-- Special Menu Section -->
<section class="special-menu">
    <div class="container">
        <h2>SPECIAL MENU</h2>
        <p class="subtitle">Dari ribuan kekayaan rasa, berikut adalah hidangan-hidangan yang paling dicari dan wajib Anda coba</p>
        
        @if($specialMenus->isEmpty())
        <div class="empty-menu">
            <p>Belum ada menu spesial tersedia saat ini.</p>
        </div>
        @else
        <div class="menu-grid">
            @foreach($specialMenus as $menu)
            <div class="menu-card regular-card" data-menu-id="{{ $menu->id }}">
                <div class="menu-image">
                    <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" 
                         onerror="this.src='{{ asset('image/img_menu/default.png') }}'">
                </div>
                <h3>{{ $menu->name }}</h3>
                <p class="calories">{{ $menu->calories }} Kcal</p>
                <div class="regular-footer">
                    <button class="price-btn" data-price="{{ $menu->price }}">
                        Rp {{ number_format($menu->price, 0, ',', '.') }}
                    </button>
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
            @endforeach
        </div>
        @endif

        @if($specialMenus->count() > 6)
        <div class="pagination">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        @endif
    </div>
</section>

<!-- Regular Food Section -->
<section class="regular-food">
    <div class="container">
        <h2>OUR REGULAR FOOD</h2>
        <p class="subtitle">Hidangan reguler kami yang selalu tersedia setiap hari dengan cita rasa yang konsisten</p>
        
        @if($regularMenus->isEmpty())
        <div class="empty-menu">
            <p>Belum ada menu reguler tersedia saat ini.</p>
        </div>
        @else
        <div class="menu-grid">
            @foreach($regularMenus as $menu)
            <div class="menu-card regular-card" data-menu-id="{{ $menu->id }}">
                <div class="menu-image">
                    <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}"
                         onerror="this.src='{{ asset('image/img_menu/default.png') }}'">
                </div>
                <h3>{{ $menu->name }}</h3>
                <p class="calories">{{ $menu->calories }} Kcal</p>
                <div class="regular-footer">
                    <button class="price-btn" data-price="{{ $menu->price }}">
                        Rp {{ number_format($menu->price, 0, ',', '.') }}
                    </button>
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
            @endforeach
        </div>
        @endif

        @if($regularMenus->count() > 6)
        <div class="pagination">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        @endif
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
                    <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?w=400&h=400&fit=crop" alt="Chef Batak">
                </div>
                <h3>Chef Batak</h3>
                <p class="chef-specialty">Masakan Batak Traditional</p>
            </div>

            <div class="chef-card">
                <div class="chef-image">
                    <img src="https://images.unsplash.com/photo-1581299894007-aaa50297cf16?w=400&h=400&fit=crop" alt="Chef Medan">
                </div>
                <h3>Chef Medan</h3>
                <p class="chef-specialty">Kuliner Medan Authentic</p>
            </div>

            <div class="chef-card">
                <div class="chef-image">
                    <img src="https://images.unsplash.com/photo-1583394293214-28ded15ee548?w=400&h=400&fit=crop" alt="Chef Nusantara">
                </div>
                <h3>Chef Nusantara</h3>
                <p class="chef-specialty">Indonesian Cuisine</p>
            </div>
        </div>
    </div>
</section>

<!-- Modal Detail Menu -->
<div id="menuModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-body">
            <div class="modal-image">
                <img id="modalImage" src="" alt="Menu Image">
            </div>
            <div class="modal-details">
                <h2 id="modalTitle">Nama Menu</h2>
                <p class="modal-calories"><strong>Kalori:</strong> <span id="modalCalories">0</span></p>
                <p class="modal-description" id="modalDescription">
                    Hidangan tradisional khas Sumatera Utara dengan cita rasa yang autentik dan bumbu rempah pilihan.
                </p>
                <div class="modal-price">
                    <h3 id="modalPrice">Rp 0</h3>
                </div>
                <div class="modal-quantity">
                    <label>Jumlah:</label>
                    <div class="quantity-control">
                        <button type="button" class="qty-btn" id="decreaseQty">-</button>
                        <input type="number" id="quantity" value="1" min="1" max="99" readonly>
                        <button type="button" class="qty-btn" id="increaseQty">+</button>
                    </div>
                </div>
                <div class="modal-total">
                    <h3>Total: <span id="modalTotal">Rp 0</span></h3>
                </div>
                <button class="add-to-cart-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{asset('js/menu.js')}}"></script>
@endsection