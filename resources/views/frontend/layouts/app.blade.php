<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Liturgi Angkatan Muda')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        purple: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7e22ce',
                            800: '#6b21a8',
                            900: '#581c87',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Mobile Menu Animation */
        .mobile-menu-enter {
            animation: slideDownMobile 0.3s ease-out;
        }
        
        @keyframes slideDownMobile {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Hover Effects */
        .nav-link {
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #9333ea, #c084fc);
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::before {
            width: 80%;
        }
        
        .nav-link.active::before {
            width: 80%;
        }

        /* Glassmorphism Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Logo Animation */
        .logo-hover {
            transition: transform 0.3s ease;
        }
        
        .logo-hover:hover {
            transform: scale(1.05) rotate(5deg);
        }

        /* Footer Fix */
        html, body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        body > main {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    
    <!-- Navbar -->
    <nav class="glass-effect shadow-lg sticky top-0 z-50 navbar-slide-down border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo & Brand -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        @if($settings->logo)
                            <img src="{{ $settings->logo_url }}" alt="Logo" class="h-14 w-14 rounded-full object-cover shadow-md ring-2 ring-purple-100 logo-hover">
                        @else
                            <div class="h-14 w-14 rounded-full bg-gradient-to-br from-purple-500 via-purple-600 to-purple-700 flex items-center justify-center shadow-lg logo-hover">
                                <span class="text-white font-bold text-xl">AM</span>
                            </div>
                        @endif
                        <div class="hidden md:block">
                            <h1 class="text-xl font-bold bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">
                                {{ $settings->ranting_nama }}
                            </h1>
                            <p class="text-xs text-gray-500 font-medium">Web Liturgi Angkatan Muda</p>
                        </div>
                    </a>
                </div>

            
<!-- Desktop Menu -->
<div class="hidden lg:flex items-center space-x-2">
    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('home') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Home
    </a>
    <a href="{{ route('tata-kebaktian') }}" class="nav-link {{ request()->routeIs('tata-kebaktian*') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('tata-kebaktian*') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        Tata Kebaktian
    </a>
    <a href="{{ route('informasi-am') }}" class="nav-link {{ request()->routeIs('informasi-am*') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('informasi-am*') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
        </svg>
        Informasi AM
    </a>
    
    <!-- GALERI - Desktop Version -->
    <a href="{{ route('galeri') }}" class="nav-link {{ request()->routeIs('galeri*') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('galeri*') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        Galeri
    </a>
    
    <a href="{{ route('informasi-ketua') }}" class="nav-link {{ request()->routeIs('informasi-ketua') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('informasi-ketua') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
        Ketua
    </a>
    <a href="{{ route('pengurus-ranting') }}" class="nav-link {{ request()->routeIs('pengurus-ranting') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('pengurus-ranting') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        Pengurus
    </a>
    <a href="{{ route('tentang') }}" class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }} px-4 py-2 rounded-xl text-gray-700 hover:text-purple-700 transition-all duration-300 font-medium {{ request()->routeIs('tentang') ? 'bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg shadow-purple-300' : '' }}">
        <svg class="w-4 h-4 inline-block mr-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Tentang
    </a>
</div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-purple-700 hover:text-purple-900 focus:outline-none p-2 rounded-lg hover:bg-purple-50 transition-all">
                        <svg id="menu-open-icon" class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg id="menu-close-icon" class="h-7 w-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

      <!-- Mobile Menu -->
<div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 shadow-lg mobile-menu-enter">
    <div class="px-4 py-4 space-y-2">
        <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Home</span>
            </span>
        </a>
        <a href="{{ route('tata-kebaktian') }}" class="mobile-nav-link {{ request()->routeIs('tata-kebaktian*') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span>Tata Kebaktian</span>
            </span>
        </a>
        <a href="{{ route('informasi-am') }}" class="mobile-nav-link {{ request()->routeIs('informasi-am*') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
                <span>Informasi AM</span>
            </span>
        </a>
        
        <!-- GALERI - Mobile Version -->
        <a href="{{ route('galeri') }}" class="mobile-nav-link {{ request()->routeIs('galeri*') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Galeri</span>
            </span>
        </a>
        
        <a href="{{ route('informasi-ketua') }}" class="mobile-nav-link {{ request()->routeIs('informasi-ketua') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span>Informasi Ketua</span>
            </span>
        </a>
        <a href="{{ route('pengurus-ranting') }}" class="mobile-nav-link {{ request()->routeIs('pengurus-ranting') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>Pengurus Ranting</span>
            </span>
        </a>
        <a href="{{ route('tentang') }}" class="mobile-nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Tentang Angkatan Muda</span>
            </span>
        </a>
    </div>
</div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

   <!-- Footer -->
<footer class="bg-gradient-to-br from-purple-800 via-purple-900 to-purple-950 text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-8">
            <!-- About Section -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    @if($settings->logo)
                        <img src="{{ $settings->logo_url }}" alt="Logo" class="h-12 w-12 rounded-full object-cover ring-2 ring-purple-400">
                    @else
                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">AM</span>
                        </div>
                    @endif
                    <h3 class="text-xl font-bold">{{ $settings->ranting_nama }}</h3>
                </div>
                <p class="text-purple-200 text-sm leading-relaxed">
                    Web Liturgi Angkatan Muda - Melayani dengan Hati, Membangun dengan Iman untuk masa depan yang lebih baik.
                </p>
                
                <!-- Social Media Links -->
                <div class="flex space-x-3">
                    @if($settings->facebook)
                        <a href="{{ $settings->facebook_url }}" target="_blank" class="w-10 h-10 bg-purple-700 hover:bg-purple-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group relative">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                Facebook
                            </span>
                        </a>
                    @endif
                    
                    @if($settings->instagram)
                        <a href="{{ $settings->instagram_url }}" target="_blank" class="w-10 h-10 bg-purple-700 hover:bg-purple-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group relative">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                Instagram
                            </span>
                        </a>
                    @endif
                    
                    @if($settings->whatsapp)
                        <a href="{{ $settings->whatsapp_url }}" target="_blank" class="w-10 h-10 bg-purple-700 hover:bg-purple-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group relative">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                WhatsApp
                            </span>
                        </a>
                    @endif
                    
                    @if($settings->tiktok)
                        <a href="{{ $settings->tiktok_url }}" target="_blank" class="w-10 h-10 bg-purple-700 hover:bg-purple-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group relative">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            </svg>
                            <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                TikTok
                            </span>
                        </a>
                    @endif
                    
                    <!-- Fallback jika tidak ada sosial media -->
                    @if(!$settings->hasAnySocialMedia())
                        <div class="text-purple-300 text-sm">
                            Tidak ada sosial media yang terhubung
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold mb-4">Menu Cepat</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tata-kebaktian') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Tata Kebaktian
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengurus-ranting') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Pengurus
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tentang') }}" class="text-purple-200 hover:text-white transition-colors duration-300 flex items-center group">
                            <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            Tentang Kami
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-purple-300 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="text-purple-200 text-sm leading-relaxed">
                            Untuk informasi lebih lanjut, silakan hubungi pengurus ranting Angkatan Muda.
                        </p>
                    </div>
                    @if($settings->whatsapp)
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-purple-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="{{ $settings->whatsapp_url }}" target="_blank" class="text-purple-200 hover:text-white text-sm transition-colors">
                                {{ $settings->whatsapp }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-purple-700/50 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-purple-200 text-sm text-center md:text-left">
                    &copy; {{ date('Y') }}. KKN Informatika Ak 64 All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-purple-200 hover:text-white transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="text-purple-200 hover:text-white transition-colors duration-300">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>
    <style>
        .mobile-nav-link {
            @apply block px-4 py-3 rounded-xl text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-purple-100 hover:text-purple-700 transition-all duration-300 font-medium;
        }
        .mobile-nav-link.active {
            @apply bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg;
        }
    </style>

    <script>
        // Mobile Menu Toggle with Animation
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            }
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('#mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            });
        });

        // Add scroll effect to navbar
        let lastScroll = 0;
        const navbar = document.querySelector('nav');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll <= 0) {
                navbar.classList.remove('shadow-xl');
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.classList.add('shadow-xl');
            }
            
            lastScroll = currentScroll;
        });
    </script>
</body>
</html>