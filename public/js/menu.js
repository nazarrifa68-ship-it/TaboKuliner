document.addEventListener('DOMContentLoaded', function() {
    console.log('Menu JS loaded');
    
    const modal = document.getElementById('menuModal');
    const closeBtn = document.querySelector('.close');
    const orderButtons = document.querySelectorAll('.order-btn');
    const quantityInput = document.getElementById('quantity');
    const decreaseBtn = document.getElementById('decreaseQty');
    const increaseBtn = document.getElementById('increaseQty');
    const addToCartBtn = document.querySelector('.add-to-cart-btn');

    let currentPrice = 0;
    let currentMenuId = null;

    console.log('Order buttons found:', orderButtons.length);

    // Function to format currency
    function formatRupiah(number) {
        return 'Rp ' + number.toLocaleString('id-ID');
    }

    // Function to parse price from string
    function parsePrice(priceString) {
        return parseInt(priceString.replace(/[^0-9]/g, ''));
    }

    // Function to update total
    function updateTotal() {
        const quantity = parseInt(quantityInput.value);
        const total = currentPrice * quantity;
        document.getElementById('modalTotal').textContent = formatRupiah(total);
    }

    // Open modal when order button is clicked
    orderButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Order button clicked');
            
            const menuCard = this.closest('.menu-card');
            const menuName = menuCard.querySelector('h3').textContent;
            const menuCalories = menuCard.querySelector('.calories').textContent;
            const priceBtn = menuCard.querySelector('.price-btn');
            const menuPrice = priceBtn.textContent;
            const rawPrice = priceBtn.dataset.price;
            const menuImage = menuCard.querySelector('.menu-image img').src;
            
            currentMenuId = menuCard.dataset.menuId;

            console.log('Menu data:', {
                id: currentMenuId,
                name: menuName,
                price: rawPrice,
                calories: menuCalories
            });

            // Set modal content
            document.getElementById('modalTitle').textContent = menuName;
            document.getElementById('modalCalories').textContent = menuCalories;
            document.getElementById('modalPrice').textContent = menuPrice;
            document.getElementById('modalImage').src = menuImage;
            document.getElementById('modalImage').alt = menuName;

            currentPrice = rawPrice ? parseFloat(rawPrice) : parsePrice(menuPrice);

            // Reset quantity
            quantityInput.value = 1;
            updateTotal();

            // Show modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    });

    // Close modal
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Decrease quantity
    if (decreaseBtn) {
        decreaseBtn.addEventListener('click', function() {
            let currentQty = parseInt(quantityInput.value);
            if (currentQty > 1) {
                quantityInput.value = currentQty - 1;
                updateTotal();
            }
        });
    }

    // Increase quantity
    if (increaseBtn) {
        increaseBtn.addEventListener('click', function() {
            let currentQty = parseInt(quantityInput.value);
            if (currentQty < 99) {
                quantityInput.value = currentQty + 1;
                updateTotal();
            }
        });
    }

    // Add to cart button
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            console.log('Add to cart clicked');
            
            const menuName = document.getElementById('modalTitle').textContent;
            const menuPrice = currentPrice;
            const quantity = parseInt(quantityInput.value);
            const menuImage = document.getElementById('modalImage').src;
            const menuCalories = document.getElementById('modalCalories').textContent;
            
            const menuId = currentMenuId || menuName.toLowerCase().replace(/\s+/g, '-');

            const cartData = {
                id: menuId,
                name: menuName,
                price: menuPrice,
                quantity: quantity,
                image: menuImage,
                calories: menuCalories
            };

            console.log('Sending to cart:', cartData);

            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            
            if (!csrfToken) {
                console.error('CSRF token not found!');
                showNotification('Error: CSRF token tidak ditemukan', 'error');
                return;
            }

            console.log('CSRF Token:', csrfToken.content);

            // Disable button to prevent double click
            addToCartBtn.disabled = true;
            addToCartBtn.textContent = 'Menambahkan...';

            // Send to cart
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(cartData)
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartBadge(data.cartCount);
                    
                    // Close modal
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                    
                    // Reset quantity
                    quantityInput.value = 1;
                } else {
                    showNotification(data.message || 'Gagal menambahkan ke keranjang', 'error');
                }
                
                // Re-enable button
                addToCartBtn.disabled = false;
                addToCartBtn.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    Tambah ke Keranjang
                `;
            })
            .catch(error => {
                console.error('Fetch error:', error);
                showNotification('Terjadi kesalahan: ' + error.message, 'error');
                
                // Re-enable button
                addToCartBtn.disabled = false;
                addToCartBtn.innerHTML = `
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    Tambah ke Keranjang
                `;
            });
        });
    }

    // Handle quantity input change
    if (quantityInput) {
        quantityInput.addEventListener('change', function() {
            let value = parseInt(this.value);
            if (value < 1) this.value = 1;
            if (value > 99) this.value = 99;
            updateTotal();
        });
    }

    // Helper function to show notification
    function showNotification(message, type) {
        console.log('Notification:', type, message);
        
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
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Helper function to update cart badge
    function updateCartBadge(count) {
        console.log('Updating cart badge to:', count);
        
        let badge = document.querySelector('.cart-badge');
        if (!badge && count > 0) {
            const cartLink = document.querySelector('a[href*="cart"]');
            if (cartLink) {
                badge = document.createElement('span');
                badge.className = 'cart-badge';
                cartLink.style.position = 'relative';
                cartLink.appendChild(badge);
            }
        }
        if (badge) {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        }
    }
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slideOut {
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #e74c3c;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: bold;
    }
`;
document.head.appendChild(style);