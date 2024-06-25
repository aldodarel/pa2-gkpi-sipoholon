<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita_Pelayan extends Model
{
    protected $table = "berita_pelayan";
    protected $fillable = ['id_berita','id_pelayan','updated_at'];
    public $timestamps = true;

    protected $primaryKey = null; // Tidak ada kunci utama diatur secara eksplisit

    // Tambahkan properti untuk menandai bahwa kunci utama adalah gabungan
    public $incrementing = false;

    // Override fungsi getKey untuk mengembalikan nilai kunci utama yang sesuai
    public function getKey()
    {
        return $this->attributes['id_berita'] . '-' . $this->attributes['id_pelayan'];
    }
}