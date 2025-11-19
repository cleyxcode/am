<?php

namespace App\Http\Controllers;

use App\Models\InformasiAM;
use App\Models\InformasiKetua;
use App\Models\InformasiSingkat;
use App\Models\Pengurus;
use App\Models\Setting;
use App\Models\TataKebaktian;
use App\Models\Galeri; // Jangan lupa import model Galeri
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    /**
     * Halaman Home
     */
    public function home()
    {
        $settings = Setting::getRecord();
        $informasiSingkat = InformasiSingkat::getRecord();
        $informasiKetua = InformasiKetua::getRecord();
        $pengurus = Pengurus::orderBy('nama', 'asc')->limit(6)->get();
        
        // Tambahkan informasi AM terbaru untuk home
        $informasiAMTerbaru = InformasiAM::published()
            ->orderBy('is_pinned', 'desc')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
        
        return view('frontend.home', compact(
            'settings', 
            'informasiSingkat', 
            'informasiKetua', 
            'pengurus', 
            'informasiAMTerbaru'
        ));
    }

    /**
     * Halaman Tata Kebaktian
     */
    public function tataKebaktian()
    {
        $settings = Setting::getRecord();
        $tataKebaktian = TataKebaktian::orderBy('model', 'asc')->get();
        
        return view('frontend.tata-kebaktian', compact('settings', 'tataKebaktian'));
    }

    /**
     * Detail Tata Kebaktian
     */
    public function tataKebaktianDetail($id)
    {
        $settings = Setting::getRecord();
        $liturgi = TataKebaktian::findOrFail($id);
        
        return view('frontend.tata-kebaktian-detail', compact('settings', 'liturgi'));
    }

    /**
     * Halaman Informasi Ketua
     */
    public function informasiKetua()
    {
        $settings = Setting::getRecord();
        $informasiKetua = InformasiKetua::getRecord();
        
        return view('frontend.informasi-ketua', compact('settings', 'informasiKetua'));
    }

    /**
     * Halaman Pengurus Ranting
     */
    public function pengurusRanting()
    {
        $settings = Setting::getRecord();
        $pengurus = Pengurus::orderBy('nama', 'asc')->get();
        
        return view('frontend.pengurus-ranting', compact('settings', 'pengurus'));
    }

    /**
     * Halaman Tentang Angkatan Muda
     */
    public function tentangAngkatanMuda()
    {
        $settings = Setting::getRecord();
        $informasiSingkat = InformasiSingkat::getRecord();
        
        return view('frontend.tentang', compact('settings', 'informasiSingkat'));
    }

    /**
     * Halaman Informasi AM - BARU
     */
    public function informasiAM(Request $request)
    {
        $settings = Setting::getRecord();
        
        // Filter berdasarkan jenis
        $jenis = $request->get('jenis');
        
        $query = InformasiAM::published()
            ->orderBy('is_pinned', 'desc')
            ->orderBy('published_at', 'desc');
        
        if ($jenis && in_array($jenis, ['pengumuman', 'berita', 'kegiatan'])) {
            $query->byJenis($jenis);
        }
        
        $informasiAM = $query->paginate(9);
        
        // Statistik untuk filter
        $totalPengumuman = InformasiAM::published()->byJenis('pengumuman')->count();
        $totalBerita = InformasiAM::published()->byJenis('berita')->count();
        $totalKegiatan = InformasiAM::published()->byJenis('kegiatan')->count();
        
        return view('frontend.informasi-am', compact(
            'settings', 
            'informasiAM', 
            'jenis',
            'totalPengumuman',
            'totalBerita',
            'totalKegiatan'
        ));
    }

    /**
     * Detail Informasi AM - BARU
     */
    public function informasiAMDetail($id)
    {
        $settings = Setting::getRecord();
        $informasi = InformasiAM::published()->findOrFail($id);
        
        // Informasi terkait (same jenis, exclude current)
        $informasiTerkait = InformasiAM::published()
            ->byJenis($informasi->jenis)
            ->where('id', '!=', $id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
        
        return view('frontend.informasi-am-detail', compact('settings', 'informasi', 'informasiTerkait'));
    }

    /**
     * Halaman Galeri
     */
    public function galeri(Request $request)
    {
        $settings = Setting::getRecord();
        
        // Ambil data galeri dengan pagination
        $galeri = Galeri::published()
            ->orderBy('published_at', 'desc')
            ->paginate(12);
        
        return view('frontend.galeri', compact('settings', 'galeri'));
    }

    /**
     * Detail Galeri
     */
    public function galeriDetail($id)
    {
        $settings = Setting::getRecord();
        
        // Cari galeri yang published
        $galeri = Galeri::published()->findOrFail($id);
        
        // Galeri terkait (exclude current, limit 4)
        $galeriTerkait = Galeri::published()
            ->where('id', '!=', $id)
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->get();
        
        return view('frontend.galeri-detail', compact('settings', 'galeri', 'galeriTerkait'));
    }
}