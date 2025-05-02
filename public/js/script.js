// Menjalankan semua fungsi saat dokumen HTML telah dimuat sepenuhnya
document.addEventListener('DOMContentLoaded', () => {
    // Mengatur menu navigasi untuk tampilan mobile
    setupMobileNavigation();
    
    // Mengatur validasi form input pada halaman kontak
    setupFormValidation();
    
    // Mengatur efek animasi saat pengguna menscroll halaman
    setupScrollAnimations();
    
    // Mengatur modal dialog untuk tombol paket harga
    setupPricingButtons();
    
    // Mengatur interaksi blog
    setupBlogInteractions();
});

/**
 * Fungsi untuk menampilkan popup alert kustom
 * @param {string} title - Judul popup alert
 * @param {string} message - Pesan yang akan ditampilkan
 */
function showCustomAlert(title, message) {
    // Membuat overlay (latar belakang gelap)
    const overlay = document.createElement('div');
    overlay.classList.add('alert-overlay');
    
    // Membuat kontainer alert
    const alertBox = document.createElement('div');
    alertBox.classList.add('custom-alert');
    
    // Membuat elemen untuk judul
    const alertTitle = document.createElement('h3');
    alertTitle.classList.add('alert-title');
    alertTitle.textContent = title;
    
    // Membuat elemen untuk pesan
    const alertMessage = document.createElement('p');
    alertMessage.classList.add('alert-message');
    alertMessage.textContent = message;
    
    // Membuat tombol OK
    const alertButton = document.createElement('button');
    alertButton.classList.add('alert-button');
    alertButton.textContent = 'OK';
    
    // Menambahkan event listener untuk tombol OK
    alertButton.addEventListener('click', () => {
        // Menghapus overlay saat tombol diklik
        document.body.removeChild(overlay);
    });
    
    // Menyusun elemen-elemen ke dalam popup
    alertBox.appendChild(alertTitle);
    alertBox.appendChild(alertMessage);
    alertBox.appendChild(alertButton);
    overlay.appendChild(alertBox);
    
    // Menambahkan overlay ke body
    document.body.appendChild(overlay);
    
    // Memberi fokus ke tombol OK
    alertButton.focus();
}

/**
 * Fungsi untuk mengatur menu navigasi pada tampilan mobile
 */
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

/**
 * Fungsi untuk validasi form input pada halaman kontak
 */
function setupFormValidation() {
    const contactForm = document.querySelector('#kontak form');
    const nameInput = document.querySelector('#nama');
    const emailInput = document.querySelector('#email');
    const messageInput = document.querySelector('#pesan');
    const serviceSelect = document.querySelector('#layanan');
    
    // Fungsi untuk membuat elemen pesan error
    const createErrorElement = (id) => {
        const errorElement = document.createElement('span');
        errorElement.id = id;
        errorElement.classList.add('error-message');
        return errorElement;
    };
    
    // Membuat elemen pesan error untuk setiap input
    const nameError = createErrorElement('nama-error');
    const emailError = createErrorElement('email-error');
    const messageError = createErrorElement('pesan-error');
    const serviceError = createErrorElement('layanan-error');
    
    // Menempatkan elemen error setelah input
    nameInput.insertAdjacentElement('afterend', nameError);
    emailInput.insertAdjacentElement('afterend', emailError);
    messageInput.insertAdjacentElement('afterend', messageError);
    serviceSelect.insertAdjacentElement('afterend', serviceError);
    
    /**
     * Fungsi validasi nama
     * @returns {boolean} - true jika nama valid, false jika tidak
     */
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
    
    /**
     * Fungsi validasi email
     * @returns {boolean} - true jika email valid, false jika tidak
     */
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
    
    /**
     * Fungsi validasi layanan
     * @returns {boolean} - true jika layanan dipilih, false jika tidak
     */
    const validateService = () => {
        const service = serviceSelect.value;
        
        if (service === '') {
            serviceError.textContent = 'Silakan pilih layanan';
            serviceSelect.classList.add('invalid');
            serviceSelect.classList.remove('valid');
            return false;
        } else {
            serviceError.textContent = '';
            serviceSelect.classList.remove('invalid');
            serviceSelect.classList.add('valid');
            return true;
        }
    };
    
    /**
     * Fungsi validasi pesan
     * @returns {boolean} - true jika pesan valid, false jika tidak
     */
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
    serviceSelect.addEventListener('change', validateService);
    
    // Event listener untuk validasi saat form disubmit
    contactForm.addEventListener('submit', function(e) {
        // Mencegah pengiriman form secara default
        e.preventDefault();
        
        // Validasi semua input
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isMessageValid = validateMessage();
        const isServiceValid = validateService();
        
        // Jika semua input valid
        if (isNameValid && isEmailValid && isMessageValid && isServiceValid) {
            // Ambil data dari form
            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const message = messageInput.value.trim();
            let serviceName = "yang dipilih";
            
            // Ambil nama layanan yang dipilih dari option yang terpilih
            if (serviceSelect.selectedIndex > 0) {
                serviceName = serviceSelect.options[serviceSelect.selectedIndex].text;
            }
            
            // Tampilkan custom alert dengan data dari form
            showCustomAlert(
                'Pesan Terkirim',
                `Terima kasih ${name}! Pesan Anda tentang layanan ${serviceName} telah berhasil dikirim. Tim kami akan segera menghubungi Anda`
            );
            
            // Reset form
            contactForm.reset();
            
            // Menghapus kelas valid dari semua input
            const validInputs = contactForm.querySelectorAll('.valid');
            validInputs.forEach(input => input.classList.remove('valid'));
        }
    });
}

/**
 * Fungsi untuk mengatur efek animasi scroll
 */
function setupScrollAnimations() {
    // Tambahkan kelas untuk elemen yang akan dianimasikan
    const elementsToAnimate = [
        ...document.querySelectorAll('#layanan article'),
        ...document.querySelectorAll('.pricing-card'),
        ...document.querySelectorAll('.blog-card'),
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
/**
 * Fungsi untuk mengatur tombol-tombol paket harga
 */
function setupPricingButtons() {
    const pricingButtons = document.querySelectorAll('.pricing-button');
    
    pricingButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Mendapatkan nama paket dari card harga terdekat
            const pricingCard = this.closest('.pricing-card');
            const packageName = pricingCard.querySelector('h4').textContent;
            
            // Scroll ke formulir kontak
            const contactSection = document.querySelector('#kontak');
            window.scrollTo({
                top: contactSection.offsetTop,
                behavior: 'smooth'
            });
            
            // Memilih layanan yang sesuai pada dropdown
            const serviceSelect = document.querySelector('#layanan');
            const serviceOptions = Array.from(serviceSelect.options);
            
            // Mengatur pesan default berdasarkan paket yang dipilih
            const messageField = document.querySelector('#pesan');
            messageField.value = `Saya tertarik dengan ${packageName}. Mohon informasi lebih lanjut.`;
            
            // Menampilkan alert untuk menginformasikan pengguna
            setTimeout(() => {
                alert(`Anda memilih ${packageName}. Silakan lengkapi form kontak untuk mendapatkan informasi lebih lanjut.`);
            }, 1000);
            
            // Mencari layanan yang sesuai berdasarkan judul artikel
            const serviceHeading = pricingCard.closest('article').querySelector('h3').textContent;
            
            if (serviceHeading.includes('Website')) {
                serviceSelect.value = 'web';
            } else if (serviceHeading.includes('Penetration')) {
                serviceSelect.value = 'pentest';
            } else if (serviceHeading.includes('Desain')) {
                serviceSelect.value = 'design';
            }
            
            // Memicu event change untuk validasi
            const changeEvent = new Event('change');
            serviceSelect.dispatchEvent(changeEvent);
        });
    });
}

/**
 * Fungsi untuk mengatur interaksi pada bagian blog
 */
function setupBlogInteractions() {
    const blogLinks = document.querySelectorAll('.blog-link');
    const blogMoreButton = document.querySelector('.blog-more-button');
    
    // Mengatur link untuk setiap artikel blog
    blogLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Mendapatkan judul artikel
            const blogTitle = this.closest('.blog-content').querySelector('h3').textContent;
            
            // Menampilkan alert dengan pesan informasi
            alert(`Artikel "${blogTitle}" sedang dalam pengembangan. Silakan kunjungi kembali nanti.`);
        });
    });
    
    // Mengatur tombol "Lihat Semua Artikel"
    if (blogMoreButton) {
        blogMoreButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Menampilkan alert dengan pesan informasi
            alert('Halaman blog lengkap sedang dalam pengembangan. Silakan kunjungi kembali nanti untuk melihat lebih banyak artikel.');
        });
    }
}