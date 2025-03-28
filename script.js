document.addEventListener('DOMContentLoaded', () => {
    // Toggle menu navigasi untuk tampilan mobile
    setupMobileNavigation();
    
    // Validasi form input pada halaman kontak
    setupFormValidation();
    
    // Efek animasi saat pengguna menscroll halaman
    setupScrollAnimations();
});

// Toggle Menu Navigasi untuk Tampilan Mobile
function setupMobileNavigation() {
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');
    
    // Membuat tombol toggle untuk menu mobile
    const toggleButton = document.createElement('button');
    toggleButton.innerHTML = '☰';
    toggleButton.classList.add('nav-toggle');
    toggleButton.setAttribute('aria-label', 'Toggle Navigation Menu');
    
    // Memasukkan tombol toggle ke header
    header.insertBefore(toggleButton, nav);
    
    // Menambahkan event listener untuk toggle menu
    toggleButton.addEventListener('click', () => {
        nav.classList.toggle('active');
        
        // Mengubah ikon toggle sesuai status menu
        if (nav.classList.contains('active')) {
            toggleButton.innerHTML = '✕';
        } else {
            toggleButton.innerHTML = '☰';
        }
    });
    
    // Menutup menu saat salah satu link diklik
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                nav.classList.remove('active');
                toggleButton.innerHTML = '☰';
            }
        });
    });
    
    // Menutup menu saat klik di luar menu
    document.addEventListener('click', (event) => {
        const isClickInsideMenu = nav.contains(event.target);
        const isClickOnToggle = toggleButton.contains(event.target);
        
        if (!isClickInsideMenu && !isClickOnToggle && nav.classList.contains('active')) {
            nav.classList.remove('active');
            toggleButton.innerHTML = '☰';
        }
    });
}

// Validasi Form Input pada Halaman Kontak
function setupFormValidation() {
    const contactForm = document.querySelector('#kontak form');
    const nameInput = document.querySelector('#nama');
    const emailInput = document.querySelector('#email');
    const messageInput = document.querySelector('#pesan');
    
    // Menambahkan elemen untuk pesan error
    const createErrorElement = (id) => {
        const errorElement = document.createElement('span');
        errorElement.id = id;
        errorElement.classList.add('error-message');
        return errorElement;
    };
    
    const nameError = createErrorElement('nama-error');
    const emailError = createErrorElement('email-error');
    const messageError = createErrorElement('pesan-error');
    
    // Menyisipkan elemen error setelah input
    nameInput.insertAdjacentElement('afterend', nameError);
    emailInput.insertAdjacentElement('afterend', emailError);
    messageInput.insertAdjacentElement('afterend', messageError);
    
    // Fungsi validasi nama
    const validateName = () => {
        const name = nameInput.value.trim();
        
        if (name === '') {
            nameError.textContent = 'Nama tidak boleh kosong';
            nameInput.classList.add('invalid');
            nameInput.classList.remove('valid');
            return false;
        } else if (name.length < 3) {
            nameError.textContent = 'Nama minimal 3 karakter';
            nameInput.classList.add('invalid');
            nameInput.classList.remove('valid');
            return false;
        } else {
            nameError.textContent = '';
            nameInput.classList.remove('invalid');
            nameInput.classList.add('valid');
            return true;
        }
    };
    
    // Fungsi validasi email
    const validateEmail = () => {
        const email = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email === '') {
            emailError.textContent = 'Email tidak boleh kosong';
            emailInput.classList.add('invalid');
            emailInput.classList.remove('valid');
            return false;
        } else if (!emailRegex.test(email)) {
            emailError.textContent = 'Email tidak valid';
            emailInput.classList.add('invalid');
            emailInput.classList.remove('valid');
            return false;
        } else {
            emailError.textContent = '';
            emailInput.classList.remove('invalid');
            emailInput.classList.add('valid');
            return true;
        }
    };
    
    // Fungsi validasi pesan
    const validateMessage = () => {
        const message = messageInput.value.trim();
        
        if (message === '') {
            messageError.textContent = 'Pesan tidak boleh kosong';
            messageInput.classList.add('invalid');
            messageInput.classList.remove('valid');
            return false;
        } else if (message.length < 10) {
            messageError.textContent = 'Pesan minimal 10 karakter';
            messageInput.classList.add('invalid');
            messageInput.classList.remove('valid');
            return false;
        } else {
            messageError.textContent = '';
            messageInput.classList.remove('invalid');
            messageInput.classList.add('valid');
            return true;
        }
    };
    
    // Event listener untuk validasi saat input berubah
    nameInput.addEventListener('input', validateName);
    emailInput.addEventListener('input', validateEmail);
    messageInput.addEventListener('input', validateMessage);
    
    // Event listener untuk validasi saat form disubmit
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isMessageValid = validateMessage();
        
        if (isNameValid && isEmailValid && isMessageValid) {
            // Menampilkan pesan sukses
            const successMessage = document.createElement('div');
            successMessage.classList.add('success-message');
            successMessage.textContent = 'Terima kasih! Pesan Anda telah terkirim.';
            
            // Memasukkan pesan sukses setelah form
            contactForm.insertAdjacentElement('afterend', successMessage);
            
            // Reset form
            contactForm.reset();
            
            // Menghapus kelas valid dari semua input
            const validInputs = contactForm.querySelectorAll('.valid');
            validInputs.forEach(input => input.classList.remove('valid'));
            
            // Menghapus pesan sukses setelah 5 detik
            setTimeout(() => {
                successMessage.remove();
            }, 5000);
        }
    });
}

// Efek Animasi saat Pengguna Menscroll Halaman
function setupScrollAnimations() {
    // Tambahkan kelas untuk elemen yang akan dianimasikan
    const elementsToAnimate = [
        ...document.querySelectorAll('#layanan article'),
        ...document.querySelectorAll('blockquote'),
        document.querySelector('#kontak form'),
        document.querySelector('.tentang-container')
    ];
    
    // Tambahkan kelas awal untuk semua elemen yang akan dianimasikan
    elementsToAnimate.forEach(element => {
        if (element) {
            element.classList.add('scroll-animation');
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        }
    });
    
    // Fungsi untuk memeriksa apakah elemen terlihat dalam viewport
    const isElementInViewport = (el) => {
        if (!el) return false;
        
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85 &&
            rect.bottom >= 0
        );
    };
    
    // Fungsi untuk menambahkan kelas aktif ke elemen yang terlihat
    const handleScroll = () => {
        elementsToAnimate.forEach(element => {
            if (element && isElementInViewport(element)) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };
    
    // Jalankan pertama kali untuk elemen yang sudah terlihat saat halaman dimuat
    setTimeout(handleScroll, 100);
    
    // Tambahkan event listener untuk scroll
    window.addEventListener('scroll', handleScroll);
    
    // Tambahkan animasi smooth scroll untuk link navigasi
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}
