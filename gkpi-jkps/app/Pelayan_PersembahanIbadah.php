<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelayan_PersembahanIbadah extends Model
{
    protected $table = "pelayan_persembahanibadah";
    protected $fillable = ['id_persembahan','id_pelayan'];
}