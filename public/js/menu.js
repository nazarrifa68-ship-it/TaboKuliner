// Menu Pagination System
document.addEventListener('DOMContentLoaded', function() {
    // Initialize pagination for Special Menu
    initPagination('.special-menu', 6); // 6 items per page
    
    // Initialize pagination for Regular Food
    initPagination('.regular-food', 6); // 6 items per page
});

function initPagination(sectionSelector, itemsPerPage) {
    const section = document.querySelector(sectionSelector);
    if (!section) return;
    
    const menuGrid = section.querySelector('.menu-grid');
    const paginationDots = section.querySelectorAll('.pagination .dot');
    const menuCards = Array.from(menuGrid.querySelectorAll('.menu-card'));
    
    let currentPage = 0;
    const totalPages = paginationDots.length;
    
    // Function to show items for current page
    function showPage(pageIndex) {
        const start = pageIndex * itemsPerPage;
        const end = start + itemsPerPage;
        
        // Hide all cards
        menuCards.forEach(card => {
            card.style.display = 'none';
        });
        
        // Show cards for current page
        for (let i = start; i < end && i < menuCards.length; i++) {
            menuCards[i].style.display = 'block';
        }
        
        // Update pagination dots
        paginationDots.forEach((dot, index) => {
            if (index === pageIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
        
        currentPage = pageIndex;
    }
    
    // Add click event to pagination dots
    paginationDots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            showPage(index);
        });
    });
    
    // Show first page initially
    showPage(0);
    
    // Optional: Auto-slide functionality (uncomment if needed)
    /*
    setInterval(() => {
        const nextPage = (currentPage + 1) % totalPages;
        showPage(nextPage);
    }, 5000); // Change page every 5 seconds
    */
}

// Add smooth animation effect
const style = document.createElement('style');
style.textContent = `
    .menu-card {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);