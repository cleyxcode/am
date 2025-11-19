@extends('frontend.layouts.app')

@section('title', $liturgi->judul . ' - ' . $settings->ranting_nama)

@section('content')
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-purple-600 to-purple-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('tata-kebaktian') }}" class="inline-flex items-center text-purple-200 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
                <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold">
                    Model {{ $liturgi->model }}
                </span>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold">{{ $liturgi->judul }}</h1>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Download Button -->
            @if($liturgi->file_pdf)
                <div class="mb-8">
                    <a href="{{ $liturgi->pdf_url }}" 
                       target="_blank"
                       class="inline-flex items-center gap-3 bg-purple-600 hover:bg-purple-700 text-white px-6 py-4 rounded-xl font-semibold transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download PDF
                    </a>
                </div>
            @endif

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    {!! $liturgi->isi !!}
                </div>
            </div>

            <!-- Navigation -->
            <div class="mt-8 flex justify-center">
                <a href="{{ route('tata-kebaktian') }}" 
                   class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Lihat Tata Kebaktian Lainnya
                </a>
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