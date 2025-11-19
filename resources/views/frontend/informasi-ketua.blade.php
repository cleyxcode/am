@extends('frontend.layouts.app')

@section('title', 'Informasi Ketua - ' . $settings->ranting_nama)

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
                    <svg class="w-16 h-16 mx-auto text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-slide-up" style="animation-delay: 0.1s">
                    Informasi Ketua Ranting
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto animate-slide-up" style="animation-delay: 0.3s">
                    Mengenal lebih dekat pemimpin Angkatan Muda {{ $settings->ranting_nama }}
                </p>
                
                <!-- Stats Counter -->
                <div class="flex flex-wrap justify-center gap-6 mt-8 animate-slide-up" style="animation-delay: 0.5s">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-300 counter-number" data-target="{{ $informasiKetua->umur }}">0</div>
                        <div class="text-purple-200 text-sm">Tahun</div>
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
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="profile-card reveal-on-scroll">
                <!-- Profile Header -->
                <div class="profile-header bg-gradient-to-br from-purple-500 to-purple-700 px-8 py-12 text-white text-center relative overflow-hidden">
                    <!-- Background Animation -->
                    <div class="header-bg-animation"></div>
                    
                    <!-- Spotlight Effect -->
                    <div class="spotlight"></div>
                    
                    <div class="flex justify-center mb-6 relative z-10">
                        <div class="profile-photo-wrapper">
                            @if($informasiKetua->foto)
                                <img src="{{ $informasiKetua->foto_url }}" 
                                     alt="{{ $informasiKetua->nama }}" 
                                     class="profile-photo w-48 h-48 rounded-full object-cover shadow-2xl ring-8 ring-white/30">
                            @else
                                <div class="profile-photo w-48 h-48 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center shadow-2xl ring-8 ring-white/30">
                                    <span class="text-white text-6xl font-bold">
                                        {{ substr($informasiKetua->nama, 0, 1) }}
                                    </span>
                                </div>
                            @endif
                            
                            <!-- Rotating Ring -->
                            <div class="photo-ring ring-1"></div>
                            <div class="photo-ring ring-2"></div>
                            <div class="photo-ring ring-3"></div>
                        </div>
                    </div>
                    
                    <h2 class="text-4xl font-extrabold mb-3 name-title relative z-10">
                        {{ $informasiKetua->nama }}
                    </h2>
                    <p class="text-2xl font-semibold text-purple-100 position-badge">Ketua Ranting</p>
                    
                    <div class="mt-4 inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full age-badge">
                        <svg class="w-5 h-5 calendar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-semibold">{{ $informasiKetua->umur }} Tahun</span>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="p-8 md:p-12">
                    <div class="mb-8 content-section">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3 section-title">
                            <svg class="w-7 h-7 text-purple-600 icon-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Tentang Ketua
                        </h3>
                        <div class="prose prose-lg max-w-none text-gray-700 description-text">
                            {!! $informasiKetua->deskripsi !!}
                        </div>
                    </div>

                    <!-- Stats Cards dengan Counter Animation -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="stat-card stat-card-1 reveal-on-scroll" style="animation-delay: 0.2s">
                            <div class="stat-icon-wrapper">
                                <div class="text-4xl font-bold text-purple-600 mb-2 counter-age" data-target="{{ $informasiKetua->umur }}">
                                    0
                                </div>
                            </div>
                            <div class="text-gray-700 font-semibold">Tahun</div>
                            <div class="stat-progress"></div>
                        </div>
                        
                        <div class="stat-card stat-card-2 reveal-on-scroll" style="animation-delay: 0.4s">
                            <div class="stat-icon-wrapper">
                                <div class="text-4xl font-bold text-purple-600 mb-2">
                                    <svg class="w-12 h-12 mx-auto check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-gray-700 font-semibold">Ketua Ranting</div>
                            <div class="stat-progress"></div>
                        </div>
                        
                        <div class="stat-card stat-card-3 reveal-on-scroll" style="animation-delay: 0.6s">
                            <div class="stat-icon-wrapper">
                                <div class="text-4xl font-bold text-purple-600 mb-2">
                                    <svg class="w-12 h-12 mx-auto leader-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-gray-700 font-semibold">Pemimpin</div>
                            <div class="stat-progress"></div>
                        </div>
                    </div>

                    <!-- Navigation dengan Magnetic Effect -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8 border-t border-gray-200 nav-buttons reveal-on-scroll">
                        <a href="{{ route('pengurus-ranting') }}" 
                           class="btn-primary-nav magnetic-btn group">
                            <span class="btn-content">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Lihat Pengurus Ranting
                            </span>
                            <div class="btn-shine"></div>
                        </a>
                        
                        <a href="{{ route('home') }}" 
                           class="btn-secondary-nav magnetic-btn group">
                            <span class="btn-content">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Kembali ke Home
                            </span>
                            <div class="btn-shine"></div>
                        </a>
                    </div>
                </div>
            </div>
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

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 35px 60px rgba(124, 58, 237, 0.2);
        }

        /* Profile Header Effects */
        .profile-header {
            position: relative;
        }
        
        .header-bg-animation {
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            animation: bg-shimmer 3s infinite;
        }
        
        @keyframes bg-shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }
        
        .spotlight {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            animation: spotlight-pulse 4s ease-in-out infinite;
        }
        
        @keyframes spotlight-pulse {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.5;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.2);
                opacity: 0.8;
            }
        }

        /* Profile Photo */
        .profile-photo-wrapper {
            position: relative;
        }
        
        .profile-photo {
            position: relative;
            z-index: 10;
            transition: transform 0.5s ease;
        }
        
        .profile-photo-wrapper:hover .profile-photo {
            transform: scale(1.05) rotate(2deg);
        }
        
        .photo-ring {
            position: absolute;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
        }
        
        .ring-1 {
            inset: -10px;
            animation: ring-rotate 10s linear infinite;
        }
        
        .ring-2 {
            inset: -20px;
            animation: ring-rotate 15s linear infinite reverse;
        }
        
        .ring-3 {
            inset: -30px;
            animation: ring-rotate 20s linear infinite;
            opacity: 0.5;
        }
        
        @keyframes ring-rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Name Title */
        .name-title {
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        /* Age Badge */
        .age-badge {
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
        
        .calendar-icon {
            animation: calendar-wiggle 1s ease-in-out infinite;
        }
        
        @keyframes calendar-wiggle {
            0%, 100% {
                transform: rotate(-5deg);
            }
            50% {
                transform: rotate(5deg);
            }
        }

        /* Content Section */
        .content-section {
            animation: content-fade-in 1s ease-out;
        }
        
        @keyframes content-fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .section-title {
            position: relative;
            padding-bottom: 10px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            animation: title-underline 1s ease-out 0.5s forwards;
        }
        
        @keyframes title-underline {
            to {
                width: 100px;
            }
        }
        
        .icon-bounce {
            animation: icon-bounce-anim 2s ease-in-out infinite;
        }
        
        @keyframes icon-bounce-anim {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Description Text */
        .description-text {
            animation: text-reveal 1.2s ease-out 0.3s both;
        }
        
        @keyframes text-reveal {
            from {
                opacity: 0;
                filter: blur(10px);
            }
            to {
                opacity: 1;
                filter: blur(0);
            }
        }

        .prose {
            @apply text-gray-800;
        }
        .prose p {
            @apply mb-4 leading-relaxed;
        }
        .prose strong {
            @apply text-purple-800 font-semibold;
        }

        /* Stats Cards */
        .stat-card {
            background: linear-gradient(135deg, #f3e8ff 0%, #fff 100%);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            border: 2px solid #e9d5ff;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.2);
            border-color: #a855f7;
        }
        
        .stat-icon-wrapper {
            animation: icon-pop 0.6s ease-out 0.8s both;
        }
        
        @keyframes icon-pop {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .stat-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 0;
            background: linear-gradient(90deg, #7c3aed, #a855f7);
            animation: progress-fill 1.5s ease-out 1s forwards;
        }
        
        @keyframes progress-fill {
            to {
                width: 100%;
            }
        }
        
        .check-icon {
            animation: check-draw 1s ease-out 1.2s both;
        }
        
        @keyframes check-draw {
            from {
                stroke-dasharray: 100;
                stroke-dashoffset: 100;
            }
            to {
                stroke-dasharray: 100;
                stroke-dashoffset: 0;
            }
        }
        
        .leader-icon {
            animation: leader-scale 1s ease-out 1.4s both;
        }
        
        @keyframes leader-scale {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        /* Navigation Buttons */
        .nav-buttons {
            animation: nav-fade-in 1s ease-out 1s both;
        }
        
        @keyframes nav-fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .magnetic-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-primary-nav {
            background: #7c3aed;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-primary-nav:hover {
            background: #6d28d9;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.4);
        }
        
        .btn-secondary-nav {
            background: white;
            border: 2px solid #7c3aed;
            color: #7c3aed;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-secondary-nav:hover {
            background: #f3e8ff;
            border-color: #6d28d9;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.2);
        }
        
        .btn-content {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .magnetic-btn:hover .btn-shine {
            left: 100%;
        }

        /* Hover Effects for Buttons */
        .magnetic-btn svg {
            transition: transform 0.3s ease;
        }
        
        .btn-primary-nav:hover svg {
            transform: scale(1.2) rotate(5deg);
        }
        
        .btn-secondary-nav:hover svg {
            transform: scale(1.2) rotate(-5deg);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-photo-wrapper {
                transform: scale(0.9);
            }
            
            .stat-card {
                margin-bottom: 1rem;
            }
            
            .floating-shape {
                display: none;
            }
            
            .profile-header {
                padding: 2rem 1rem;
            }
            
            .name-title {
                font-size: 2rem;
            }
            
            .position-badge {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 640px) {
            .grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .nav-buttons {
                flex-direction: column;
            }
            
            .magnetic-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Selection Style */
        ::selection {
            background: #a855f7;
            color: white;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation for Age
            const counters = document.querySelectorAll('.counter-number, .counter-age');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 60;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 30);
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

            // Magnetic Button Effect
            const magneticBtns = document.querySelectorAll('.magnetic-btn');
            magneticBtns.forEach(btn => {
                btn.addEventListener('mousemove', (e) => {
                    const rect = btn.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    btn.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px) translateY(-3px)`;
                });
                
                btn.addEventListener('mouseleave', () => {
                    btn.style.transform = 'translate(0, 0)';
                });
            });

            // Profile Card 3D Effect
            const profileCard = document.querySelector('.profile-card');
            if (profileCard) {
                profileCard.addEventListener('mousemove', (e) => {
                    const rect = profileCard.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = (y - centerY) / 50;
                    const rotateY = (centerX - x) / 50;
                    
                    profileCard.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
                });
                
                profileCard.addEventListener('mouseleave', () => {
                    profileCard.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(-10px)';
                });
            }

            // Animate description text on scroll
            const descriptionText = document.querySelector('.description-text');
            if (descriptionText) {
                const paragraphs = descriptionText.querySelectorAll('p');
                paragraphs.forEach((p, index) => {
                    p.style.opacity = '0';
                    p.style.transform = 'translateY(20px)';
                    p.style.transition = 'all 0.6s ease';
                    p.style.transitionDelay = `${index * 0.1}s`;
                    
                    observer.observe(p);
                });
                
                const textObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, observerOptions);
                
                paragraphs.forEach(p => textObserver.observe(p));
            }

            // Add loading animation
            window.addEventListener('load', () => {
                document.body.style.opacity = '0';
                setTimeout(() => {
                    document.body.style.transition = 'opacity 0.5s ease';
                    document.body.style.opacity = '1';
                }, 100);
            });
        });
    </script>
@endsection