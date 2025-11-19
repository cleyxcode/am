@extends('frontend.layouts.app')

@section('title', 'Tentang Angkatan Muda - ' . $settings->ranting_nama)

@section('content')
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-purple-600 to-purple-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Tentang Angkatan Muda</h1>
                <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                    Mengenal sejarah, visi, dan misi Angkatan Muda
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Featured Image -->
                @if($informasiSingkat->foto)
                    <div class="h-64 md:h-96 overflow-hidden">
                        <img src="{{ $informasiSingkat->foto_url }}" 
                             alt="{{ $informasiSingkat->judul }}" 
                             class="w-full h-full object-cover">
                    </div>
                @endif

                <!-- Content -->
                <div class="p-8 md:p-12">
                    <!-- Title -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                            {{ $informasiSingkat->judul }}
                        </h2>
                        <div class="w-24 h-1 bg-purple-600 mx-auto rounded-full"></div>
                    </div>

                    <!-- Description -->
                    <div class="prose prose-lg max-w-none mb-12">
                        {!! $informasiSingkat->deskripsi !!}
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-12"></div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                        <div class="text-center p-6 bg-purple-50 rounded-xl">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Liturgi</h3>
                            <p class="text-gray-600">Panduan tata kebaktian yang lengkap dan terstruktur</p>
                        </div>

                        <div class="text-center p-6 bg-purple-50 rounded-xl">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Komunitas</h3>
                            <p class="text-gray-600">Membangun persaudaraan dan kebersamaan yang kuat</p>
                        </div>

                        <div class="text-center p-6 bg-purple-50 rounded-xl">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pelayanan</h3>
                            <p class="text-gray-600">Melayani dengan hati dan dedikasi penuh</p>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl p-8 md:p-12 text-white text-center">
                        <h3 class="text-2xl md:text-3xl font-bold mb-4">Bergabunglah Bersama Kami</h3>
                        <p class="text-purple-100 mb-8 text-lg max-w-2xl mx-auto">
                            Mari bersama-sama membangun dan mengembangkan Angkatan Muda untuk kemajuan bersama
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('pengurus-ranting') }}" 
                               class="inline-flex items-center justify-center gap-2 bg-white text-purple-700 px-8 py-4 rounded-full font-semibold hover:bg-purple-50 transition-all shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Lihat Pengurus
                            </a>
                            <a href="{{ route('tata-kebaktian') }}" 
                               class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-700 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Tata Kebaktian
                            </a>
                        </div>
                    </div>

                    <!-- Navigation Back -->
                    <div class="mt-12 text-center">
                        <a href="{{ route('home') }}" 
                           class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold text-lg group">
                            <svg class="w-6 h-6 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .prose {
            @apply text-gray-800;
        }
        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            @apply text-purple-900 font-bold mt-8 mb-4;
        }
        .prose h1 {
            @apply text-3xl;
        }
        .prose h2 {
            @apply text-2xl;
        }
        .prose h3 {
            @apply text-xl;
        }
        .prose p {
            @apply mb-4 leading-relaxed;
        }
        .prose ul, .prose ol {
            @apply my-4 ml-6;
        }
        .prose li {
            @apply mb-2;
        }
        .prose strong {
            @apply text-purple-800 font-semibold;
        }
        .prose a {
            @apply text-purple-600 hover:text-purple-700 underline;
        }
        .prose blockquote {
            @apply border-l-4 border-purple-500 pl-4 italic my-4 text-gray-700;
        }
    </style>
@endsection