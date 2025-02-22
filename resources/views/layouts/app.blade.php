<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIBOOKSTORE - @yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex flex-col font-['Poppins']">
    <!-- Navbar with gradient and glass effect -->
    <nav class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg sticky top-0 z-50 backdrop-blur-sm bg-opacity-90">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                        UNIBOOKSTORE
                    </span>
                </a>
                <div class="flex space-x-8">
                    <a href="{{ route('home') }}" 
                       class="hover:text-blue-200 transition-colors duration-200 py-2 px-3 rounded-lg hover:bg-white/10 
                       {{ request()->routeIs('home') ? 'font-semibold bg-white/20' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('admin.index') }}" 
                       class="hover:text-blue-200 transition-colors duration-200 py-2 px-3 rounded-lg hover:bg-white/10
                       {{ request()->routeIs('admin.*') ? 'font-semibold bg-white/20' : '' }}">
                        Admin
                    </a>
                    <a href="{{ route('pengadaan.index') }}" 
                       class="hover:text-blue-200 transition-colors duration-200 py-2 px-3 rounded-lg hover:bg-white/10
                       {{ request()->routeIs('pengadaan.*') ? 'font-semibold bg-white/20' : '' }}">
                        Pengadaan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content with improved spacing and shadows -->
    <div class="container mx-auto px-6 py-8 flex-grow">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-6 animate-fade-in-down" role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-6 animate-fade-in-down" role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-md p-6 backdrop-blur-sm bg-opacity-90">
            @yield('content')
        </div>
    </div>

    <!-- Footer with gradient and improved design -->
    <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white py-8 mt-auto">
        <div class="container mx-auto px-6">
            <div class="flex flex-col items-center justify-center space-y-4">
                <div class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-200">
                    UNIBOOKSTORE
                </div>
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} UNIBOOKSTORE. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>