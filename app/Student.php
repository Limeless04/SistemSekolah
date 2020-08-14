<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = ['id_siswa','nama','no_hp_ortu','kelas','email','npsn','alamat_sekolah','nama_sekolah','jenjang','password'];
    protected $hidden =[
        'remember_token','password'
    ];

    public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = bcrypt($val);
    }
}
