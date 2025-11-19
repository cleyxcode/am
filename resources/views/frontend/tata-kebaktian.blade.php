@extends('frontend.layouts.app')

@section('title', 'Tata Kebaktian - ' . $settings->ranting_nama)

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-slide-up" style="animation-delay: 0.1s">
                    Tata Kebaktian
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto animate-slide-up" style="animation-delay: 0.3s">
                    Panduan liturgi untuk kebaktian Angkatan Muda {{ $settings->ranting_nama }}
                </p>
                
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
            @if($tataKebaktian->count() > 0)
                <!-- Stats Counter Animation -->
                <div class="text-center mb-12 reveal-on-scroll">
                    <div class="inline-flex items-center gap-2 bg-white px-6 py-3 rounded-full shadow-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                        </svg>
                        <span class="text-gray-700 font-semibold">
                            <span class="counter-number text-purple-600" data-target="{{ $tataKebaktian->count() }}">0</span> 
                            Model Liturgi Tersedia
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($tataKebaktian as $index => $liturgi)
                        <div class="liturgy-card reveal-on-scroll" style="animation-delay: {{ $index * 0.1 }}s">
                            <div class="card-inner h-full flex flex-col">
                                <!-- Header Card dengan Gradient Animation -->
                                <div class="liturgy-header bg-gradient-to-br from-purple-500 to-purple-700 p-6 text-white relative overflow-hidden">
                                    <!-- Animated Shine Effect -->
                                    <div class="header-shine"></div>
                                    
                                    <div class="flex items-center justify-between mb-4 relative z-10">
                                        <span class="badge-model bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold">
                                            Model {{ $liturgi->model }}
                                        </span>
                                        @if($liturgi->file_pdf)
                                            <div class="pdf-icon-wrapper">
                                                <svg class="w-6 h-6 pdf-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                <div class="pdf-pulse"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="text-2xl font-bold relative z-10">{{ $liturgi->judul }}</h3>
                                    
                                    <!-- Corner Decoration -->
                                    <div class="corner-decoration"></div>
                                </div>

                                <!-- Body Card -->
                                <div class="p-6 bg-white flex-1 flex flex-col">
                                    <!-- Content Preview -->
                                    <div class="prose prose-sm max-w-none text-gray-700 mb-6 line-clamp-3 content-preview flex-1">
                                        {!! Str::limit(strip_tags($liturgi->isi), 150) !!}
                                    </div>

                                    <!-- Action Buttons dengan Hover Effects -->
                                    <div class="flex flex-col gap-3">
                                        <a href="{{ route('tata-kebaktian.detail', $liturgi->id) }}" 
                                           class="btn-detail group relative overflow-hidden">
                                            <span class="relative z-10 flex items-center justify-center gap-2">
                                                Lihat Detail
                                                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                                </svg>
                                            </span>
                                            <div class="btn-shine"></div>
                                        </a>

                                        @if($liturgi->file_pdf)
                                            <a href="{{ $liturgi->pdf_url }}" 
                                               target="_blank"
                                               class="btn-pdf group">
                                                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                <span class="relative">
                                                    Download PDF
                                                    <span class="download-indicator"></span>
                                                </span>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Card Glow Effect -->
                                <div class="card-glow"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State dengan Animation -->
                <div class="text-center py-12 reveal-on-scroll">
                    <div class="empty-icon-wrapper">
                        <svg class="w-24 h-24 text-purple-600 empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <div class="empty-icon-ring"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                        Belum Ada Tata Kebaktian
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Tata kebaktian akan segera ditambahkan oleh admin
                    </p>
                    <a href="{{ route('home') }}" class="btn-back group">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

        /* Liturgy Card Animations */
        .liturgy-card .card-inner {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            height: 100%;
        }
        
        .liturgy-card:hover .card-inner {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.3);
        }

        /* Header Shine Effect */
        .liturgy-header {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .header-shine {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 30%,
                rgba(255, 255, 255, 0.1) 50%,
                transparent 70%
            );
            transform: rotate(45deg);
            animation: shine-sweep 3s infinite;
        }
        
        @keyframes shine-sweep {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        /* Badge Model Animation */
        .badge-model {
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

        /* PDF Icon Animation */
        .pdf-icon-wrapper {
            position: relative;
        }
        
        .pdf-icon {
            animation: icon-bounce 2s infinite;
        }
        
        @keyframes icon-bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        .pdf-pulse {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: pulse-ring 2s infinite;
        }
        
        @keyframes pulse-ring {
            0% {
                transform: translate(-50%, -50%) scale(0.8);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }

        /* Corner Decoration */
        .corner-decoration {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle at bottom right, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: corner-glow 3s infinite alternate;
        }
        
        @keyframes corner-glow {
            0% { opacity: 0.3; }
            100% { opacity: 0.7; }
        }

        /* Button Detail */
        .btn-detail {
            width: 100%;
            background: #7c3aed;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-detail .btn-shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-detail:hover .btn-shine {
            left: 100%;
        }
        
        .btn-detail:hover {
            background: #6d28d9;
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
            transform: translateY(-2px);
        }

        /* Button PDF */
        .btn-pdf {
            width: 100%;
            background: white;
            border: 2px solid #7c3aed;
            color: #7c3aed;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
        }
        
        .btn-pdf:hover {
            background: #f3e8ff;
            border-color: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.2);
        }
        
        .download-indicator {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #7c3aed;
            transition: width 0.3s ease;
        }
        
        .btn-pdf:hover .download-indicator {
            width: 100%;
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
        
        .liturgy-card:hover .card-glow {
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

        /* Content Preview Animation */
        .content-preview {
            animation: text-fade-in 0.8s ease-out 0.3s both;
        }
        
        @keyframes text-fade-in {
            from {
                opacity: 0;
                filter: blur(5px);
            }
            to {
                opacity: 1;
                filter: blur(0);
            }
        }

        /* Line Clamp Utilities */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Counter Animation */
        .counter-number {
            font-size: 1.25rem;
            font-weight: bold;
        }

        /* Parallax Background */
        .parallax-bg {
            transition: transform 0.5s ease-out;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .liturgy-card:hover .card-inner {
                transform: translateY(-5px);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation
            const counter = document.querySelector('.counter-number');
            if (counter) {
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 30);
            }

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