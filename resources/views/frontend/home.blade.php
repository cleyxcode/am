@extends('frontend.layouts.app')

@section('title', 'Home - ' . $settings->ranting_nama)

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
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-slide-up" style="animation-delay: 0.1s">
                    Selamat Datang
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto animate-slide-up" style="animation-delay: 0.3s">
                    Web Liturgi {{ $settings->ranting_nama }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up" style="animation-delay: 0.5s">
                    <a href="{{ route('tata-kebaktian') }}" class="btn-primary group">
                        <span class="relative z-10">Lihat Tata Kebaktian</span>
                        <div class="btn-shine"></div>
                    </a>
                    <a href="{{ route('tentang') }}" class="btn-secondary group">
                        <span class="relative z-10">Tentang Kami</span>
                        <svg class="w-5 h-5 ml-2 inline-block group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
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

    <!-- Informasi Singkat Section dengan Reveal Animation -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ $informasiSingkat->judul }}
                </h2>
                <div class="w-24 h-1 bg-purple-600 mx-auto rounded-full animate-expand"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                @if($informasiSingkat->foto)
                    <div class="order-2 md:order-1 reveal-on-scroll" style="animation-delay: 0.2s">
                        <div class="image-container">
                            <img src="{{ $informasiSingkat->foto_url }}" alt="{{ $informasiSingkat->judul }}" 
                                 class="rounded-2xl shadow-2xl w-full h-auto object-cover hover-lift">
                            <div class="image-overlay"></div>
                        </div>
                    </div>
                @endif
                
                <div class="{{ $informasiSingkat->foto ? 'order-1 md:order-2' : 'col-span-full' }} reveal-on-scroll" style="animation-delay: 0.4s">
                    <div class="prose prose-lg max-w-none text-gray-700 text-reveal">
                        {!! Str::limit(strip_tags($informasiSingkat->deskripsi), 300) !!}
                    </div>
                    <a href="{{ route('tentang') }}" class="inline-flex items-center mt-6 text-purple-600 hover:text-purple-700 font-semibold group arrow-link">
                        Selengkapnya
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Ketua Section dengan Scale Animation -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Ketua Ranting
                </h2>
                <div class="w-24 h-1 bg-purple-600 mx-auto rounded-full animate-expand"></div>
            </div>

            <div class="max-w-4xl mx-auto reveal-on-scroll" style="animation-delay: 0.2s">
                <div class="bg-gradient-to-br from-purple-50 to-white rounded-3xl shadow-xl p-8 md:p-12 hover-card">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="flex-shrink-0 profile-image-wrapper">
                            @if($informasiKetua->foto)
                                <img src="{{ $informasiKetua->foto_url }}" alt="{{ $informasiKetua->nama }}" 
                                     class="w-48 h-48 rounded-full object-cover shadow-2xl ring-4 ring-purple-200 profile-image">
                            @else
                                <div class="w-48 h-48 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center shadow-2xl ring-4 ring-purple-200 profile-image">
                                    <span class="text-white text-5xl font-bold">{{ substr($informasiKetua->nama, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="profile-ring"></div>
                        </div>
                        
                        <div class="flex-1 text-center md:text-left">
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 text-gradient">
                                {{ $informasiKetua->nama }}
                            </h3>
                            <p class="text-purple-600 font-semibold mb-4">{{ $informasiKetua->umur }} Tahun</p>
                            <div class="prose max-w-none text-gray-700">
                                {!! Str::limit(strip_tags($informasiKetua->deskripsi), 200) !!}
                            </div>
                            <a href="{{ route('informasi-ketua') }}" class="inline-flex items-center mt-4 text-purple-600 hover:text-purple-700 font-semibold group arrow-link">
                                Lihat Profil Lengkap
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengurus Preview Section dengan Stagger Animation -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Pengurus Ranting
                </h2>
                <div class="w-24 h-1 bg-purple-600 mx-auto rounded-full animate-expand"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Tim pengurus yang berdedikasi melayani Angkatan Muda
                </p>
            </div>

            @if($pengurus->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                    @foreach($pengurus as $index => $p)
                        <div class="pengurus-card reveal-on-scroll" style="animation-delay: {{ $index * 0.1 }}s">
                            <div class="card-inner">
                                <div class="aspect-square overflow-hidden bg-gray-100 card-image-wrapper">
                                    @if($p->foto)
                                        <img src="{{ $p->foto_url }}" alt="{{ $p->nama }}" 
                                             class="w-full h-full object-cover card-image">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                                            <span class="text-white text-6xl font-bold">{{ substr($p->nama, 0, 1) }}</span>
                                        </div>
                                    @endif
                                    <div class="card-overlay"></div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $p->nama }}</h3>
                                    <p class="text-purple-600 font-semibold mb-1">{{ $p->jabatan }}</p>
                                    <p class="text-gray-600 text-sm">{{ $p->umur }} Tahun</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center reveal-on-scroll">
                    <a href="{{ route('pengurus-ranting') }}" class="btn-primary group">
                        <span class="relative z-10">Lihat Semua Pengurus</span>
                        <div class="btn-shine"></div>
                    </a>
                </div>
            @else
                <div class="text-center py-12 reveal-on-scroll">
                    <div class="text-gray-400 mb-4 bounce-in">
                        <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600">Belum ada data pengurus</p>
                </div>
            @endif
        </div>
    </section>
    <!-- Informasi AM Section dengan Grid Modern -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Informasi Terbaru
            </h2>
            <div class="w-24 h-1 bg-purple-600 mx-auto rounded-full animate-expand"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Update terbaru seputar kegiatan, pengumuman, dan berita Angkatan Muda
            </p>
        </div>

        @if($informasiAMTerbaru->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @foreach($informasiAMTerbaru as $index => $info)
                    <div class="informasi-card reveal-on-scroll" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="card-inner h-full flex flex-col">
                            <!-- Thumbnail -->
                            @if($info->thumbnail)
                                <div class="aspect-video overflow-hidden bg-gray-100 card-image-wrapper">
                                    <img src="{{ $info->thumbnail_url }}" alt="{{ $info->judul }}" 
                                         class="w-full h-full object-cover card-image">
                                    <div class="card-overlay"></div>
                                    <!-- Badge Jenis -->
                                    <div class="absolute top-4 left-4">
                                        <span class="badge-{{ $info->jenis }} px-3 py-1 rounded-full text-xs font-semibold text-white">
                                            {{ $info->icon }} {{ ucfirst($info->jenis) }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div class="aspect-video bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center relative">
                                    <span class="text-white text-4xl">{{ $info->icon }}</span>
                                    <div class="absolute top-4 left-4">
                                        <span class="badge-{{ $info->jenis }} px-3 py-1 rounded-full text-xs font-semibold text-white">
                                            {{ ucfirst($info->jenis) }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Content -->
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                        {{ $info->judul }}
                                    </h3>
                                    
                                    @if($info->ringkasan)
                                        <p class="text-gray-600 mb-4 line-clamp-3">
                                            {{ $info->ringkasan }}
                                        </p>
                                    @else
                                        <p class="text-gray-600 mb-4 line-clamp-3">
                                            {!! Str::limit(strip_tags($info->isi), 120) !!}
                                        </p>
                                    @endif
                                    
                                    <!-- Metadata -->
                                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                        <div class="flex items-center space-x-4">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ $info->published_at->format('d M Y') }}
                                            </span>
                                            @if($info->is_pinned)
                                                <span class="flex items-center text-yellow-600">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                    Penting
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Action Button -->
                                <a href="{{ route('informasi-am.detail', $info->id) }}" 
                                   class="inline-flex items-center justify-center mt-4 text-purple-600 hover:text-purple-700 font-semibold group arrow-link">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center reveal-on-scroll">
                <a href="{{ route('informasi-am') }}" class="btn-primary group">
                    <span class="relative z-10">Lihat Semua Informasi</span>
                    <div class="btn-shine"></div>
                </a>
            </div>
        @else
            <div class="text-center py-12 reveal-on-scroll">
                <div class="text-gray-400 mb-4 bounce-in">
                    <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <p class="text-gray-600">Belum ada informasi terbaru</p>
            </div>
        @endif
    </div>
</section>

    <!-- CTA Section dengan Pulse Animation -->
    <section class="py-16 bg-gradient-to-br from-purple-600 to-purple-800 text-white relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="cta-shape cta-shape-1"></div>
            <div class="cta-shape cta-shape-2"></div>
        </div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 reveal-on-scroll">
                Ingin Tahu Lebih Banyak?
            </h2>
            <p class="text-xl text-purple-100 mb-8 reveal-on-scroll" style="animation-delay: 0.2s">
                Jelajahi tata kebaktian dan informasi lengkap tentang Angkatan Muda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center reveal-on-scroll" style="animation-delay: 0.4s">
                <a href="{{ route('tata-kebaktian') }}" class="bg-white text-purple-700 px-8 py-4 rounded-full font-semibold hover:bg-purple-50 transition-all shadow-lg hover:shadow-xl hover-lift pulse-btn">
                    Tata Kebaktian
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
        /* Informasi AM Card Styles */
.informasi-card {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.informasi-card.revealed {
    opacity: 1;
    transform: translateY(0);
}

.informasi-card .card-inner {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
}

.informasi-card:hover .card-inner {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(124, 58, 237, 0.2);
}

/* Badge Styles */
.badge-pengumuman {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.badge-berita {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

.badge-kegiatan {
    background: linear-gradient(135deg, #10b981, #047857);
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

/* Card Image Effects */
.informasi-card .card-image-wrapper {
    position: relative;
    overflow: hidden;
}

.informasi-card .card-image {
    transition: transform 0.7s ease;
}

.informasi-card:hover .card-image {
    transform: scale(1.15) rotate(1deg);
}

.informasi-card .card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(124, 58, 237, 0.2) 100%);
    opacity: 0;
    transition: opacity 0.5s ease;
}

.informasi-card:hover .card-overlay {
    opacity: 1;
}
        /* Button Styles dengan Shine Effect */
        .btn-primary {
            @apply bg-white text-purple-700 px-8 py-4 rounded-full font-semibold transition-all shadow-lg hover:shadow-2xl inline-block relative overflow-hidden;
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
        
        .btn-secondary {
            @apply bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-700 transition-all inline-block relative overflow-hidden;
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

        /* Image Hover Effects */
        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
        }
        
        .hover-lift {
            transition: transform 0.5s ease;
        }
        
        .image-container:hover .hover-lift {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(124, 58, 237, 0.2) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .image-container:hover .image-overlay {
            opacity: 1;
        }

        /* Profile Image Animation */
        .profile-image-wrapper {
            position: relative;
        }
        
        .profile-image {
            transition: transform 0.5s ease;
        }
        
        .profile-image-wrapper:hover .profile-image {
            transform: scale(1.05);
        }
        
        .profile-ring {
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 2px solid rgba(124, 58, 237, 0.3);
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

        /* Card Animations */
        .pengurus-card {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .pengurus-card.revealed {
            opacity: 1;
            transform: translateY(0);
        }
        
        .card-inner {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .pengurus-card:hover .card-inner {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.2);
        }
        
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

        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

        /* Text Reveal Animation */
        .text-reveal {
            animation: text-reveal 1s ease-out;
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

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Hover Lift */
        .hover-lift {
            transition: transform 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
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