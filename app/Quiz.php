<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['quiz_desc','duration','time_end','time_start','paket_quiz','kelas','mapel','quiz_date'];
    protected $table = 'quizzes';
}
