<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa_temp_uas extends Model
{
    protected $table = "siswa_temp_uas";
    protected $fillable = ['nama','nis','nilai'];
}
