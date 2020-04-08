<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaUas extends Model
{
    protected $table ="siswauas";
    protected $fillable = ['nama','nis','nilai'];
}
