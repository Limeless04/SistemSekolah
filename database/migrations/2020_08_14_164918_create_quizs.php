<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id('id_quiz');
            $table->string('paket_quiz');
            $table->string('mapel');
            $table->string('kelas');
            $table->date('quiz_date');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
            $table->integer('duration');
            $table->string('quiz_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
