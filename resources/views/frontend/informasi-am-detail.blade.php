@extends('frontend.layouts.app')

@section('title', $informasi->judul . ' - ' . $settings->ranting_nama)

@section('content')
<!-- Hero Banner -->
@if($informasi->banner_url)
    <div class="relative h-96 overflow-hidden">
        <img src="{{ $informasi->banner_url }}" 
             alt="{{ $informasi->judul }}" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center space-x-3 mb-4">
                    <span class="px-4 py-2 rounded-full text-sm font-semibold 
                        {{ $informasi->jenis == 'pengumuman' ? 'bg-yellow-500 text-white' : '' }}
                        {{ $informasi->jenis == 'berita' ? 'bg-blue-500 text-white' : '' }}
                        {{ $informasi->jenis == 'kegiatan' ? 'bg-green-500 text-white' : '' }}">
                        {{ $informasi->icon }} {{ ucfirst($informasi->jenis) }}
                    </span>
                    @if($informasi->is_pinned)
                        <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm font-bold">
                            📌 PINNED
                        </span>
                    @endif
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">
                    {{ $informasi->judul }}
                </h1>
                <div class="flex items-center text-white/90 text-sm space-x-4">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $informasi->published_at->format('d F Y') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="bg-gradient-to-br from-purple-600 via-purple-700 to-purple-900 text-white py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-3 mb-4">
                <span class="px-4 py-2 rounded-full text-sm font-semibold 
                    {{ $informasi->jenis == 'pengumuman' ? 'bg-yellow-500 text-white' : '' }}
                    {{ $informasi->jenis == 'berita' ? 'bg-blue-500 text-white' : '' }}
                    {{ $informasi->jenis == 'kegiatan' ? 'bg-green-500 text-white' : '' }}">
                    {{ $informasi->icon }} {{ ucfirst($informasi->jenis) }}
                </span>
                @if($informasi->is_pinned)
                    <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm font-bold">
                        📌 PINNED
                    </span>
                @endif
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                {{ $informasi->judul }}
            </h1>
            <div class="flex items-center text-purple-100 text-sm space-x-4">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $informasi->published_at->format('d F Y') }}
                </span>
            </div>
        </div>
    </div>
@endif

<!-- Content -->
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Kegiatan Info Card -->
            @if($informasi->jenis == 'kegiatan' && ($informasi->tanggal_kegiatan || $informasi->lokasi))
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 mb-8 border-2 border-purple-200">
                    <h3 class="text-xl font-bold text-purple-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Informasi Kegiatan
                    </h3>
                    <div class="space-y-3">
                        @if($informasi->tanggal_kegiatan)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-purple-600 font-medium">Tanggal</p>
                                    <p class="text-lg font-bold text-purple-900">
                                        {{ $informasi->tanggal_kegiatan->format('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        
                        @if($informasi->lokasi)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-purple-600 font-medium">Lokasi</p>
                                    <p class="text-lg font-bold text-purple-900">{{ $informasi->lokasi }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Article Content -->
            <div class="bg-white rounded-2xl shadow-lg p-8 prose prose-lg max-w-none">
                <div class="text-gray-800 leading-relaxed">
                    {!! nl2br(e($informasi->isi)) !!}
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Bagikan Informasi Ini</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </a>
                    
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($informasi->judul) }}" 
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </a>
                    
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($informasi->judul . ' - ' . request()->url()) }}" 
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8">
                <a href="{{ route('informasi-am') }}" 
                   class="inline-flex items-center text-purple-700 hover:text-purple-900 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Informasi
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Informasi Terkait -->
            @if($informasiTerkait->count() > 0)
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        {{ ucfirst($informasi->jenis) }} Terkait
                    </h3>
                    <div class="space-y-4">
                        @foreach($informasiTerkait as $terkait)
                            <a href="{{ route('informasi-am.detail', $terkait->id) }}" 
                               class="block group">
                                <div class="flex space-x-3">
                                    @if($terkait->thumbnail_url)
                                        <img src="{{ $terkait->thumbnail_url }}" 
                                             alt="{{ $terkait->judul }}"
                                             class="w-20 h-20 rounded-lg object-cover flex-shrink-0 group-hover:ring-2 group-hover:ring-purple-500 transition-all">
                                    @else
                                        <div class="w-20 h-20 rounded-lg bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center flex-shrink-0 group-hover:ring-2 group-hover:ring-purple-500 transition-all">
                                            <span class="text-3xl">{{ $terkait->icon }}</span>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-semibold text-gray-800 group-hover:text-purple-700 transition-colors line-clamp-2 mb-1">
                                            {{ $terkait->judul }}
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            {{ $terkait->published_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('informasi-am', ['jenis' => $informasi->jenis]) }}" 
                       class="block mt-6 text-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-colors">
                        Lihat Semua {{ ucfirst($informasi->jenis) }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .prose {
        max-width: none;
    }
    
    .prose p {
        margin-bottom: 1em;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection