const menuItems = {
    beverages: [
        {
            name: 'Espresso',
            price: 'Rp 15.000',
            desc: 'Espresso yang ditambahkan air panas, memberikan rasa kopi yang lebih ringan namun tetap bold.',
            img: 'img/item-menus/espresso.png',
        },
        {
            name: 'Americano',
            price: 'Rp 18.000',
            desc: 'Kopi hitam dengan rasa lebih tajam dari Americano, cocok bagi pencinta kopi tanpa ampas.',
            img: 'img/item-menus/americano.png',
        },
        {
            name: 'Long Black',
            price: 'Rp 20.000',
            desc: 'Kopi hitam dengan rasa lebih tajam dari Americano, cocok bagi pencinta kopi tanpa ampas.',
            img: 'img/item-menus/long-black.png',
        },
        {
            name: 'Manual Brew',
            price: 'Rp 22.000',
            desc: 'Kopi diseduh manual seperti V60 atau French Press, menonjolkan cita rasa asli biji kopi.',
            img: 'img/item-menus/manual-brew.png',
        },
        {
            name: 'Latte',
            price: 'Rp 20.000',
            desc: 'Kopi espresso dengan campuran susu steamed, lembut dan creamy di setiap tegukan.',
            img: 'img/item-menus/latte.png',
        },
        {
            name: 'Vanilla Latte',
            price: 'Rp 22.000',
            desc: 'Latte klasik yang diberi sentuhan vanilla, menambah rasa manis dan harum yang menenangkan.',
            img: 'img/item-menus/vanilla-latte.png',
        },
    ],
    seasonal: [
        {
            name: 'Mont Blanc',
            price: 'Rp 30.000',
            desc: 'Menu spesial musiman dengan krim kastanye dan topping whipped.',
            img: 'https://storage.googleapis.com/a1aa/image/531b2584-03ef-4367-0945-d77afed9a6f2.jpg',
        },
        {
            name: 'Matcha Strawberry',
            price: 'Rp 28.000',
            desc: 'Minuman matcha musiman dengan rasa stroberi segar.',
            img: 'https://storage.googleapis.com/a1aa/image/4f398134-8c5e-4f85-d591-250e51d5d9eb.jpg',
        },
    ],
    signature: [
        {
            name: 'Chocolate',
            price: 'Rp 25.000',
            desc: 'Minuman cokelat kaya dengan tekstur krim.',
            img: 'https://storage.googleapis.com/a1aa/image/21f435e9-ba5a-4a66-2bcc-1e45d73cdc19.jpg',
        },
        {
            name: 'Choco Strawberry',
            price: 'Rp 27.000',
            desc: 'Minuman cokelat dengan rasa stroberi segar.',
            img: 'https://storage.googleapis.com/a1aa/image/51877faa-aad4-440e-0b48-349f151372dd.jpg',
        },
        {
            name: 'Matcha',
            price: 'Rp 28.000',
            desc: 'Minuman matcha signature dengan susu krim.',
            img: 'https://storage.googleapis.com/a1aa/image/199488ed-37ba-43a4-2a0b-1ec739705051.jpg',
        },
        {
            name: 'Charcoal',
            price: 'Rp 26.000',
            desc: 'Minuman charcoal yang unik dengan rasa asap.',
            img: 'https://storage.googleapis.com/a1aa/image/80c843f2-cb43-4ad9-aecd-8e77188c66b5.jpg',
        },
        {
            name: 'Aren Milk',
            price: 'Rp 24.000',
            desc: 'Minuman susu aren palm yang manis.',
            img: 'https://storage.googleapis.com/a1aa/image/788538d3-989f-4d1a-a161-ce5b1503c53e.jpg',
        },
    ],
    shareable: [
        {
            name: 'French Fries',
            price: 'Rp 15.000',
            desc: 'French fries yang crispy dan keemasan.',
            img: 'https://storage.googleapis.com/a1aa/image/ad487637-a402-4e03-6006-fafcdee755ab.jpg',
        },
        {
            name: 'Fries n Sausage',
            price: 'Rp 20.000',
            desc: 'French fries disajikan dengan sosis.',
            img: 'https://storage.googleapis.com/a1aa/image/de1c2ad2-c10a-43da-8195-e9e03f27a8de.jpg',
        },
        {
            name: 'Cireng',
            price: 'Rp 18.000',
            desc: 'Snack cireng yang crispy dan lezat.',
            img: 'https://storage.googleapis.com/a1aa/image/fa46e6d4-ec88-4500-5866-88b92444f720.jpg',
        },
        {
            name: 'Tahu Lada Goreng',
            price: 'Rp 17.000',
            desc: 'Tahu goreng yang crispy dengan saus lada pedas.',
            img: 'https://storage.googleapis.com/a1aa/image/42596c75-ce8a-405e-1ccb-b734e01a13a1.jpg',
        },
    ],
    maincourse: [
        {
            name: 'Beef Slice Rice Bowl',
            price: 'Rp 40.000',
            desc: 'Makanan rice bowl dengan irisan daging sapi dan sayuran.',
            img: 'https://storage.googleapis.com/a1aa/image/d0014ce0-c4a3-4e68-3684-264fbd61a3da.jpg',
        },
        {
            name: 'Chicken Pop Rice Bowl',
            price: 'Rp 38.000',
            desc: 'Makanan rice bowl dengan chicken pop crispy dan sayuran.',
            img: 'https://storage.googleapis.com/a1aa/image/c56c29b8-5328-45ef-972e-103686580ecf.jpg',
        },
        {
            name: 'Indomie Goreng/Kuah + Telur',
            price: 'Rp 25.000',
            desc: 'Indomie goreng atau kuah disajikan dengan telur.',
            img: 'https://storage.googleapis.com/a1aa/image/ab386119-3cb6-4345-a66f-e57a25cfd3b5.jpg',
        },
        {
            name: 'Indomie Goreng Saus Keju',
            price: 'Rp 27.000',
            desc: 'Indomie goreng dengan saus keju.',
            img: 'https://storage.googleapis.com/a1aa/image/356d8a2f-4515-4c2e-fb69-f54579387253.jpg',
        },
        {
            name: 'Indomie Goreng Creamy',
            price: 'Rp 28.000',
            desc: 'Indomie goreng dengan saus creamy.',
            img: 'https://storage.googleapis.com/a1aa/image/b0cc7203-baab-4eaa-802f-1c887c3e4b4b.jpg',
        },
    ],
};

let products = [];
let currentId = 1;

for (const category in menuItems) {
    menuItems[category].forEach(item => {
        const priceNumeric = parseInt(item.price.replace(/[^0-9]/g, ''));
        products.push({
            id: currentId++,
            category: category,
            name: item.name,
            description: item.desc,
            price: priceNumeric,
            image: item.img,
        });
    });
}

const menuSectionsDiv = document.getElementById('menu-sections');
const cartItemsDiv = document.getElementById('cart-items');
const emptyCartMessage = document.getElementById('empty-cart-message');
const cartTotalSpan = document.getElementById('cart-total');
const clearCartBtn = document.getElementById('clear-cart-btn');
const notificationDiv = document.getElementById('notification');
const notificationMessageSpan = document.getElementById('notification-message');

let cart = JSON.parse(localStorage.getItem('cart')) || [];

function formatCurrency(amount) {
    return 'Rp ' + amount.toLocaleString('id-ID');
}

function showNotification(message) {
    notificationMessageSpan.textContent = message;
    notificationDiv.classList.remove('opacity-0', 'translate-y-[-20px]');
    notificationDiv.classList.add('opacity-100', 'translate-y-0');

    setTimeout(() => {
        notificationDiv.classList.remove('opacity-100', 'translate-y-0');
        notificationDiv.classList.add('opacity-0', 'translate-y-[-20px]');
    }, 3000);
}

function renderProducts() {
    menuSectionsDiv.innerHTML = '';

    const productsByCategory = products.reduce((acc, product) => {
        (acc[product.category] = acc[product.category] || []).push(product);
        return acc;
    }, {});

    for (const category in productsByCategory) {
        const categorySectionHtml = `
                    <h2 class="text-3xl font-bold mb-6 text-orange-600">${category}</h2>
                    <div id="product-list-${category.replace(/\s+/g, '-')}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-10">
                    </div>
                `;
        menuSectionsDiv.insertAdjacentHTML('beforeend', categorySectionHtml);

        const productListForCategory = document.getElementById(`product-list-${category.replace(/\s+/g, '-')}`);
        productsByCategory[category].forEach(product => {
            const productCard = `
                        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <h3 class="text-xl font-semibold mb-2 text-gray-800">${product.name}</h3>
                                <p class="text-gray-600 text-sm mb-3 h-16 overflow-hidden">${product.description}</p>
                                <p class="text-lg font-bold text-orange-600 mb-4">${formatCurrency(product.price)}</p>
                                <button
                                    class="add-to-cart-btn bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded w-full transition duration-300 ease-in-out"
                                    data-product-id="${product.id}"
                                    data-product-name="${product.name}"
                                    data-product-price="${product.price}"
                                    data-product-image="${product.image}"
                                >
                                    Tambahkan ke Keranjang
                                </button>
                            </div>
                        </div>
                    `;
            productListForCategory.insertAdjacentHTML('beforeend', productCard);
        });
    }

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', addToCart);
    });
}

function addToCart(event) {
    const productId = parseInt(event.target.dataset.productId);
    const productName = event.target.dataset.productName;
    const productPrice = parseFloat(event.target.dataset.productPrice);
    const productImage = event.target.dataset.productImage;

    const existingItem = cart.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            quantity: 1
        });
    }

    saveCart();
    renderCart();
    showNotification(`"${productName}" berhasil ditambahkan ke keranjang!`);
}

function renderCart() {
    cartItemsDiv.innerHTML = '';
    if (cart.length === 0) {
        emptyCartMessage.classList.remove('hidden');
        emptyCartMessage.classList.add('block');
    } else {
        emptyCartMessage.classList.add('hidden');
        cart.forEach(item => {
            const cartItemHtml = `
                        <div class="flex items-center justify-between bg-yellow-100 p-4 rounded-lg shadow-sm mb-3">
                            <div class="flex items-center">
                                <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-md mr-4">
                                <div>
                                    <h4 class="font-semibold text-lg text-gray-800">${item.name}</h4>
                                    <p class="text-gray-600 text-sm">${formatCurrency(item.price)} x ${item.quantity}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-lg text-orange-700 w-24 text-right">${formatCurrency(item.price * item.quantity)}</span>
                                <button class="update-quantity-btn bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-full text-sm w-8 h-8 flex items-center justify-center transition duration-200" data-id="${item.id}" data-action="decrease">-</button>
                                <span class="font-medium w-6 text-center">${item.quantity}</span>
                                <button class="update-quantity-btn bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-full text-sm w-8 h-8 flex items-center justify-center transition duration-200" data-id="${item.id}" data-action="increase">+</button>
                                <button class="remove-from-cart-btn bg-red-500 hover:bg-red-600 text-white p-2 rounded-full text-sm w-8 h-8 flex items-center justify-center transition duration-200" data-id="${item.id}">X</button>
                            </div>
                        </div>
                    `;
            cartItemsDiv.insertAdjacentHTML('beforeend', cartItemHtml);
        });

        document.querySelectorAll('.update-quantity-btn').forEach(button => {
            button.addEventListener('click', updateQuantity);
        });
        document.querySelectorAll('.remove-from-cart-btn').forEach(button => {
            button.addEventListener('click', removeFromCart);
        });
    }
    updateCartTotal();
}

function updateQuantity(event) {
    const productId = parseInt(event.target.dataset.id);
    const action = event.target.dataset.action;

    const itemIndex = cart.findIndex(item => item.id === productId);

    if (itemIndex > -1) {
        if (action === 'increase') {
            cart[itemIndex].quantity++;
            showNotification(`Kuantitas "${cart[itemIndex].name}" ditambah.`);
        } else if (action === 'decrease') {
            cart[itemIndex].quantity--;
            if (cart[itemIndex].quantity <= 0) {
                const removedItemName = cart[itemIndex].name;
                cart.splice(itemIndex, 1);
                showNotification(`"${removedItemName}" dihapus dari keranjang.`);
            } else {
                showNotification(`Kuantitas "${cart[itemIndex].name}" dikurangi.`);
            }
        }
        saveCart();
        renderCart();
    }
}

function removeFromCart(event) {
    const productId = parseInt(event.target.dataset.id);
    const itemToRemove = cart.find(item => item.id === productId);
    if (confirm(`Apakah Anda yakin ingin menghapus "${itemToRemove.name}" dari keranjang?`)) {
        cart = cart.filter(item => item.id !== productId);
        saveCart();
        renderCart();
        showNotification(`"${itemToRemove.name}" dihapus dari keranjang.`);
    }
}

function updateCartTotal() {
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    cartTotalSpan.textContent = formatCurrency(total);
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function clearCart() {
    if (confirm('Apakah Anda yakin ingin mengosongkan seluruh keranjang?')) {
        cart = [];
        saveCart();
        renderCart();
        showNotification('Keranjang berhasil dikosongkan!');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    renderProducts();
    renderCart();
});

clearCartBtn.addEventListener('click', clearCart);