<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersembahanKhusus extends Model
{
    protected $table = "persembahan_khusus";
    protected $guarded = [];
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'no_kk', 'no_kk');
    }
}
