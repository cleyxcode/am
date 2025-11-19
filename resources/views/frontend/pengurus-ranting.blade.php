@extends('frontend.layouts.app')

@section('title', 'Pengurus Ranting - ' . $settings->ranting_nama)

@section('content')
    <!-- Hero Section dengan Parallax & Particle Effects -->
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
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
            <div class="text-center">
                <!-- Animated Icon -->
                <div class="inline-block mb-6 animate-bounce-in">
                    <svg class="w-16 h-16 mx-auto text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-slide-up" style="animation-delay: 0.1s">
                    Pengurus Ranting
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto animate-slide-up" style="animation-delay: 0.3s">
                    Tim yang berdedikasi melayani Angkatan Muda {{ $settings->ranting_nama }} dengan sepenuh hati
                </p>
                
                <!-- Stats Counter -->
                <div class="flex flex-wrap justify-center gap-6 mt-8 animate-slide-up" style="animation-delay: 0.5s">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-white counter-number" data-target="{{ $pengurus->count() }}">0</div>
                        <div class="text-purple-200 text-sm">Total Pengurus</div>
                    </div>
                </div>

                <!-- Decorative Line -->
                <div class="flex justify-center mt-8">
                    <div class="w-24 h-1 bg-purple-300 rounded-full animate-expand"></div>
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

    <!-- Content Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($pengurus->count() > 0)
                <!-- Statistics dengan Animation -->
                <div class="text-center mb-12 reveal-on-scroll">
                    <div class="inline-flex items-center gap-3 bg-white rounded-full shadow-lg px-8 py-4 hover-card">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <div>
                            <span class="text-3xl font-bold text-purple-600 counter-number" data-target="{{ $pengurus->count() }}">0</span>
                            <span class="text-gray-600 ml-2">Pengurus Aktif</span>
                        </div>
                    </div>
                </div>

                <!-- Pengurus Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($pengurus as $index => $p)
                        <div class="pengurus-card reveal-on-scroll" style="animation-delay: {{ $index * 0.1 }}s">
                            <div class="card-inner h-full flex flex-col">
                                <!-- Photo -->
                                <div class="aspect-square overflow-hidden bg-gradient-to-br from-purple-100 to-purple-200 relative card-image-wrapper">
                                    @if($p->foto)
                                        <img src="{{ $p->foto_url }}" 
                                             alt="{{ $p->nama }}" 
                                             class="w-full h-full object-cover card-image">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                                            <span class="text-white text-7xl font-bold">
                                                {{ substr($p->nama, 0, 1) }}
                                            </span>
                                        </div>
                                    @endif
                                    
                                    <!-- Overlay -->
                                    <div class="card-overlay"></div>

                                    <!-- Profile Ring -->
                                    <div class="profile-ring"></div>
                                </div>

                                <!-- Info -->
                                <div class="p-6 flex-1 flex flex-col">
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-700 transition-colors">
                                            {{ $p->nama }}
                                        </h3>
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="inline-block bg-gradient-to-r from-purple-500 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg badge-jabatan">
                                                {{ $p->jabatan }}
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-2 text-gray-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-sm font-medium">{{ $p->umur }} Tahun</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Glow Effect -->
                                <div class="card-glow"></div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- CTA Section dengan Animation -->
                <div class="mt-16 text-center reveal-on-scroll">
                    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 hover-card">
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 text-gradient">
                            Ingin Bergabung?
                        </h3>
                        <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                            Kami selalu terbuka untuk anggota baru yang ingin melayani di Angkatan Muda
                        </p>
                        <a href="{{ route('home') }}" 
                           class="btn-primary group inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="relative z-10">Kembali ke Home</span>
                            <div class="btn-shine"></div>
                        </a>
                    </div>
                </div>

            @else
                <!-- Empty State dengan Animation -->
                <div class="text-center py-12 reveal-on-scroll">
                    <div class="empty-icon-wrapper">
                        <svg class="w-24 h-24 text-purple-600 empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <div class="empty-icon-ring"></div>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">Belum Ada Data Pengurus</h3>
                    <p class="text-gray-600 mb-8 text-lg">Data pengurus ranting akan segera ditambahkan</p>
                    <a href="{{ route('home') }}" 
                       class="btn-back group">
                        <svg class="w-6 h-6 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Home
                    </a>
                </div>
            @endif
        </div>
    </section>

    <style>
        /* Header Background Animations */
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

        /* Bounce In Animation */
        @keyframes bounce-in {
            0% {
                opacity: 0;
                transform: scale(0.3) translateY(-50px);
            }
            50% {
                transform: scale(1.05) translateY(0);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .animate-bounce-in {
            animation: bounce-in 1s ease-out;
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

        /* Pengurus Card Animations */
        .pengurus-card .card-inner {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            height: 100%;
        }
        
        .pengurus-card:hover .card-inner {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.2);
        }

        /* Card Image Effects */
        .card-image-wrapper {
            position: relative;
            overflow: hidden;
        }
        
        .card-image {
            transition: transform 0.7s ease;
        }
        
        .pengurus-card:hover .card-image {
            transform: scale(1.15) rotate(2deg);
        }
        
        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(124, 58, 237, 0.3) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .pengurus-card:hover .card-overlay {
            opacity: 1;
        }

        /* Profile Ring Animation */
        .profile-ring {
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 2px solid rgba(124, 58, 237, 0.3);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .pengurus-card:hover .profile-ring {
            opacity: 1;
            animation: pulse-ring 2s infinite;
        }
        
        @keyframes pulse-ring {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.5;
            }
        }

        /* Badge Jabatan */
        .badge-jabatan {
            animation: badge-pulse 2s infinite;
        }
        
        @keyframes badge-pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Card Glow Effect */
        .card-glow {
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, #7c3aed, #a855f7, #7c3aed);
            border-radius: 1rem;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
            filter: blur(10px);
        }
        
        .pengurus-card:hover .card-glow {
            opacity: 0.6;
            animation: glow-rotate 2s linear infinite;
        }
        
        @keyframes glow-rotate {
            0% {
                filter: blur(10px) hue-rotate(0deg);
            }
            100% {
                filter: blur(10px) hue-rotate(360deg);
            }
        }

        /* Button Primary */
        .btn-primary {
            @apply bg-gradient-to-r from-purple-600 to-purple-700 text-white px-8 py-4 rounded-full font-semibold transition-all shadow-lg hover:shadow-2xl inline-block relative overflow-hidden;
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

        /* Hover Card Effect */
        .hover-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(124, 58, 237, 0.2);
        }

        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Empty State Animations */
        .empty-icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 6rem;
            height: 6rem;
            background: #f3e8ff;
            border-radius: 50%;
            margin-bottom: 1.5rem;
            position: relative;
            animation: icon-float 3s ease-in-out infinite;
        }
        
        @keyframes icon-float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .empty-icon {
            animation: icon-swing 2s ease-in-out infinite;
        }
        
        @keyframes icon-swing {
            0%, 100% {
                transform: rotate(-5deg);
            }
            50% {
                transform: rotate(5deg);
            }
        }
        
        .empty-icon-ring {
            position: absolute;
            inset: -10px;
            border: 2px solid #e9d5ff;
            border-radius: 50%;
            animation: ring-pulse 2s ease-in-out infinite;
        }
        
        @keyframes ring-pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.5;
            }
        }

        /* Button Back */
        .btn-back {
            display: inline-flex;
            align-items: center;
            color: #7c3aed;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }
        
        .btn-back:hover {
            color: #6d28d9;
            background: #f3e8ff;
            transform: translateX(-5px);
        }

        /* Line Clamp Utilities */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Counter Animation */
        .counter-number {
            font-size: 1.75rem;
            font-weight: bold;
        }

        /* Parallax Background */
        .parallax-bg {
            transition: transform 0.5s ease-out;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .pengurus-card:hover .card-inner {
                transform: translateY(-5px);
            }
            
            .grid {
                gap: 1.5rem;
            }
            
            .empty-icon-wrapper {
                width: 5rem;
                height: 5rem;
            }
            
            .empty-icon {
                width: 3rem;
                height: 3rem;
            }
        }

        @media (max-width: 640px) {
            .grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .card-inner {
                margin: 0 auto;
                max-width: 300px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation untuk stats
            const counters = document.querySelectorAll('.counter-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 30;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 50);
            });

            // Intersection Observer untuk reveal animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
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

            // Add 3D Tilt Effect on Cards
            document.querySelectorAll('.card-inner').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = (y - centerY) / 20;
                    const rotateY = (centerX - x) / 20;
                    
                    card.style.transform = `translateY(-10px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0) rotateX(0) rotateY(0)';
                });
            });

            // Smooth Scroll
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