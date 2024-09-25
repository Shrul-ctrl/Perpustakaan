<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'jumlah_kembali','tanggal_kembali','status','id_peminjaman','id_buku'];
    public $timestamps = true;

    protected $table = peminjamen;

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function peminjamens()
    {
        return $this->belongsTo(Peminjamens::class,'id_peminjaman');
    }
}