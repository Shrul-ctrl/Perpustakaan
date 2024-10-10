<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'judul', 'deskripsi', 'foto', 'id_penulis', 'id_penerbit', 'id_kategori', 'tahun_terbit', 'jumlah_buku'];
    public $timestamps = true;

    public function penuli()
    {
        return $this->belongsTo(Penuli::class, 'id_penulis');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function peminjamens()
    {
        return $this->hasMany(Peminjamens::class, 'id_buku');
    }

    public function Ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'id_buku', 'id');
    }

    public function deleteImage()
    {
        if ($this->error && file_exists(public_path('foto/buku' . $this->cover))) {
            return unlink(public_path('foto/buku' . $this->cover));
        }
    }
}
