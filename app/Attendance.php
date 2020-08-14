<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['kelas_siswa','nama_siswa','id_siswa','status'];
}
