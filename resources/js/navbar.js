document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM loaded!');
    
    const navbar = document.querySelector('nav');
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    
    console.log('Elements found:', {
        navbar: !!navbar,
        menuToggle: !!menuToggle,
        mobileMenu: !!mobileMenu,
        hamburgerIcon: !!hamburgerIcon,
        closeIcon: !!closeIcon
    });
    
    let isMenuOpen = false;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar?.classList.add('bg-white', 'shadow-lg', 'bg-opacity-100');
            navbar?.classList.remove('bg-opacity-50', 'shadow-sm');
        } else {
            navbar?.classList.remove('bg-white', 'shadow-lg', 'bg-opacity-100');
            navbar?.classList.add('bg-opacity-50', 'shadow-sm');
        }
        
        highlightActiveNavItem();
    });

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                mobileMenu.classList.remove('translate-x-full');
                mobileMenu.classList.add('translate-x-0');
                
                if (hamburgerIcon && closeIcon) {
                    hamburgerIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
                
                document.body.style.overflow = 'hidden';
            } else {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');
                
                if (hamburgerIcon && closeIcon) {
                    hamburgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
                
                document.body.style.overflow = 'auto';
            }
        });
    } else {
        console.error('Menu toggle or mobile menu not found!');
    }

    if (mobileMenu) {
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (isMenuOpen) {
                    isMenuOpen = false;
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('translate-x-full');
                    
                    if (hamburgerIcon && closeIcon) {
                        hamburgerIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                    }
                    
                    document.body.style.overflow = 'auto';
                }
            });
        });
    }

    function highlightActiveNavItem() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('nav a[href^="#"]');
        const mobileNavLinks = document.querySelectorAll('#mobile-menu a[href^="#"]');
        
        let currentSection = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (window.scrollY >= sectionTop - 200 && window.scrollY < sectionTop + sectionHeight - 200) {
                currentSection = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('text-amber-900', 'underline');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.classList.add('text-amber-900', 'underline');
            }
        });
        
        mobileNavLinks.forEach(link => {
            link.classList.remove('text-amber-900', 'underline');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.classList.add('text-amber-900', 'underline');
            }
        });
    }

    highlightActiveNavItem();
});