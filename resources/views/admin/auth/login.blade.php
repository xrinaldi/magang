<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Dugg Coffee</title>
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
                        'cream-medium': '#F7E7B5'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-coffee-dark to-coffee-medium min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-8">
        <div class="text-center">
            <div class="mx-auto h-12 w-12 bg-cream rounded-full flex items-center justify-center">
                <i class="fas fa-coffee text-coffee-dark text-xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-white">
                Admin Login
            </h2>
            <p class="mt-2 text-sm text-cream-dark">
                Dugg Coffee Admin Dashboard
            </p>
        </div>
        
        <div class="bg-white rounded-lg shadow-xl p-8">
            <form class="space-y-6" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <div class="mt-1 relative">
                        <input id="email" 
                               name="email" 
                               type="email" 
                               autocomplete="email" 
                               required 
                               value="{{ old('email') }}"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-md focus:outline-none focus:ring-coffee-medium focus:border-coffee-medium focus:z-10 sm:text-sm @error('email') border-red-500 @enderror" 
                               placeholder="Enter your email">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 relative">
                        <input id="password" 
                               name="password" 
                               type="password" 
                               autocomplete="current-password" 
                               required 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-md focus:outline-none focus:ring-coffee-medium focus:border-coffee-medium focus:z-10 sm:text-sm @error('password') border-red-500 @enderror" 
                               placeholder="Enter your password">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" 
                               name="remember" 
                               type="checkbox" 
                               class="h-4 w-4 text-coffee-medium focus:ring-coffee-medium border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-coffee-medium hover:bg-coffee-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-coffee-medium transition duration-200">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt group-hover:text-cream-dark"></i>
                        </span>
                        Sign in to Dashboard
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-coffee-medium hover:text-coffee-dark transition duration-200">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Back to Website
                </a>
            </div>
        </div>

        <!-- Demo Credentials -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
            <h3 class="text-sm font-medium text-blue-900 mb-2">Demo Credentials</h3>
            <div class="text-xs text-blue-700 space-y-1">
                <p><strong>Email:</strong> admin@duggcoffee.com</p>
                <p><strong>Password:</strong> admin123</p>
            </div>
        </div>
    </div>
</body>
</html>