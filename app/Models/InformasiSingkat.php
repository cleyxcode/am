<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiSingkat extends Model
{
    use HasFactory;

    protected $table = 'informasi_singkat';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
    ];

    /**
     * Accessor untuk mendapatkan URL foto
     */
    public function getFotoUrlAttribute(): ?string
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return null;
    }

    /**
     * Method untuk mendapatkan atau membuat record tunggal
     */
    public static function getRecord()
    {
        $record = self::first();

        if (!$record) {
            $record = self::create([
                'judul' => 'Informasi Angkatan Muda',
                'deskripsi' => '<p>Selamat datang di halaman Angkatan Muda. Silakan update informasi ini melalui panel admin.</p>',
                'foto' => null,
            ]);
        }

        return $record;
    }
}