<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deskripsi_Siswa_12_Uas extends Model
{
    protected $table = "deskripsi_siswa_12_uas";
    protected $fillable =['no','matapelajaran','kompetensi','catatan'];
}
