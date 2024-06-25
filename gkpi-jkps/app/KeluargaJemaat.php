<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeluargaJemaat extends Model
{
    //
    protected $table = "jemaat_keluarga";

    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class, 'nik', 'nik');
    }

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'no_kk', 'no_kk');
    }
}