<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaUas extends Model
{
    protected $table ="siswa_10_uas";
    protected $fillable = ['nama','nis','nilai'];
}
