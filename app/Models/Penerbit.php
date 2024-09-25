<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
        use HasFactory;
        protected $fillable = ['id', 'nama_penerbit','alamat'];
        public $timestamps = true;
    
        public function buku()
        {   
            return $this->hasOne(Buku::class);
        } 
}
