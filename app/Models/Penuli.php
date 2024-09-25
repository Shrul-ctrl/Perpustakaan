<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penuli extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_penulis'];
    public $timestamps = true;

    public function buku()
    {   
        return $this->hasOne(Buku::class);
    } 
}
