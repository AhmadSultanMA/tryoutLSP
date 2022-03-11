<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
    ];
    use HasFactory;

    // Membuat relasi untuk table artikel
    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }
}
