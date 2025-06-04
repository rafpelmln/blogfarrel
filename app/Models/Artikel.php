<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = 
    [
        'judul',
        'isi',
        'kategori_id'
    ];

    public function kategori ()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔥 Tambahkan relasi ke komentar
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
