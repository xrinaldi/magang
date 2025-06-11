// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// FAQ Toggle Function
function toggleFAQ(element) {
    const faqItem = element.parentElement;
    const answer = element.nextElementSibling;
    const arrow = element.querySelector('.faq-arrow');

    // Close all other FAQ items
    document.querySelectorAll('.faq-item').forEach(item => {
        if (item !== faqItem) {
            item.classList.remove('active');
            item.querySelector('.faq-answer').classList.remove('show');
            item.querySelector('.faq-arrow').textContent = '▼';
        }
    });

    // Toggle current FAQ item
    if (faqItem.classList.contains('active')) {
        faqItem.classList.remove('active');
        answer.classList.remove('show');
        arrow.textContent = '▼';
    } else {
        faqItem.classList.add('active');
        answer.classList.add('show');
        arrow.textContent = '▲';
    }
}

// Menu tabs functionality
function switchMenuTab(element, category) {
    // Remove active class from all tabs
    document.querySelectorAll('.menu-tab').forEach(tab => {
        tab.classList.remove('active');
    });

    // Add active class to clicked tab
    element.classList.add('active');

    // Here you could add logic to switch menu content based on category
    // For now, keeping the same content
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerHeight = document.querySelector('.header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-on-scroll');
        }
    });
}, observerOptions);

// Observe elements for animation
document.querySelectorAll('.feature-card, .menu-item, .space-card, .news-card, .faq-item').forEach(el => {
    observer.observe(el);
});