<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InformasiAM extends Model
{
    use HasFactory;

    protected $table = 'informasi_am';

    protected $fillable = [
        'jenis',
        'judul',
        'ringkasan',
        'isi',
        'thumbnail',
        'banner',
        'tanggal_kegiatan',
        'lokasi',
        'is_published',
        'is_pinned',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_pinned' => 'boolean',
        'published_at' => 'datetime',
        'tanggal_kegiatan' => 'date',
    ];

    /**
     * Accessor untuk mendapatkan URL thumbnail
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return null;
    }

    /**
     * Accessor untuk mendapatkan URL banner
     */
    public function getBannerUrlAttribute(): ?string
    {
        if ($this->banner) {
            return asset('storage/' . $this->banner);
        }
        return null;
    }

    /**
     * Accessor untuk mendapatkan excerpt/ringkasan
     */
    public function getExcerptAttribute(): string
    {
        if ($this->ringkasan) {
            return $this->ringkasan;
        }
        return Str::limit(strip_tags($this->isi), 150);
    }

    /**
     * Accessor untuk badge color berdasarkan jenis
     */
    public function getBadgeColorAttribute(): string
    {
        return match($this->jenis) {
            'pengumuman' => 'warning',
            'berita' => 'info',
            'kegiatan' => 'success',
            default => 'gray',
        };
    }

    /**
     * Accessor untuk icon berdasarkan jenis
     */
    public function getIconAttribute(): string
    {
        return match($this->jenis) {
            'pengumuman' => '📢',
            'berita' => '📰',
            'kegiatan' => '📅',
            default => '📋',
        };
    }

    /**
     * Scope untuk filter published
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope untuk filter pinned
     */
    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }

    /**
     * Scope untuk filter by jenis
     */
    public function scopeByJenis($query, string $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    /**
     * Boot method untuk auto-set published_at
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->is_published && !$model->published_at) {
                $model->published_at = now();
            }
        });

        static::updating(function ($model) {
            if ($model->is_published && !$model->published_at) {
                $model->published_at = now();
            }
        });
    }
}