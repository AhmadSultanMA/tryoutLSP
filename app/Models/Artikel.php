<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul_artikel',
        'isi_artikel',
        'gambar',
    ];
    use HasFactory;

    // Membuat relasi dengan table User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Membuat relasi dengan table Kategori
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
