// Tab Switching
const menuItems = document.querySelectorAll('.menu-item');
const tabContents = document.querySelectorAll('.tab-content');

menuItems.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        
        // Remove active class from all
        menuItems.forEach(mi => mi.classList.remove('active'));
        tabContents.forEach(tc => tc.classList.remove('active'));
        
        // Add active class to clicked item
        item.classList.add('active');
        
        // Show corresponding tab
        const tabId = item.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
    });
});

// Modal Add Address
const modal = document.getElementById('modal-add-address');
const btnAddAddress = document.getElementById('btn-add-address');
const btnAddAddressEmpty = document.getElementById('btn-add-address-empty');
const btnCloseModal = document.querySelectorAll('.modal-close');

// Open modal
if (btnAddAddress) {
    btnAddAddress.addEventListener('click', () => {
        modal.classList.add('active');
    });
}

if (btnAddAddressEmpty) {
    btnAddAddressEmpty.addEventListener('click', () => {
        modal.classList.add('active');
    });
}

// Close modal
btnCloseModal.forEach(btn => {
    btn.addEventListener('click', () => {
        modal.classList.remove('active');
    });
});

// Close modal when clicking outside
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('active');
    }
});

// Preview photo before upload
const profilePhotoInput = document.getElementById('profile_photo');
if (profilePhotoInput) {
    profilePhotoInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.querySelector('.current-photo img').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
}