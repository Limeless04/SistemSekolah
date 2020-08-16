<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['mapel','materi','kelas','keterangan','tgl_kumpul','guru'];
}
