<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deskripsi_Siswa_11_Uas extends Model
{
    protected $table ="deskripsi_siswa_11_uas";
    protected $fillable = ['no','matapelajaran','kompetensi','catatan'];
}
