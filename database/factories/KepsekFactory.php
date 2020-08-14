<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Headmaster;
use Faker\Generator as Faker;

$factory->define(Headmaster::class, function (Faker $faker) {
    return [
        'id_kepsek' => $faker->randomDigit(),
        'nama' =>$faker->name,
        'nama_sekolah'=>'SMP 1 N',
        'alamat_sekolah'=>'Semarang',
        'nisn'=>$faker->unique()->randomDigit(),
        'jenjang'=>'SMP',
        'no_hp'=>$faker->phoneNumber,
        'email'=>$faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
    ];
});

