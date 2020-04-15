<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa_10_uts";

     protected $fillable = ['nama', 'nis' ,'nilai'];

}
