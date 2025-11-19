<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Storage route
Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    $file = file_get_contents($path);
    $type = mime_content_type($path);
    
    return response($file, 200)->header('Content-Type', $type);
})->where('folder', '.*')->where('filename', '.*');

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/tata-kebaktian', [FrontendController::class, 'tataKebaktian'])->name('tata-kebaktian');
Route::get('/tata-kebaktian/{id}', [FrontendController::class, 'tataKebaktianDetail'])->name('tata-kebaktian.detail');
Route::get('/informasi-ketua', [FrontendController::class, 'informasiKetua'])->name('informasi-ketua');
Route::get('/pengurus-ranting', [FrontendController::class, 'pengurusRanting'])->name('pengurus-ranting');
Route::get('/tentang-angkatan-muda', [FrontendController::class, 'tentangAngkatanMuda'])->name('tentang');

// Routes Informasi AM - BARU
Route::get('/informasi-am', [FrontendController::class, 'informasiAM'])->name('informasi-am');
Route::get('/informasi-am/{id}', [FrontendController::class, 'informasiAMDetail'])->name('informasi-am.detail');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/galeri/{id}', [FrontendController::class, 'galeriDetail'])->name('galeri.detail');