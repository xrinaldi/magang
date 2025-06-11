<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dugg Coffee - Your Green Escape</title>
    {{-- Menggunakan helper asset() untuk CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header" id="header">
        <div class="nav-container">
            <div class="logo">🦋</div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#space">Space & Facility</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </nav>
            <div class="nav-buttons">
                <a href="#order" class="btn-order">Order</a>
                <a href="#join" class="btn-join">Join</a>
            </div>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Welcome to Dugg Coffee – Your Green Escape</h1>
                <p>At Dugg Coffee, we believe a great cup of coffee deserves a beautiful place to be enjoyed. Nestled in the heart of Bandung, our garden-inspired space offers a peaceful escape where you can unwind, create, and connect with nature.</p>
                <a href="#order" class="hero-btn">Order Now</a>
            </div>
            <div class="hero-images">
                <div class="coffee-cups-container">
                    <div class="coffee-cup">
                        <div class="coffee-inner">
                            <div class="coffee-foam"></div>
                        </div>
                        <div class="coffee-steam"></div>
                    </div>
                    <div class="coffee-cup">
                        <div class="coffee-inner">
                            <div class="coffee-foam"></div>
                        </div>
                        <div class="coffee-steam"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-image"></div>
                <div class="about-text">
                    <h2>Your Green Escape in Bandung</h2>
                    <p>Dugg Coffee lahir dari keinginan sederhana: menghadirkan tempat ngopi yang menyegarkan jiwa. Dengan konsep taman yang rindang dan kolam ikan yang menenangkan, kami mengajak Anda menikmati kopi dalam suasana yang lebih santai, hangat, dan penuh kehidupan. Di sini, setiap tegukan punya cerita, dan setiap sudut punya kenyamanan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Discover Dugg Coffee</h2>
            <p class="section-subtitle">Explore the unique features that make Dugg Coffee a special place for coffee lovers.</p>

            <div class="features-grid">
                <div class="feature-card">
                    <h3>Crafted Perfection</h3>
                    <p>Indulge in handcrafted coffee beverages made with precision and passion.</p>
                </div>
                <div class="feature-card">
                    <h3>Community Hub</h3>
                    <p>Join a vibrant community of coffee enthusiasts and share your love for coffee.</p>
                </div>
                <div class="feature-card">
                    <h3>Sustainable Practices</h3>
                    <p>Support eco-friendly initiatives with our commitment to sustainable sourcing and practices.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="menu-section">
        <div class="container">
            <h2 class="section-title">Featured Drinks</h2>
            <p class="section-subtitle">Indulge in our handcrafted specialty drinks, each a unique blend of flavors and artistry.</p>

            <div class="menu-tabs">
                <button class="menu-tab active" onclick="switchMenuTab(this, 'beverages')">Beverages</button>
                <button class="menu-tab" onclick="switchMenuTab(this, 'seasonal')">Seasonal</button>
                <button class="menu-tab" onclick="switchMenuTab(this, 'signature')">Signature</button>
                <button class="menu-tab" onclick="switchMenuTab(this, 'shareables')">Shareables</button>
                <button class="menu-tab" onclick="switchMenuTab(this, 'main')">Main Course</button>
            </div>

            <div class="menu-grid" id="menu-content">
                <div class="menu-item">
                    <h4>Espresso</h4>
                    <p>Kopi hitam pekat dengan rasa kuat, disajikan dalam takaran kecil untuk suntikan semangat.</p>
                </div>
                <div class="menu-item">
                    <h4>Espresso Macchiato</h4>
                    <p>A bold shot of espresso topped with a dollop of frothy milk, a perfect balance of strength and creaminess.</p>
                </div>
                <div class="menu-item">
                    <h4>Caramel Latte</h4>
                    <p>Smooth espresso combined with velvety steamed milk and a rich caramel syrup, a sweet and comforting treat.</p>
                </div>
                <div class="menu-item">
                    <h4>Matcha Green Tea Latte</h4>
                    <p>A vibrant green tea latte made with premium matcha powder, a refreshing and energizing choice.</p>
                </div>
                <div class="menu-item">
                    <h4>Cappuccino</h4>
                    <p>Kopi hitam pekat dengan rasa kuat, disajikan dalam takaran kecil untuk suntikan semangat.</p>
                </div>
                <div class="menu-item">
                    <h4>Americano</h4>
                    <p>Kopi hitam pekat dengan rasa kuat, disajikan dalam takaran kecil untuk suntikan semangat.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="space" class="space-section">
        <div class="container">
            <h2 class="section-title">Experience Cozy Comfort in Our Inviting Coffee Shop Space</h2>

            <div class="space-grid">
                <div class="space-card">
                    <div class="space-image"></div>
                    <div class="space-content">
                        <h3>Level Up Your Fun in Our Cozy Gaming Room</h3>
                        <p>Enjoy casual or competitive gaming with friends in a relaxed and stylish setup, equipped with high-speed internet and comfy seating.</p>
                        <a href="#" class="space-btn">Explore →</a>
                    </div>
                </div>
                <div class="space-card">
                    <div class="space-image"></div>
                    <div class="space-content">
                        <h3>Under the Canopy of Our Lush, Green Garden</h3>
                        <p>Take a peaceful break beneath our cozy rooftop garden, where greenery surrounds you and the gentle sound of our fish pond soothes your soul.</p>
                        <a href="#" class="space-btn">Explore →</a>
                    </div>
                </div>
                <div class="space-card">
                    <div class="space-image"></div>
                    <div class="space-content">
                        <h3>Host Productivity in Our Private Meeting Room</h3>
                        <p>Conduct meetings or creative activity sessions in a quiet, well-equipped space thoughtfully designed to spark ideas and meaningful collaboration.</p>
                        <a href="#" class="space-btn">Explore →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news" class="news-section">
        <div class="container">
            <h2 class="section-title">Kabar Baru dari Dugg Coffee</h2>
            <p class="section-subtitle">Ikuti info terkini seputar Dugg Coffee — mulai dari menu musiman terbaru, acara komunitas, hingga pembaruan suasana. Selalu ada cerita baru yang siap diseduh.</p>

            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image"></div>
                    <div class="news-content">
                        <div class="news-date">30 Mei, 2025</div>
                        <h3 class="news-title">Tempat Nyaman di Samping Kolam</h3>
                        <p class="news-excerpt">Masuk ke Dugg Coffee dan temukan lebih dari sekadar secangkir kopi. Area semi-outdoor kami menghadirkan kolam ikan yang tenang, tanaman hijau yang menambah vibe natural...</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image"></div>
                    <div class="news-content">
                        <div class="news-date">30 Mei, 2025</div>
                        <h3 class="news-title">Tempat Nyaman di Samping Kolam</h3>
                        <p class="news-excerpt">Masuk ke Dugg Coffee dan temukan lebih dari sekadar secangkir kopi. Area semi-outdoor kami menghadirkan kolam ikan yang tenang, tanaman hijau yang menambah vibe natural...</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image"></div>
                    <div class="news-content">
                        <div class="news-date">30 Mei, 2025</div>
                        <h3 class="news-title">Tempat Nyaman di Samping Kolam</h3>
                        <p class="news-excerpt">Masuk ke Dugg Coffee dan temukan lebih dari sekadar secangkir kopi. Area semi-outdoor kami menghadirkan kolam ikan yang tenang, tanaman hijau yang menambah vibe natural...</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image"></div>
                    <div class="news-content">
                        <div class="news-date">30 Mei, 2025</div>
                        <h3 class="news-title">Tempat Nyaman di Samping Kolam</h3>
                        <p class="news-excerpt">Masuk ke Dugg Coffee dan temukan lebih dari secangkir kopi. Area semi-outdoor kami menghadirkan kolam ikan yang tenang, tanaman hijau yang menambah vibe natural...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instagram-section">
        <div class="container">
            <h2 class="instagram-title">Our Instagram</h2>
            <p class="instagram-subtitle">Explore the cozy atmosphere of Dugg Coffee.</p>

            <div class="instagram-grid">
                <div class="instagram-post">📷</div>
                <div class="instagram-post">📷</div>
                <div class="instagram-post">📷</div>
                <div class="instagram-post">📷</div>
                <div class="instagram-post">📷</div>
                <div class="instagram-post">📷</div>
            </div>
        </div>
    </section>

    <section id="faq" class="faq-section">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Apa konsep utama Dugg Coffee?</span>
                        <span class="faq-arrow">▼</span>
                    </div>
                    <div class="faq-answer">
                        <p>Dugg Coffee mengusung konsep "Drink Under Good Garden" yang menggabungkan kopi nikmat dengan suasana taman alami. Di sini, kamu bisa ngopi sambil menikmati pepohon hijau, kolam ikan, dan udara segar yang menenangkan pikiran.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Apakah tersedia area indoor dan outdoor?</span>
                        <span class="faq-arrow">▼</span>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kami memiliki area indoor ber-AC yang nyaman serta area outdoor dengan suasana taman rindang. Keduanya dirancang agar pengunjung bisa memilih tempat sesuai suasana hati atau kebutuhan aktivitasnya.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Bisa reservasi untuk meeting atau acara?</span>
                        <span class="faq-arrow">▼</span>
                    </div>
                    <div class="faq-answer">
                        <p>Bisa banget! Kami menyediakan ruang meeting dan area semi-privat yang bisa dipesan untuk diskusi, rapat, atau acara komunitas kecil. Cukup hubungi kami lewat Instagram atau WhatsApp untuk info dan jadwalnya.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Kapan jam buka Dugg Coffee?</span>
                        <span class="faq-arrow">▼</span>
                    </div>
                    <div class="faq-answer">
                        <p>Kami buka setiap hari, mulai pukul 08.00 pagi hingga 22.00 malam. Baik untuk morning coffee, work session, atau quality time malam hari di taman kami.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Bagaimana kesediaan Wi-Fi dan outlet listrik di Dugg Coffee?</span>
                        <span class="faq-arrow">▼</span>
                    </div>
                    <div class="faq-answer">
                        <p>Kami menyediakan Wi-Fi gratis dan outlet listrik di hampir semua meja, baik di area indoor maupun outdoor. Tempat ini memang dirancang untuk mendukung pengunjung yang ingin bekerja, belajar, atau bersantai sambil tetap terhubung dengan perangkat mereka.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section footer-logo-section">
                    <div class="footer-logo">🦋</div>
                    <h4>Active Hours:</h4>
                    <p>Monday - Friday: 08.00 – 22.00</p>
                    <p>Saturday: 08.00 – 23.00</p>
                    <p>Sunday & Holiday: 08.00 – 21.00</p>
                    <br>
                    <h4>Contact:</h4>
                    <p>+62 1234567890</p>
                    <p>@duggcoffee_66</p>
                    <a href="mailto:duggcoffee6@gmail.com">duggcoffee6@gmail.com</a>
                    <a href="http://duggcoffee66.com">duggcoffee66.com</a>
                </div>

                <div class="footer-section">
                    <h4>Address:</h4>
                    <p>Jalan gegerkaling girang no 66, Bandung Barat, Jawa Barat, Indonesia 40153</p>
                    <div class="footer-map">🗺️</div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <a href="#about">About Us</a>
                    <a href="#menu">Our Menu</a>
                    <a href="#join">Join Us</a>
                    <a href="#gift">Gift Cards</a>
                    <a href="#events">Events Calendar</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 Dugg Coffee. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#privacy">Privacy Policy</a>
                    <a href="#terms">Terms of Use</a>
                </div>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Instagram">📷</a>
                    <a href="#" title="Twitter">🐦</a>
                    <a href="#" title="LinkedIn">💼</a>
                    <a href="#" title="YouTube">📺</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Menggunakan helper asset() untuk JavaScript --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>