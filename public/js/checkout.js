// Handle address selection
document.querySelectorAll('.address-option input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.address-option').forEach(opt => {
            opt.classList.remove('selected');
        });
        this.closest('.address-option').classList.add('selected');
    });
});

// Handle payment method selection
document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.payment-option').forEach(opt => {
            opt.classList.remove('selected');
        });
        this.closest('.payment-option').classList.add('selected');
    });
});

// Form validation before submit
document.querySelector('.checkout-form')?.addEventListener('submit', function(e) {
    const addressChecked = document.querySelector('input[name="address_id"]:checked');
    const paymentChecked = document.querySelector('input[name="payment_method"]:checked');

    if (!addressChecked) {
        e.preventDefault();
        alert('Silakan pilih alamat pengiriman');
        return false;
    }

    if (!paymentChecked) {
        e.preventDefault();
        alert('Silakan pilih metode pembayaran');
        return false;
    }

    // Show loading
    const btn = this.querySelector('.btn-place-order');
    btn.disabled = true;
    btn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"></path></svg> Memproses...';
});