@extends('layout.main')

@section('title', 'Keranjang Belanja - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection

@section('content')
<div class="cart-container">
    <div class="cart-header">
        <h1>Keranjang Belanja</h1>
        <p class="subtitle">Review pesanan Anda sebelum melanjutkan ke pembayaran</p>
    </div>

    @if(empty($cart))
    <div class="empty-cart">
        <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <h2>Keranjang Anda Kosong</h2>
        <p>Belum ada item di keranjang. Yuk, mulai belanja sekarang!</p>
        <a href="{{ route('Menu') }}" class="btn-shop">Lihat Menu</a>
    </div>
    @else
    <div class="cart-content">
        <div class="cart-items">
            <div class="cart-items-header">
                <h2>Item Pesanan ({{ count($cart) }})</h2>
                <button class="clear-cart-btn" onclick="clearCart()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    Kosongkan Keranjang
                </button>
            </div>

            @foreach($cart as $id => $item)
            <div class="cart-item" data-id="{{ $id }}">
                <div class="item-image">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                </div>
                <div class="item-details">
                    <h3>{{ $item['name'] }}</h3>
                    <p class="item-calories">{{ $item['calories'] }}</p>
                    <p class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                </div>
                <div class="item-quantity">
                    <button class="qty-btn" onclick="updateQuantity('{{ $id }}', -1)">-</button>
                    <input type="number" value="{{ $item['quantity'] }}" min="1" max="99" 
                           class="quantity-input" data-id="{{ $id }}" readonly>
                    <button class="qty-btn" onclick="updateQuantity('{{ $id }}', 1)">+</button>
                </div>
                <div class="item-total">
                    <p class="total-price" data-id="{{ $id }}">
                        Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                    </p>
                </div>
                <button class="remove-btn" onclick="removeItem('{{ $id }}')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            @endforeach
        </div>

        <div class="cart-summary">
            <div class="summary-card">
                <h2>Ringkasan Belanja</h2>
                
                <div class="summary-row">
                    <span>Subtotal ({{ count($cart) }} item)</span>
                    <span class="subtotal">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                
                <div class="summary-row">
                    <span>Biaya Pengiriman</span>
                    <span class="shipping">Rp 10.000</span>
                </div>

                <div class="summary-row">
                    <span>Biaya Layanan</span>
                    <span class="service">Rp 2.000</span>
                </div>

                <hr>

                <div class="summary-row total-row">
                    <span>Total Pembayaran</span>
                    <span class="total-amount">Rp {{ number_format($total + 10000 + 2000, 0, ',', '.') }}</span>
                </div>

                <div class="promo-code">
                    <input type="text" placeholder="Masukkan kode promo" id="promoCode">
                    <button class="apply-promo">Gunakan</button>
                </div>

                <button class="checkout-btn" onclick="window.location.href='{{ route('cart.checkout') }}'">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    Lanjut ke Pembayaran
                </button>

                <a href="{{ route('Menu') }}" class="continue-shopping">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Lanjut Belanja
                </a>

                <div class="payment-methods">
                    <p>Metode Pembayaran:</p>
                    <div class="payment-icons">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" alt="Amex">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('js')
<script src="{{asset('js/cart.js')}}"></script>
@endsection