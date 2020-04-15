<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa_temp extends Model
{
    protected $table = "siswa_10_uts_temp";

     protected $fillable = ['nama', 'nis' ,'nilai'];

}
