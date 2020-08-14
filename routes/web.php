<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/create1', 'HomeController@create1');
Route::get('/create2', 'HomeController@create2');
Route::get('/create3', 'HomeController@create3');
Route::post('/store1','HomeController@store1');
Route::post('/store2','HomeController@store2');
Route::post('/store3','HomeController@store3');

Route::get('/login','LoginController@login');
Route::post('/login','LoginController@authenticate')->name('login');

Route::get('/guru', 'TeacherController@index')->middleware('auth:teacher');
Route::get('/guru/check', 'TeacherController@check')->middleware('auth:teacher');
Route::get('/guru/questBank', 'TeacherController@questBank')->middleware('auth:teacher');
Route::get('/guru/jsonQuest', 'TeacherController@jsonQuest')->middleware('auth:teacher');
Route::get('/guru/import_quest', 'TeacherController@showTeacherImportForm')->middleware('auth:teacher');
Route::post('/guru/import_quest', 'TeacherController@import_soal_excel')->middleware('auth:teacher');


Route::get('/guru/dataSiswa', 'TeacherController@listStudents')->middleware('auth:teacher');
Route::get('/guru/import_data', 'TeacherController@showStudentsImportForm')->middleware('auth:teacher');
Route::get('/guru/belajar', 'TeacherController@belajar')->middleware('auth:teacher');
Route::post('/guru/belajar', 'TeacherController@postBelajar')->middleware('auth:teacher');
Route::get('/guru/jsonSiswa', 'TeacherController@jsonSiswa')->middleware('auth:teacher');
Route::get('/guru/absensi', 'TeacherController@absensi')->middleware('auth:teacher');
Route::post('/guru/postAbsensi', 'TeacherController@postAbsensi')->middleware('auth:teacher');
Route::get('/guru/task', 'TeacherController@task')->middleware('auth:teacher');
Route::post('/guru/task', 'TeacherController@postTask')->middleware('auth:teacher');
Route::get('/guru/quiz', 'TeacherController@quiz')->middleware('auth:teacher');
Route::post('/guru/import_data', 'TeacherController@import_excel')->middleware('auth:teacher');


Route::get('/admin','AdminController@index');
Route::get('/admin/data_sekolah','AdminController@dataSekolah');
Route::get('/admin/json','AdminController@json');

Route::get('/kepsek','HeadmasterController@index')->middleware('auth:headmaster');
Route::get('/kepsek/data_guru','HeadmasterController@teachersList')->middleware('auth:headmaster');
Route::get('/kepsek/import_data','HeadmasterController@showImportTeacherForm')->middleware('auth:headmaster');
Route::get('/kepsek/jsonGuru','HeadmasterController@jsonGuru')->middleware('auth:headmaster');
Route::get('/logout', 'LoginController@logout');


Route::post('/kepsek/import_data','HeadmasterController@import_excel')->middleware('auth:headmaster');


Route::get('/siswa','StudentController@index')->middleware('auth:student');