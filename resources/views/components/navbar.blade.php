<nav
    class="fixed top-0 left-0 w-full flex items-center justify-between px-6 md:px-16 py-4 bg-[#F0F0F0] bg-opacity-50 shadow-sm z-40 transition-all duration-300">
    <div class="flex items-center space-x-2">
        <a href="{{ asset('/') }}">
            <img alt="Dugg Coffee logo" class="w-10 h-10 cursor-pointer" width="40" height="40"
                src="{{ asset('img/logo-footer.png') }}" />
        </a>
    </div>

    <div class="hidden md:flex items-center gap-6">
        <ul class="flex gap-4 font-semibold text-sm">
            <li><a class="hover:text-amber-900 hover:underline transition-colors duration-200"
                    href="{{ asset('/') }}">Home</a></li>
            <li><a class="hover:text-amber-900 hover:underline transition-colors duration-200"
                    href="{{ asset('/#about') }}">About</a></li>
            <li><a class="hover:text-amber-900 hover:underline transition-colors duration-200"
                    href="{{ asset('/#menu') }}">Menus</a></li>
            <li><a class="hover:text-amber-900 hover:underline transition-colors duration-200"
                    href="{{ asset('/news') }}">News</a></li>
            <li><a class="hover:text-amber-900 hover:underline transition-colors duration-200"
                    href="{{ asset('/#space') }}">Space & Facility</a></li>
            <li><a class="hover:text-amber-900 hover:underline transition-colors duration-200"
                    href="{{ asset('/#faq') }}">FAQ</a></li>
        </ul>
        <a href="https://gofood.link/a/F4SXGWL" target="_blank"
            class="cursor-pointer bg-transparent border-2 border-amber-900 py-2 px-6 rounded text-amber-900 font-bold hover:bg-amber-900 hover:text-white transition-colors duration-300">
            Order
        </a>
    </div>

    <div class="md:hidden">
        <button id="menu-toggle" class="focus:outline-none">
            <svg id="hamburger-icon" class="w-6 h-6 transition-transform duration-300" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="close-icon" class="w-6 h-6 hidden transition-transform duration-300" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</nav>

<div id="mobile-menu"
    class="fixed top-0 left-0 w-full h-screen bg-[#F0F0F0] bg-opacity-95 z-30 transform translate-x-full transition-transform duration-300 ease-in-out md:hidden">
    <div class="flex flex-col pt-20 px-6 pb-6">
        <ul class="flex flex-col gap-6 font-semibold text-lg">
            <li><a class="hover:text-amber-900 hover:underline block py-2 transition-colors duration-200"
                    href="{{ asset('/') }}">Home</a></li>
            <li><a class="hover:text-amber-900 hover:underline block py-2 transition-colors duration-200"
                    href="{{ asset('/#about') }}">About</a></li>
            <li><a class="hover:text-amber-900 hover:underline block py-2 transition-colors duration-200"
                    href="{{ asset('/#menu') }}">Menu</a></li>
            <li><a class="hover:text-amber-900 hover:underline block py-2 transition-colors duration-200"
                    href="{{ asset('/news') }}">News</a></li>
            <li><a class="hover:text-amber-900 hover:underline block py-2 transition-colors duration-200"
                    href="{{ asset('/#space') }}">Space & Facility</a></li>
            <li><a class="hover:text-amber-900 hover:underline block py-2 transition-colors duration-200"
                    href="{{ asset('/#faq') }}">FAQ</a></li>
        </ul>
        <button
            class="mt-8 bg-transparent border-2 border-amber-900 py-3 px-6 rounded text-amber-900 font-bold hover:bg-amber-900 hover:text-white transition-colors duration-300 w-full">
            Order
        </button>
    </div>
</div>
