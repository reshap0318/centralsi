<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table ='publikasi';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function anggotas() 
    {
    	return $this->hasMany(PublikasiDosen::class);
    }
}
