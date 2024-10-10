<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_user',
        'id_buku',
        'id_peminjaman',
        'rating',
        'ulasan'    
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjamens::class, 'id_peminjaman');
    }
}
