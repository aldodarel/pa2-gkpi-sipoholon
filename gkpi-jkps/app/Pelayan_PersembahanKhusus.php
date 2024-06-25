<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelayan_PersembahanKhusus extends Model
{
    protected $table = "pelayan_persembahankhusus";
    protected $fillable = ['id_persembahankhusus','id_pelayan'];
}