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
  