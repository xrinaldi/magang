<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Dugg Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'coffee-dark': '#4B3C2F',
                        'coffee-medium': '#4E3D33',
                        'coffee-light': '#653318',
                        'cream': '#FFF8E1',
                        'cream-dark': '#FBEAB3',
                        'cream-medium': '#F7E7B5',
                        'cream-light': '#FCECB9'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col">
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-coffee-dark">
                <div class="flex items-center flex-shrink-0 px-4">
                    <h2 class="text-xl font-bold text-white">Dugg Coffee Admin</h2>
                </div>
                <div class="mt-8">
                    <nav class="flex-1 px-2 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-white hover:bg-coffee-light {{ request()->routeIs('admin.dashboard') ? 'bg-coffee-light' : '' }}">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.news.index') }}" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-white hover:bg-coffee-light {{ request()->routeIs('admin.news.*') ? 'bg-coffee-light' : '' }}">
                            <i class="fas fa-newspaper mr-3"></i>
                            Kelola Berita
                        </a>
                        <a href="{{ url('/') }}" target="_blank"
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-white hover:bg-coffee-light">
                            <i class="fas fa-external-link-alt mr-3"></i>
                            Lihat Website
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button class="md:hidden text-gray-500 focus:outline-none" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="ml-3 text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Halo, {{ Auth::guard('admin')->user()->name }}</span>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-200">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar" class="fixed inset-0 z-50 hidden md:hidden">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" onclick="toggleSidebar()"></div>
        <div class="relative flex-1 flex flex-col max-w-xs w-full bg-coffee-dark">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button class="ml-3 h-10 w-10 rounded-full flex items-center justify-center text-white" onclick="toggleSidebar()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <h2 class="text-xl font-bold text-white">Dugg Coffee Admin</h2>
                </div>
                <nav class="mt-5 px-2 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white hover:bg-coffee-light">
                        <i class="fas fa-tachometer-alt mr-4"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.news.index') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white hover:bg-coffee-light">
                        <i class="fas fa-newspaper mr-4"></i>
                        Kelola Berita
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>
</body>
</html>