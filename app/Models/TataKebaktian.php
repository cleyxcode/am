<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataKebaktian extends Model
{
    use HasFactory;

    protected $table = 'tata_kebaktian';

    protected $fillable = [
        'model',
        'judul',
        'isi',
        'file_pdf',
    ];

    protected $casts = [
        'model' => 'string',
    ];

    /**
     * Accessor untuk mendapatkan URL file PDF
     */
    public function getPdfUrlAttribute(): ?string
    {
        if ($this->file_pdf) {
            return asset('storage/' . $this->file_pdf);
        }
        return null;
    }
}