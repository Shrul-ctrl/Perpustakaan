<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_peminjaman','baca'];
    public $timestamps = true;

    public function peminjamens()
    {
        return $this->hasMany(Peminjamens::class, 'id_peminjaman');
    }


}
