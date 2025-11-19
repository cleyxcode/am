<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKetua extends Model
{
    use HasFactory;

    protected $table = 'informasi_ketua';

    protected $fillable = [
        'nama',
        'foto',
        'umur',
        'deskripsi',
    ];

    protected $casts = [
        'umur' => 'integer',
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
                'nama' => 'Ketua Ranting',
                'foto' => null,
                'umur' => 25,
                'deskripsi' => '<p>Informasi ketua ranting akan ditampilkan di sini. Silakan update melalui panel admin.</p>',
            ]);
        }

        return $record;
    }
}