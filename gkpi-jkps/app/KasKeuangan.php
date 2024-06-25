<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasKeuangan extends Model
{
    //
    protected $table = "kas_keuangan";
    protected $fillable = ['id_kas', 'id_keuangan', 'nominal', 'pembagian'];

     // Menonaktifkan primary key yang didefinisikan oleh Eloquent
     public $incrementing = false;
     protected $primaryKey = null; // Kita tidak menggunakan kolom `id` sebagai primary key
     public $timestamps = true;
     
    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'id_keuangan');
    }
    public function kas()
    {
        return $this->belongsTo(Kas::class, 'id_kas');
    }
}