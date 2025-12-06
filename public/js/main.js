// Toggle Mobile Menu
const toggle = document.getElementById('menu-toggle');
const navLinks = document.getElementById('nav-links');

if (toggle) {
    toggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
}

// Toggle User Dropdown Menu
const userMenuToggle = document.getElementById('user-menu-toggle');
const userDropdownMenu = document.getElementById('user-dropdown-menu');

if (userMenuToggle && userDropdownMenu) {
    userMenuToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdownMenu.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!userMenuToggle.contains(e.target) && !userDropdownMenu.contains(e.target)) {
            userDropdownMenu.classList.remove('active');
        }
    });
}