@extends('frontend.layouts.app')

@section('title', 'Galeri - ' . $settings->ranting_nama)

@section('content')
    <!-- Hero Section dengan Banner -->
    <section class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-purple-900 text-white overflow-hidden">
        @if($settings->banner_desa)
            <div class="absolute inset-0 opacity-20 parallax-bg">
                <img src="{{ $settings->banner_url }}" alt="Banner" class="w-full h-full object-cover">
            </div>
        @endif
        
        <!-- Animated Background Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 animate-slide-up" style="animation-delay: 0.1s">
                    Galeri Kegiatan
                </h1>
                <div class="w-24 h-1 bg-purple-300 mx-auto mb-6 rounded-full animate-expand"></div>
                <p class="text-lg md:text-xl text-purple-100 mb-6 max-w-3xl mx-auto animate-slide-up" style="animation-delay: 0.3s">
                    Dokumentasi visual berbagai kegiatan dan momen berharga Angkatan Muda
                </p>
                <div class="animate-slide-up" style="animation-delay: 0.5s">
                    <a href="#gallery-content" class="inline-flex items-center px-6 py-3 bg-white text-purple-700 font-semibold rounded-full hover:bg-purple-50 transition-all shadow-lg hover:shadow-xl hover-lift group">
                        Jelajahi Galeri
                        <svg class="w-5 h-5 ml-2 group-hover:translate-y-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Wave Decoration -->
        <div class="absolute bottom-0 left-0 right-0 wave-animation">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#F9FAFB"/>
            </svg>
        </div>
    </section>

    <!-- Gallery Content Section -->
    <section id="gallery-content" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Gallery Stats dengan Animasi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover-card reveal-on-scroll">
                    <div class="text-3xl font-bold text-purple-600 mb-2 animate-count" data-count="{{ $galeri->total() }}">0</div>
                    <div class="text-gray-600 font-medium">Total Galeri</div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover-card reveal-on-scroll" style="animation-delay: 0.1s">
                    <div class="text-3xl font-bold text-purple-600 mb-2">{{ $galeri->count() }}</div>
                    <div class="text-gray-600 font-medium">Ditampilkan</div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover-card reveal-on-scroll" style="animation-delay: 0.2s">
                    <div class="text-3xl font-bold text-purple-600 mb-2">{{ ceil($galeri->total() / 12) }}</div>
                    <div class="text-gray-600 font-medium">Halaman</div>
                </div>
            </div>

            <!-- Gallery Grid -->
            @if($galeri->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                    @foreach($galeri as $index => $item)
                    <div class="galeri-card reveal-on-scroll" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="card-inner">
                            <a href="{{ route('galeri.detail', $item->id) }}" class="block">
                                <div class="relative overflow-hidden card-image-wrapper">
                                    <img 
                                        src="{{ $item->gambar_url }}" 
                                        alt="{{ $item->judul }}"
                                        class="w-full h-48 object-cover card-image"
                                        loading="lazy"
                                    >
                                    <div class="card-overlay"></div>
                                    <div class="absolute top-3 right-3">
                                        <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                            <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            Galeri
                                        </span>
                                    </div>
                                    <div class="absolute bottom-3 left-3 right-3">
                                        <div class="bg-black bg-opacity-50 backdrop-blur-sm rounded-lg p-2 transform translate-y-4 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                                            <span class="text-white text-xs font-medium flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                Klik untuk melihat detail
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-2 group-hover:text-purple-700 transition-colors duration-200">
                                        {{ $item->judul }}
                                    </h3>
                                    @if($item->deskripsi)
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                            {{ $item->excerpt }}
                                        </p>
                                    @endif
                                    <div class="flex justify-between items-center text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $item->published_date_formatted }}
                                        </span>
                                        <span class="text-purple-600 font-medium hover:text-purple-800 transition-colors duration-200 flex items-center arrow-link">
                                            Detail
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($galeri->hasPages())
                <div class="mt-12 reveal-on-scroll">
                    {{ $galeri->links('vendor.pagination.tailwind') }}
                </div>
                @endif

            @else
                <!-- Empty State -->
                <div class="text-center py-16 reveal-on-scroll">
                    <div class="text-gray-400 text-6xl mb-6 bounce-in">
                        <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-600 mb-4">Belum Ada Galeri</h3>
                    <p class="text-gray-500 max-w-md mx-auto mb-8">
                        Galeri kegiatan akan segera tersedia. Pantau terus untuk update terbaru.
                    </p>
                    <a href="{{ route('home') }}" class="btn-primary group">
                        <span class="relative z-10">Kembali ke Home</span>
                        <div class="btn-shine"></div>
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-purple-600 to-purple-800 text-white relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="cta-shape cta-shape-1"></div>
            <div class="cta-shape cta-shape-2"></div>
        </div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 reveal-on-scroll">
                Ingin Melihat Lebih Banyak?
            </h2>
            <p class="text-xl text-purple-100 mb-8 reveal-on-scroll" style="animation-delay: 0.2s">
                Jelajahi informasi lengkap tentang Angkatan Muda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll" style="animation-delay: 0.4s">
                <a href="{{ route('informasi-am') }}" class="bg-white text-purple-700 px-8 py-4 rounded-full font-semibold hover:bg-purple-50 transition-all shadow-lg hover:shadow-xl hover-lift pulse-btn">
                    Informasi Terbaru
                </a>
                <a href="{{ route('tentang') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-700 transition-all hover-lift group">
                    Tentang Kami
                    <svg class="w-4 h-4 ml-2 inline-block group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <style>
        /* Galeri Card Styles */
        .galeri-card {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .galeri-card.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .galeri-card .card-inner {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }

        .galeri-card:hover .card-inner {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.2);
        }

        /* Card Image Effects */
        .galeri-card .card-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .galeri-card .card-image {
            transition: transform 0.7s ease;
        }

        .galeri-card:hover .card-image {
            transform: scale(1.15) rotate(1deg);
        }

        .galeri-card .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(124, 58, 237, 0.2) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .galeri-card:hover .card-overlay {
            opacity: 1;
        }

        /* Line Clamp Utilities */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Button Styles dengan Shine Effect */
        .btn-primary {
            @apply bg-gradient-to-r from-purple-500 to-purple-700 text-white px-8 py-4 rounded-full font-semibold transition-all shadow-lg hover:shadow-2xl inline-block relative overflow-hidden;
        }
        
        .btn-primary .btn-shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover .btn-shine {
            left: 100%;
        }

        /* Slide Up Animation */
        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-up {
            animation: slide-up 0.8s ease-out forwards;
            opacity: 0;
        }

        /* Floating Shapes */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .shape-3 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        
        .shape-4 {
            width: 250px;
            height: 250px;
            top: 30%;
            right: 30%;
            animation-delay: 6s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            25% {
                transform: translate(20px, -20px) scale(1.1);
            }
            50% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            75% {
                transform: translate(20px, 20px) scale(1.05);
            }
        }

        /* Wave Animation */
        .wave-animation {
            animation: wave 3s ease-in-out infinite;
        }
        
        @keyframes wave {
            0%, 100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(-10px);
            }
        }

        /* Expand Line Animation */
        @keyframes expand {
            from {
                width: 0;
            }
            to {
                width: 6rem;
            }
        }
        
        .animate-expand {
            animation: expand 1s ease-out forwards;
        }

        /* Reveal on Scroll */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .reveal-on-scroll.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hover Card Effect */
        .hover-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(124, 58, 237, 0.2);
        }

        /* Arrow Link Animation */
        .arrow-link {
            position: relative;
        }
        
        .arrow-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: currentColor;
            transition: width 0.3s ease;
        }
        
        .arrow-link:hover::after {
            width: 100%;
        }

        /* CTA Shapes */
        .cta-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .cta-shape-1 {
            width: 400px;
            height: 400px;
            top: -100px;
            left: -100px;
            animation: float 15s infinite ease-in-out;
        }
        
        .cta-shape-2 {
            width: 300px;
            height: 300px;
            bottom: -100px;
            right: -100px;
            animation: float 18s infinite ease-in-out reverse;
        }

        /* Pulse Button */
        .pulse-btn {
            animation: subtle-pulse 2s infinite;
        }
        
        @keyframes subtle-pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.02);
            }
        }

        /* Bounce In */
        @keyframes bounce-in {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .bounce-in {
            animation: bounce-in 0.8s ease-out;
        }

        /* Parallax Background */
        .parallax-bg {
            transition: transform 0.5s ease-out;
        }

        /* Hover Lift */
        .hover-lift {
            transition: transform 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }

        /* Count Animation */
        @keyframes count-up {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .animate-count {
            animation: count-up 1s ease-out forwards;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer untuk reveal animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        
                        // Animate counting numbers
                        if (entry.target.classList.contains('animate-count')) {
                            const countElement = entry.target;
                            const target = parseInt(countElement.getAttribute('data-count'));
                            const duration = 2000;
                            const step = target / (duration / 16);
                            let current = 0;
                            
                            const timer = setInterval(() => {
                                current += step;
                                if (current >= target) {
                                    current = target;
                                    clearInterval(timer);
                                }
                                countElement.textContent = Math.floor(current);
                            }, 16);
                        }
                    }
                });
            }, observerOptions);
            
            // Observe semua elemen dengan class reveal-on-scroll
            document.querySelectorAll('.reveal-on-scroll').forEach(el => {
                observer.observe(el);
            });
            
            // Parallax effect untuk hero background
            const parallaxBg = document.querySelector('.parallax-bg');
            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    parallaxBg.style.transform = `translateY(${scrolled * 0.5}px)`;
                });
            }
            
            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
@endsection