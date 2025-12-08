// Update cart quantity
function updateQuantity(id, change) {
    const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
    let currentQty = parseInt(input.value);
    let newQty = currentQty + change;

    if (newQty < 1) newQty = 1;
    if (newQty > 99) newQty = 99;

    input.value = newQty;

    // Send AJAX request to update cart
    fetch('/cart/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            id: id,
            quantity: newQty
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update item total
            const itemTotal = document.querySelector(`.total-price[data-id="${id}"]`);
            itemTotal.textContent = formatRupiah(data.itemTotal);

            // Update summary totals
            updateSummary(data.total);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan saat memperbarui keranjang', 'error');
    });
}

// Remove item from cart
function removeItem(id) {
    if (!confirm('Apakah Anda yakin ingin menghapus item ini?')) return;

    fetch(`/cart/remove/${id}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove item from DOM
            const item = document.querySelector(`.cart-item[data-id="${id}"]`);
            item.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                item.remove();
                
                // Check if cart is empty
                const remainingItems = document.querySelectorAll('.cart-item').length;
                if (remainingItems === 0) {
                    location.reload();
                } else {
                    updateSummary(data.total);
                    updateCartCount(data.cartCount);
                }
            }, 300);

            showNotification(data.message, 'success');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan saat menghapus item', 'error');
    });
}

// Clear entire cart
function clearCart() {
    if (!confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) return;

    fetch('/cart/clear', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(data.message, 'success');
            setTimeout(() => location.reload(), 1000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan', 'error');
    });
}

// Update summary totals
function updateSummary(subtotal) {
    const shipping = 10000;
    const service = 2000;
    const total = subtotal + shipping + service;

    document.querySelector('.subtotal').textContent = formatRupiah(subtotal);
    document.querySelector('.total-amount').textContent = formatRupiah(total);
}

// Update cart count in header (if you have cart badge)
function updateCartCount(count) {
    const cartBadge = document.querySelector('.cart-badge');
    if (cartBadge) {
        cartBadge.textContent = count;
        if (count === 0) cartBadge.style.display = 'none';
    }
}

// Format currency
function formatRupiah(number) {
    return 'Rp ' + number.toLocaleString('id-ID');
}

// Show notification
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 25px;
        background: ${type === 'success' ? '#27ae60' : '#e74c3c'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        z-index: 9999;
        animation: slideInRight 0.3s ease;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideOut {
        to {
            transform: translateX(-100%);
            opacity: 0;
        }
    }
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slideOutRight {
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);