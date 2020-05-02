<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public function isAdmin()
    {
        if($this->jabatan == 'Admin') return true;
        return false;
    }
    public function isGuru()
    {
        if($this->jabatan == 'Guru') return true;
        return false;
    }
    public function isSiswa()
    {
        if($this->jabatan == 'Siswa') return true;
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','jabatan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
