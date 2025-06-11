@extends('index')
@section('content')
    <div class="pt-20"/>
    <div class="container mx-auto bg-gray-100 rounded-xl shadow-lg p-8">
        <h1 class="text-5xl font-extrabold mb-12 text-center text-amber-700">Order Makanan & Minuman</h1>
        <!-- Menu Items Display -->
        <div id="menu-sections" class="mb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="menu-items">
                @php
                    $menuItems = [
                        'beverages' => [
                            [
                                'name' => 'Espresso',
                                'price' => 15000,
                                'price_display' => 'Rp 15.000',
                                'desc' => 'Espresso yang ditambahkan air panas, memberikan rasa kopi yang lebih ringan namun tetap bold.',
                                'img' => 'img/item-menus/espresso.png',
                            ],
                            [
                                'name' => 'Americano',
                                'price' => 18000,
                                'price_display' => 'Rp 18.000',
                                'desc' => 'Kopi hitam dengan rasa lebih tajam dari Americano, cocok bagi pencinta kopi tanpa ampas.',
                                'img' => 'img/item-menus/americano.png',
                            ],
                            [
                                'name' => 'Long Black',
                                'price' => 20000,
                                'price_display' => 'Rp 20.000',
                                'desc' => 'Kopi hitam dengan rasa lebih tajam dari Americano, cocok bagi pencinta kopi tanpa ampas.',
                                'img' => 'img/item-menus/long-black.png',
                            ],
                            [
                                'name' => 'Manual Brew',
                                'price' => 22000,
                                'price_display' => 'Rp 22.000',
                                'desc' => 'Kopi diseduh manual seperti V60 atau French Press, menonjolkan cita rasa asli biji kopi.',
                                'img' => 'img/item-menus/manual-brew.png',
                            ],
                            [
                                'name' => 'Latte',
                                'price' => 20000,
                                'price_display' => 'Rp 20.000',
                                'desc' => 'Kopi espresso dengan campuran susu steamed, lembut dan creamy di setiap tegukan.',
                                'img' => 'img/item-menus/latte.png',
                            ],
                            [
                                'name' => 'Vanilla Latte',
                                'price' => 22000,
                                'price_display' => 'Rp 22.000',
                                'desc' => 'Latte klasik yang diberi sentuhan vanilla, menambah rasa manis dan harum yang menenangkan.',
                                'img' => 'img/item-menus/vanilla-latte.png',
                            ],
                        ],
                        'seasonal' => [
                            [
                                'name' => 'Mont Blanc',
                                'price' => 30000,
                                'price_display' => 'Rp 30.000',
                                'desc' => 'Menu spesial musiman dengan krim kastanye dan topping whipped.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/531b2584-03ef-4367-0945-d77afed9a6f2.jpg',
                            ],
                            [
                                'name' => 'Matcha Strawberry',
                                'price' => 28000,
                                'price_display' => 'Rp 28.000',
                                'desc' => 'Minuman matcha musiman dengan rasa stroberi segar.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/4f398134-8c5e-4f85-d591-250e51d5d9eb.jpg',
                            ],
                        ],
                        'signature' => [
                            [
                                'name' => 'Chocolate',
                                'price' => 25000,
                                'price_display' => 'Rp 25.000',
                                'desc' => 'Minuman cokelat kaya dengan tekstur krim.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/21f435e9-ba5a-4a66-2bcc-1e45d73cdc19.jpg',
                            ],
                            [
                                'name' => 'Choco Strawberry',
                                'price' => 27000,
                                'price_display' => 'Rp 27.000',
                                'desc' => 'Minuman cokelat dengan rasa stroberi segar.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/51877faa-aad4-440e-0b48-349f151372dd.jpg',
                            ],
                            [
                                'name' => 'Matcha',
                                'price' => 28000,
                                'price_display' => 'Rp 28.000',
                                'desc' => 'Minuman matcha signature dengan susu krim.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/199488ed-37ba-43a4-2a0b-1ec739705051.jpg',
                            ],
                            [
                                'name' => 'Charcoal',
                                'price' => 26000,
                                'price_display' => 'Rp 26.000',
                                'desc' => 'Minuman charcoal yang unik dengan rasa asap.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/80c843f2-cb43-4ad9-aecd-8e77188c66b5.jpg',
                            ],
                            [
                                'name' => 'Aren Milk',
                                'price' => 24000,
                                'price_display' => 'Rp 24.000',
                                'desc' => 'Minuman susu aren palm yang manis.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/788538d3-989f-4d1a-a161-ce5b1503c53e.jpg',
                            ],
                        ],
                        'shareable' => [
                            [
                                'name' => 'French Fries',
                                'price' => 15000,
                                'price_display' => 'Rp 15.000',
                                'desc' => 'French fries yang crispy dan keemasan.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/ad487637-a402-4e03-6006-fafcdee755ab.jpg',
                            ],
                            [
                                'name' => 'Fries n Sausage',
                                'price' => 20000,
                                'price_display' => 'Rp 20.000',
                                'desc' => 'French fries disajikan dengan sosis.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/de1c2ad2-c10a-43da-8195-e9e03f27a8de.jpg',
                            ],
                            [
                                'name' => 'Cireng',
                                'price' => 18000,
                                'price_display' => 'Rp 18.000',
                                'desc' => 'Snack cireng yang crispy dan lezat.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/fa46e6d4-ec88-4500-5866-88b92444f720.jpg',
                            ],
                            [
                                'name' => 'Tahu Lada Goreng',
                                'price' => 17000,
                                'price_display' => 'Rp 17.000',
                                'desc' => 'Tahu goreng yang crispy dengan saus lada pedas.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/42596c75-ce8a-405e-1ccb-b734e01a13a1.jpg',
                            ],
                        ],
                        'maincourse' => [
                            [
                                'name' => 'Beef Slice Rice Bowl',
                                'price' => 40000,
                                'price_display' => 'Rp 40.000',
                                'desc' => 'Makanan rice bowl dengan irisan daging sapi dan sayuran.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/d0014ce0-c4a3-4e68-3684-264fbd61a3da.jpg',
                            ],
                            [
                                'name' => 'Chicken Pop Rice Bowl',
                                'price' => 38000,
                                'price_display' => 'Rp 38.000',
                                'desc' => 'Makanan rice bowl dengan chicken pop crispy dan sayuran.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/c56c29b8-5328-45ef-972e-103686580ecf.jpg',
                            ],
                            [
                                'name' => 'Indomie Goreng/Kuah + Telur',
                                'price' => 25000,
                                'price_display' => 'Rp 25.000',
                                'desc' => 'Indomie goreng atau kuah disajikan dengan telur.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/ab386119-3cb6-4345-a66f-e57a25cfd3b5.jpg',
                            ],
                            [
                                'name' => 'Indomie Goreng Saus Keju',
                                'price' => 27000,
                                'price_display' => 'Rp 27.000',
                                'desc' => 'Indomie goreng dengan saus keju.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/356d8a2f-4515-4c2e-fb69-f54579387253.jpg',
                            ],
                            [
                                'name' => 'Indomie Goreng Creamy',
                                'price' => 28000,
                                'price_display' => 'Rp 28.000',
                                'desc' => 'Indomie goreng dengan saus creamy.',
                                'img' => 'https://storage.googleapis.com/a1aa/image/b0cc7203-baab-4eaa-802f-1c887c3e4b4b.jpg',
                            ],
                        ],
                    ];
                @endphp
                @foreach ($menuItems as $category => $items)
                    @foreach ($items as $item)
                        <div class="menu-item {{ $category !== 'beverages' ? 'hidden' : '' }} bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl hover:scale-105"
                            data-category="{{ $category }}">
                            <div class="relative mb-4">
                                <img src="{{ asset($item['img']) }}" alt="{{ $item['name'] }} image"
                                    class="w-full h-48 rounded-lg object-cover" />
                            </div>
                            <div class="text-center">
                                <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $item['name'] }}</h3>
                                <p class="text-2xl font-bold text-amber-600 mb-3">{{ $item['price_display'] }}</p>
                                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $item['desc'] }}</p>
                                <button class="add-to-cart-btn w-full mt-4 bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105"
                                    data-name="{{ $item['name'] }}" 
                                    data-price="{{ $item['price'] }}" 
                                    data-price-display="{{ $item['price_display'] }}"
                                    data-img="{{ asset($item['img']) }}">
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <hr class="my-12 border-amber-300">

        <!-- Shopping Cart Section -->
        <div class="mt-10">
            <h2 class="text-3xl font-bold mb-6 text-amber-600">Keranjang Belanja Kamu</h2>
            <div id="cart-items"
                class="bg-yellow-50 rounded-lg shadow-inner p-6 min-h-[100px] flex flex-col justify-center items-center">
                <p id="empty-cart-message" class="text-gray-500 text-center text-lg italic">Keranjangmu masih kosong. Ayo
                    pilih menu!</p>
            </div>
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center bg-amber-100 p-4 rounded-lg shadow-md">
                <p class="text-3xl font-bold text-amber-700 mb-4 md:mb-0">Total: <span id="cart-total">Rp 0</span></p>
                <div class="flex gap-4">
                    <button id="clear-cart-btn"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Bersihkan Keranjang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div id="notification"
        class="fixed top-5 right-5 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300 ease-out transform translate-y-[-20px] opacity-0">
        <span id="notification-message"></span>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cart = {};
            // Add to cart functionality
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const price = parseInt(this.getAttribute('data-price'));
                    const priceDisplay = this.getAttribute('data-price-display');
                    const img = this.getAttribute('data-img');

                    if (cart[name]) {
                        cart[name].quantity += 1;
                    } else {
                        cart[name] = {
                            name: name,
                            price: price,
                            priceDisplay: priceDisplay,
                            img: img,
                            quantity: 1
                        };
                    }
                    updateCartDisplay();
                    showNotification(`${name} ditambahkan ke keranjang!`);
                });
            });
            // Clear cart functionality
            document.getElementById('clear-cart-btn').addEventListener('click', function() {
                cart = {};
                updateCartDisplay();
                showNotification('Keranjang telah dikosongkan!', 'info');
            });
            function updateCartDisplay() {
                console.log('Updating cart display...'); // Debug log
                console.log('Current cart:', cart); // Debug log
                
                const cartItemsContainer = document.getElementById('cart-items');
                const emptyMessage = document.getElementById('empty-cart-message');
                const cartTotal = document.getElementById('cart-total');
                const checkoutBtn = document.getElementById('checkout-btn');

                if (Object.keys(cart).length === 0) {
                    console.log('Cart is empty, hiding checkout button'); // Debug log
                    emptyMessage.style.display = 'block';
                    cartTotal.textContent = 'Rp 0';
                    checkoutBtn.style.display = 'none';
                    cartItemsContainer.innerHTML = '<p id="empty-cart-message" class="text-gray-500 text-center text-lg italic">Keranjangmu masih kosong. Ayo pilih menu!</p>';
                    return;
                }

                console.log('Cart has items, showing checkout button'); // Debug log
                emptyMessage.style.display = 'none';
                checkoutBtn.style.display = 'inline-block';

                let cartHTML = '';
                let total = 0;

                Object.values(cart).forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    cartHTML += `
                        <div class="flex items-center justify-between bg-white rounded-lg p-4 mb-4 shadow-md">
                            <div class="flex items-center gap-4">
                                <img src="${item.img}" alt="${item.name}" class="w-16 h-16 rounded-lg object-cover">
                                <div>
                                    <h4 class="font-bold text-lg">${item.name}</h4>
                                    <p class="text-amber-600">${item.priceDisplay}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-2">
                                    <button class="cart-quantity-btn bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-1 px-3 rounded-full" 
                                            data-action="decrease" data-item="${item.name}">-</button>
                                    <span class="font-bold text-lg px-3">${item.quantity}</span>
                                    <button class="cart-quantity-btn bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-1 px-3 rounded-full" 
                                            data-action="increase" data-item="${item.name}">+</button>
                                </div>
                                <p class="font-bold text-lg text-amber-600">Rp ${itemTotal.toLocaleString('id-ID')}</p>
                                <button class="remove-item-btn bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg" 
                                        data-item="${item.name}">Hapus</button>
                            </div>
                        </div>
                    `;
                });

                cartItemsContainer.innerHTML = cartHTML;
                cartTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;

                // Add event listeners for cart quantity buttons
                document.querySelectorAll('.cart-quantity-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const action = this.getAttribute('data-action');
                        const itemName = this.getAttribute('data-item');

                        if (action === 'increase') {
                            cart[itemName].quantity++;
                        } else if (action === 'decrease') {
                            cart[itemName].quantity--;
                            if (cart[itemName].quantity <= 0) {
                                delete cart[itemName];
                                showNotification(`${itemName} dihapus dari keranjang!`, 'info');
                            }
                        }

                        updateCartDisplay();
                    });
                });

                // Add event listeners for remove buttons
                document.querySelectorAll('.remove-item-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const itemName = this.getAttribute('data-item');
                        delete cart[itemName];
                        updateCartDisplay();
                        showNotification(`${itemName} dihapus dari keranjang!`, 'info');
                    });
                });
            }

            function showNotification(message, type = 'success') {
                const notification = document.getElementById('notification');
                const notificationMessage = document.getElementById('notification-message');
                
                notificationMessage.textContent = message;
                
                // Set notification color based on type
                notification.classList.remove('bg-green-500', 'bg-red-500', 'bg-blue-500');
                switch(type) {
                    case 'error':
                        notification.classList.add('bg-red-500');
                        break;
                    case 'info':
                        notification.classList.add('bg-blue-500');
                        break;
                    default:
                        notification.classList.add('bg-green-500');
                }
                
                // Show notification
                notification.classList.remove('opacity-0', 'translate-y-[-20px]');
                notification.classList.add('opacity-100', 'translate-y-0');
                
                // Hide notification after 3 seconds
                setTimeout(() => {
                    notification.classList.remove('opacity-100', 'translate-y-0');
                    notification.classList.add('opacity-0', 'translate-y-[-20px]');
                }, 3000);
            }
        });
    </script>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection