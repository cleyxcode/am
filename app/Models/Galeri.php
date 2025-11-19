<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    use HasFactory, SoftDeletes;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'status',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    /**
     * Scope untuk data yang published
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope untuk data yang draft
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Get URL gambar
     */
    public function getGambarUrlAttribute()
    {
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        return $this->gambar ? Storage::url($this->gambar) : null;
    }

    /**
     * Check if galeri is published
     */
    public function getIsPublishedAttribute()
    {
        return $this->status === 'published' && $this->published_at <= now();
    }

    /**
     * Format published date
     */
    public function getPublishedDateFormattedAttribute()
    {
        return $this->published_at ? $this->published_at->translatedFormat('d F Y') : '-';
    }

    /**
     * Format published time
     */
    public function getPublishedTimeFormattedAttribute()
    {
        return $this->published_at ? $this->published_at->format('H:i') : '-';
    }

    /**
     * Get excerpt for description
     */
    public function getExcerptAttribute()
    {
        return $this->deskripsi ? \Str::limit(strip_tags($this->deskripsi), 150) : '';
    }
}