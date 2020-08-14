<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable = ['paket_soal','soal','jenis_soal','a','b','c','d','e','jawaban','nama_guru','mapel'];

}
