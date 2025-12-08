@extends('layout.main')

@section('title', 'Checkout - TaboKuliner')

@section('css')
<link rel="stylesheet" href="{{asset('css/checkout.css')}}">
@endsection

@section('content')
<div class="checkout-container">
    <div class="checkout-header">
        <a href="{{ route('cart.index') }}" class="back-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </a>
        <h1>Checkout</h1>
    </div>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('cart.processCheckout') }}" method="POST" class="checkout-form">
        @csrf
        
        <div class="checkout-content">
            <div class="checkout-main">
                <!-- Shipping Address -->
                <div class="section-card">
                    <h2>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Alamat Pengiriman
                    </h2>

                    @if($addresses->isEmpty())
                    <div class="no-address">
                        <p>Anda belum memiliki alamat pengiriman.</p>
                        <a href="{{ route('profile') }}" class="btn-add-address">Tambah Alamat</a>
                    </div>
                    @else
                    <div class="address-list">
                        @foreach($addresses as $address)
                        <label class="address-option {{ $address->is_default ? 'default' : '' }}">
                            <input type="radio" name="address_id" value="{{ $address->id }}" 
                                   {{ $address->is_default ? 'checked' : '' }} required>
                            <div class="address-content">
                                <div class="address-header">
                                    <strong>{{ $address->recipient_name }}</strong>
                                    @if($address->label)
                                    <span class="address-label">{{ $address->label }}</span>
                                    @endif
                                    @if($address->is_default)
                                    <span class="badge-default">Default</span>
                                    @endif
                                </div>
                                <p class="address-phone">{{ $address->phone }}</p>
                                <p class="address-detail">{{ $address->full_address_text }}</p>
                                @if($address->notes)
                                <p class="address-notes">Catatan: {{ $address->notes }}</p>
                                @endif
                            </div>
                        </label>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Order Items -->
                <div class="section-card">
                    <h2>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Item Pesanan ({{ count($cart) }})
                    </h2>

                    <div class="order-items-checkout">
                        @foreach($cart as $item)
                        <div class="checkout-item">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                            <div class="item-info">
                                <h4>{{ $item['name'] }}</h4>
                                <p>{{ $item['quantity'] }}x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                            <div class="item-total">
                                <strong>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</strong>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="section-card">
                    <h2>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        Metode Pembayaran
                    </h2>

                    <div class="payment-methods">
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="transfer" checked>
                            <div class="payment-content">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                    <line x1="2" y1="10" x2="22" y2="10"></line>
                                </svg>
                                <div>
                                    <strong>Transfer Bank</strong>
                                    <p>Transfer melalui BCA, BNI, Mandiri</p>
                                </div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="ewallet">
                            <div class="payment-content">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                    <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                </svg>
                                <div>
                                    <strong>E-Wallet</strong>
                                    <p>GoPay, OVO, Dana, ShopeePay</p>
                                </div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="cod">
                            <div class="payment-content">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                <div>
                                    <strong>Cash on Delivery (COD)</strong>
                                    <p>Bayar saat pesanan diterima</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Notes -->
                <div class="section-card">
                    <h2>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        Catatan (Opsional)
                    </h2>
                    <textarea name="notes" rows="4" placeholder="Tambahkan catatan untuk pesanan Anda...">{{ old('notes') }}</textarea>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="checkout-sidebar">
                <div class="summary-card">
                    <h2>Ringkasan Pesanan</h2>
                    
                    <div class="summary-row">
                        <span>Subtotal ({{ count($cart) }} item)</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Biaya Pengiriman</span>
                        <span>Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                    </div>

                    <div class="summary-row">
                        <span>Biaya Layanan</span>
                        <span>Rp {{ number_format($serviceFee, 0, ',', '.') }}</span>
                    </div>

                    <hr>

                    <div class="summary-row total-row">
                        <span>Total Pembayaran</span>
                        <span class="total-amount">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <button type="submit" class="btn-place-order">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Buat Pesanan
                    </button>

                    <div class="secure-payment">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        Pembayaran Aman & Terpercaya
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{asset('js/checkout.js')}}"></script>
@endsection