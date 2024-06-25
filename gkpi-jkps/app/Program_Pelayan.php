<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_Pelayan extends Model
{
    protected $table = "program_pelayan";
    protected $fillable = ['id_program','id_pelayan', 'updated_at'];
    public $timestamps = true;

    protected $primaryKey = null; // Tidak ada kunci utama diatur secara eksplisit

    // Tambahkan properti untuk menandai bahwa kunci utama adalah gabungan
    public $incrementing = false;

    // Override fungsi getKey untuk mengembalikan nilai kunci utama yang sesuai
    public function getKey()
    {
        return $this->attributes['id_program'] . '-' . $this->attributes['id_pelayan'];
    }
}