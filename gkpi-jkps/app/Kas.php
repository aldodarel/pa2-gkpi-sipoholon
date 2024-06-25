<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    //
    protected $table = "kas";
    protected $fillable = ['nama_kas', 'pembagian'];

    public function keuangan()
    {
        return $this->belongsToMany(Keuangan::class, 'kas_keuangan', 'id_kas', 'id_keuangan');
    }
}