<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = "keuangan";
    protected $guarded = [];
    // public function kas()
    // {
    //     return $this->belongsToMany(Kas::class, 'kas_keuangan', 'id_keuangan', 'id_kas');
    // }
    public function kasKeuangan()
    {
        return $this->hasMany(KasKeuangan::class, 'id_keuangan');
    }
}
