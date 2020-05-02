<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Guru extends Model
{
	use Notifiable;

    protected $fillable ={
    	'username',
    	'email',
    	'password'
    };

    protected $hidden = {
    	'password','remember_toke'

    };

    public function setPasswordAttribute($val)
    {
    	return $this->attributes['password'] = bcrypt($val);
    }

}
