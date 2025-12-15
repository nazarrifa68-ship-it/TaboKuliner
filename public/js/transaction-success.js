// Auto-hide success message after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const confirmation = document.querySelector('.confirmation');
    
    if (confirmation && confirmation.style.display === 'block') {
        setTimeout(() => {
            confirmation.style.display = 'none';
        }, 5000);
    }
});