<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Dugg Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'roboto', sans-serif;
        }

        footer {
            background-color: #F7E7B5;
        }

        footer h4 {
            color: #5B4B3A;
        }

        footer a {
            color: #5B4B3A;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900">
    <header class="relative">
        @include('components.navbar')
    </header>
    @yield('content')
    @include('components.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuLink = document.getElementById("menu-link");
            const menuModal = document.getElementById("menu-modal");
            const modalClose = document.getElementById("modal-close");

            if (menuLink) {
                menuLink.addEventListener("click", () => {
                    menuModal.classList.remove("hidden");
                });
            }

            if (modalClose) {
                modalClose.addEventListener("click", () => {
                    menuModal.classList.add("hidden");
                });
            }

            const filterButtons = document.querySelectorAll(".filter-btn");
            const menuItems = document.querySelectorAll(".menu-item");

            filterButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    filterButtons.forEach((b) => b.classList.remove("bg-[#653318]",
                        "text-[#FCECB9]"));
                    btn.classList.add("bg-[#653318]", "text-[#FCECB9]");
                    const filter = btn.getAttribute("data-filter");
                    menuItems.forEach((item) => {
                        if (item.getAttribute("data-category") === filter) {
                            item.classList.remove("hidden");
                        } else {
                            item.classList.add("hidden");
                        }
                    });
                });
            });

            if (filterButtons.length > 0) {
                filterButtons[0].click();
            }

            menuItems.forEach((item) => {
                item.addEventListener("click", () => {
                    const name = item.getAttribute("data-name");
                    const price = item.getAttribute("data-price");
                    const desc = item.getAttribute("data-desc");
                    const img = item.getAttribute("data-img");
                    document.getElementById("modal-name").textContent = name;
                    document.getElementById("modal-price").textContent = price;
                    document.getElementById("modal-desc").textContent = desc;
                    const modalImg = document.getElementById("modal-img");
                    modalImg.src = img;
                    modalImg.alt = name + " image";
                    menuModal.classList.remove("hidden");
                });
            });

            document.querySelectorAll('section.max-w-5xl button').forEach(button => {
                button.addEventListener('click', () => {
                    const expanded = button.getAttribute('aria-expanded') === 'true';
                    const controls = button.getAttribute('aria-controls');
                    const icon = button.querySelector('i.fas');
                    const content = document.getElementById(controls);

                    document.querySelectorAll('section.max-w-5xl div[role="region"]').forEach(
                        div => {
                            if (div.id !== controls) {
                                div.classList.add('hidden');
                                const btn = document.getElementById(div.getAttribute(
                                    'aria-labelledby'));
                                btn.setAttribute('aria-expanded', 'false');
                                const btnIcon = btn.querySelector('i.fas');
                                btnIcon.classList.remove('rotate-90');
                            }
                        });

                    if (expanded) {
                        button.setAttribute('aria-expanded', 'false');
                        content.classList.add('hidden');
                        icon.classList.remove('rotate-90');
                    } else {
                        button.setAttribute('aria-expanded', 'true');
                        content.classList.remove('hidden');
                        icon.classList.add('rotate-90');
                    }
                });
            });
        });
    </script>
</body>

</html>
