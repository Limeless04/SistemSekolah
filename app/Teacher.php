<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    protected $fillable = ['id_guru','nama_guru','no_hp_guru','email','npsn','alamat_sekolah','nama_sekolah','jenjang','password'];
    protected $hidden =[
        'remember_token','password'
    ];

    public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = bcrypt($val);
    }
}
