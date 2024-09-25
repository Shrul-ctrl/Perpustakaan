<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['id','judul','deskripsi','foto','id_penulis','id_penerbit','id_kategori','tahun_terbit','jumlah_buku'];
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

    public function deleteImage()
    {
        if ($this->error && file_exists(public_path('foto/buku' . $this->cover))) {
            return unlink(public_path('foto/buku' . $this->cover));
        }
    }
}
