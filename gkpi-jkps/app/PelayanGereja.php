<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// use App\Jemaat;

class PelayanGereja extends Model
{
    //
    protected $table = "pelayan_gereja";

    // Definisi relasi dengan JadwalPelayanan
    public function jadwalPelayanan()
    {
        return $this->hasMany(Jadwal_Pelayanan::class, 'id_pelayan', 'id');
    }

    public function jemaat(){
        return $this->belongsTo(Jemaat::class,"nik", "nik");
    }
}
