<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'ranting_nama',
        'logo',
        'banner_desa',
        'facebook',
        'whatsapp',
        'instagram',
        'tiktok',
    ];

    protected $appends = [
        'logo_url',
        'banner_url',
        'facebook_url',
        'whatsapp_url',
        'instagram_url',
        'tiktok_url',
    ];

    /**
     * Accessor untuk mendapatkan URL logo
     */
    public function getLogoUrlAttribute(): ?string
    {
        if ($this->logo && Storage::disk('public')->exists($this->logo)) {
            return asset('storage/' . $this->logo);
        }
        return null;
    }

    /**
     * Accessor untuk mendapatkan URL banner
     */
    public function getBannerUrlAttribute(): ?string
    {
        if ($this->banner_desa && Storage::disk('public')->exists($this->banner_desa)) {
            return asset('storage/' . $this->banner_desa);
        }
        return null;
    }

    /**
     * Accessor untuk format WhatsApp
     */
    public function getWhatsappUrlAttribute(): ?string
    {
        if ($this->whatsapp) {
            // Hapus karakter non-numeric
            $number = preg_replace('/[^0-9]/', '', $this->whatsapp);
            
            // Jika dimulai dengan 0, ganti dengan 62
            if (substr($number, 0, 1) === '0') {
                $number = '62' . substr($number, 1);
            }
            
            // Jika tidak dimulai dengan 62, tambahkan 62
            if (!str_starts_with($number, '62')) {
                $number = '62' . $number;
            }
            
            return 'https://wa.me/' . $number;
        }
        return null;
    }

    /**
     * Accessor untuk format Facebook URL
     */
    public function getFacebookUrlAttribute(): ?string
    {
        if ($this->facebook) {
            // Jika sudah full URL, return as is
            if (str_starts_with($this->facebook, 'http://') || str_starts_with($this->facebook, 'https://')) {
                return $this->facebook;
            }
            // Hapus @ jika ada
            $username = str_replace('@', '', $this->facebook);
            // Jika hanya username, tambahkan URL
            return 'https://facebook.com/' . $username;
        }
        return null;
    }

    /**
     * Accessor untuk format Instagram URL
     */
    public function getInstagramUrlAttribute(): ?string
    {
        if ($this->instagram) {
            // Jika sudah full URL, return as is
            if (str_starts_with($this->instagram, 'http://') || str_starts_with($this->instagram, 'https://')) {
                return $this->instagram;
            }
            // Hapus @ jika ada
            $username = str_replace('@', '', $this->instagram);
            return 'https://instagram.com/' . $username;
        }
        return null;
    }

    /**
     * Accessor untuk format TikTok URL
     */
    public function getTiktokUrlAttribute(): ?string
    {
        if ($this->tiktok) {
            // Jika sudah full URL, return as is
            if (str_starts_with($this->tiktok, 'http://') || str_starts_with($this->tiktok, 'https://')) {
                return $this->tiktok;
            }
            // Hapus @ jika ada
            $username = str_replace('@', '', $this->tiktok);
            return 'https://tiktok.com/@' . $username;
        }
        return null;
    }

    /**
     * Method helper untuk mengecek apakah sosial media terisi
     */
    public function hasSocialMedia(string $platform): bool
    {
        return !empty($this->$platform);
    }

    /**
     * Method helper untuk mengecek apakah ada minimal 1 sosial media
     */
    public function hasAnySocialMedia(): bool
    {
        return $this->hasSocialMedia('facebook') 
            || $this->hasSocialMedia('whatsapp')
            || $this->hasSocialMedia('instagram')
            || $this->hasSocialMedia('tiktok');
    }

    /**
     * Method helper untuk mendapatkan array semua sosial media yang aktif
     */
    public function getActiveSocialMedia(): array
    {
        $socials = [];

        if ($this->hasSocialMedia('facebook')) {
            $socials['facebook'] = [
                'name' => 'Facebook',
                'url' => $this->facebook_url,
                'icon' => 'fab fa-facebook',
                'color' => '#1877F2'
            ];
        }

        if ($this->hasSocialMedia('whatsapp')) {
            $socials['whatsapp'] = [
                'name' => 'WhatsApp',
                'url' => $this->whatsapp_url,
                'icon' => 'fab fa-whatsapp',
                'color' => '#25D366'
            ];
        }

        if ($this->hasSocialMedia('instagram')) {
            $socials['instagram'] = [
                'name' => 'Instagram',
                'url' => $this->instagram_url,
                'icon' => 'fab fa-instagram',
                'color' => '#E4405F'
            ];
        }

        if ($this->hasSocialMedia('tiktok')) {
            $socials['tiktok'] = [
                'name' => 'TikTok',
                'url' => $this->tiktok_url,
                'icon' => 'fab fa-tiktok',
                'color' => '#000000'
            ];
        }

        return $socials;
    }

    /**
     * Method untuk mendapatkan atau membuat record tunggal
     */
    public static function getRecord()
    {
        $record = self::first();

        if (!$record) {
            $record = self::create([
                'ranting_nama' => 'Angkatan Muda',
                'logo' => null,
                'banner_desa' => null,
                'facebook' => null,
                'whatsapp' => null,
                'instagram' => null,
                'tiktok' => null,
            ]);
        }

        return $record;
    }

    /**
     * Boot method untuk memastikan hanya 1 record
     */
    protected static function boot()
    {
        parent::boot();

        // Hapus logo lama saat update
        static::updating(function ($setting) {
            if ($setting->isDirty('logo') && $setting->getOriginal('logo')) {
                Storage::disk('public')->delete($setting->getOriginal('logo'));
            }
            
            if ($setting->isDirty('banner_desa') && $setting->getOriginal('banner_desa')) {
                Storage::disk('public')->delete($setting->getOriginal('banner_desa'));
            }
        });

        // Hapus file saat delete
        static::deleting(function ($setting) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            if ($setting->banner_desa) {
                Storage::disk('public')->delete($setting->banner_desa);
            }
        });
    }
}