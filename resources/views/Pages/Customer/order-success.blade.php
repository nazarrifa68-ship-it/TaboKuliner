@extends('layout.main')

@section('title', 'Pesanan Berhasil - TaboKuliner')

@section('css')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
    }

    .success-container {
        max-width: 800px;
        margin: 40px auto;
    }

    /* Success Card */
    .success-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        animation: slideDown 0.5s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .success-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        animation: scaleUp 0.5s ease 0.2s backwards;
    }

    @keyframes scaleUp {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }

    .success-icon svg {
        width: 50px;
        height: 50px;
        stroke: white;
        stroke-width: 3;
    }

    .success-card h1 {
        color: #1a202c;
        font-size: 28px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .success-card p {
        color: #718096;
        font-size: 16px;
        margin-bottom: 30px;
    }

    .order-number {
        background: #f7fafc;
        padding: 15px 25px;
        border-radius: 10px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .order-number strong {
        color: #667eea;
        font-size: 18px;
        font-weight: 700;
    }

    /* Order Details */
    .order-details {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .order-details h2 {
        color: #1a202c;
        font-size: 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .order-details h2 svg {
        stroke: #667eea;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-row span:first-child {
        color: #718096;
    }

    .detail-row span:last-child {
        color: #1a202c;
        font-weight: 600;
    }

    .total-row {
        background: #f7fafc;
        padding: 15px;
        border-radius: 10px;
        margin-top: 15px;
        font-size: 18px;
    }

    .total-row span:last-child {
        color: #667eea;
        font-size: 22px;
    }

    /* Order Items */
    .order-items {
        margin-top: 20px;
    }

    .item-card {
        display: flex;
        gap: 15px;
        padding: 15px;
        background: #f7fafc;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .item-card img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
    }

    .item-info {
        flex: 1;
    }

    .item-info h4 {
        color: #1a202c;
        font-size: 16px;
        margin-bottom: 5px;
    }

    .item-info p {
        color: #718096;
        font-size: 14px;
    }

    .item-price {
        text-align: right;
        color: #667eea;
        font-weight: 700;
        font-size: 16px;
    }

    /* Review Section */
    .review-section {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        animation: slideUp 0.5s ease 0.4s backwards;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .review-section h2 {
        color: #1a202c;
        font-size: 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .review-section h2 svg {
        stroke: #667eea;
    }

    .rating-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 25px;
    }

    .rating-option {
        position: relative;
    }

    .rating-option input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .rating-option label {
        display: block;
        padding: 15px;
        background: #f7fafc;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s;
        font-weight: 600;
        color: #4a5568;
    }

    .rating-option input[type="radio"]:checked + label {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .rating-option label:hover {
        border-color: #667eea;
        transform: translateY(-2px);
    }

    .comment-box {
        margin-bottom: 25px;
    }

    .comment-box label {
        display: block;
        color: #1a202c;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .comment-box textarea {
        width: 100%;
        padding: 15px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        font-family: inherit;
        resize: vertical;
        min-height: 120px;
        transition: border-color 0.3s;
    }

    .comment-box textarea:focus {
        outline: none;
        border-color: #667eea;
    }

    .btn-submit-review {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit-review:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-submit-review:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .btn {
        flex: 1;
        padding: 15px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s;
        border: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-secondary {
        background: white;
        color: #667eea;
        border: 2px solid #667eea;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Alert Messages */
    .alert {
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideDown 0.5s ease;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .review-submitted {
        text-align: center;
        padding: 40px;
        color: #718096;
    }

    .review-submitted svg {
        width: 60px;
        height: 60px;
        stroke: #48bb78;
        margin-bottom: 15px;
    }

    .review-submitted h3 {
        color: #1a202c;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .success-container {
            margin: 20px auto;
        }

        .success-card {
            padding: 25px;
        }

        .rating-options {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="success-container">
    <!-- Success Card -->
    <div class="success-card">
        <div class="success-icon">
            <svg viewBox="0 0 24 24" fill="none">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>
        <h1>Pesanan Berhasil Dibuat!</h1>
        <p>Terima kasih telah berbelanja di TaboKuliner</p>
        
        <div class="order-number">
            <strong>{{ $order->order_number }}</strong>
        </div>

        <p style="font-size: 14px; color: #a0aec0;">
            Silakan lakukan pembayaran sesuai metode yang dipilih
        </p>

        <div class="action-buttons">
            {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
                Lihat Detail Pesanan
            </a> --}}
            <a href="{{ route('Home') }}" class="btn btn-secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Order Details -->
    <div class="order-details">
        <h2>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            Detail Pesanan
        </h2>

        <div class="order-items">
            @foreach($order->items as $item)
            <div class="item-card">
                <img src="{{ $item->menu_image }}" alt="{{ $item->menu_name }}">
                <div class="item-info">
                    <h4>{{ $item->menu_name }}</h4>
                    <p>{{ $item->quantity }}x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
                <div class="item-price">
                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                </div>
            </div>
            @endforeach
        </div>

        <div class="detail-row">
            <span>Subtotal</span>
            <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="detail-row">
            <span>Biaya Pengiriman</span>
            <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
        </div>
        <div class="detail-row">
            <span>Biaya Layanan</span>
            <span>Rp {{ number_format($order->service_fee, 0, ',', '.') }}</span>
        </div>
        <div class="detail-row total-row">
            <span>Total Pembayaran</span>
            <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
        </div>
    </div>

    <!-- Review Section -->
    <div class="review-section">
        @if(session('success'))
        <div class="alert alert-success">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            {{ session('error') }}
        </div>
        @endif

        @if($order->review)
        <!-- Review Already Submitted -->
        <div class="review-submitted">
            <svg viewBox="0 0 24 24" fill="none">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <h3>Ulasan Sudah Dikirim</h3>
            <p>Terima kasih atas ulasan Anda!</p>
            <div style="background: #f7fafc; padding: 20px; border-radius: 12px; margin-top: 20px; text-align: left;">
                <strong style="color: #667eea;">{{ $order->review->rating_text }}</strong>
                <p style="margin-top: 10px; color: #4a5568;">{{ $order->review->comment }}</p>
            </div>
        </div>
        @else
        <!-- Review Form -->
        <h2>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            Berikan Ulasan Anda
        </h2>

        <form action="{{ route('order.review', $order->id) }}" method="POST">
            @csrf
            
            <div class="rating-options">
                <div class="rating-option">
                    <input type="radio" name="rating_text" value="Sangat Puas" id="rating1" required>
                    <label for="rating1">😊 Sangat Puas</label>
                </div>
                <div class="rating-option">
                    <input type="radio" name="rating_text" value="Puas" id="rating2">
                    <label for="rating2">🙂 Puas</label>
                </div>
                <div class="rating-option">
                    <input type="radio" name="rating_text" value="Cukup Puas" id="rating3">
                    <label for="rating3">😐 Cukup Puas</label>
                </div>
                <div class="rating-option">
                    <input type="radio" name="rating_text" value="Kurang Puas" id="rating4">
                    <label for="rating4">😕 Kurang Puas</label>
                </div>
                <div class="rating-option">
                    <input type="radio" name="rating_text" value="Tidak Puas" id="rating5">
                    <label for="rating5">😞 Tidak Puas</label>
                </div>
            </div>

            <div class="comment-box">
                <label for="comment">Ceritakan pengalaman Anda</label>
                <textarea 
                    name="comment" 
                    id="comment" 
                    placeholder="Bagikan pengalaman Anda tentang produk, pelayanan, dan pengiriman..." 
                    required
                    minlength="10"
                    maxlength="500"
                >{{ old('comment') }}</textarea>
                <small style="color: #a0aec0; font-size: 13px;">Minimal 10 karakter, maksimal 500 karakter</small>
            </div>

            <button type="submit" class="btn-submit-review">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 2L11 13"></path>
                    <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>
                </svg>
                Kirim Ulasan
            </button>
        </form>
        @endif
    </div>
</div>
@endsection

@section('js')
<script>
    // Auto hide alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);

    // Character counter for textarea
    const textarea = document.getElementById('comment');
    if (textarea) {
        const counter = document.createElement('div');
        counter.style.textAlign = 'right';
        counter.style.fontSize = '13px';
        counter.style.color = '#a0aec0';
        counter.style.marginTop = '5px';
        textarea.parentNode.appendChild(counter);

        textarea.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/500 karakter`;
            
            if (length < 10) {
                counter.style.color = '#fc8181';
            } else if (length > 450) {
                counter.style.color = '#f6ad55';
            } else {
                counter.style.color = '#48bb78';
            }
        });
    }
</script>
@endsection