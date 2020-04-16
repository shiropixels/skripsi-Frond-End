<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deskripsi_Siswa_10_Uas extends Model
{
    protected $table="deskripsi_siswa_10_uas";
    protected $fillable=['no','matapelajaran','kompetensi','catatan'];
}
