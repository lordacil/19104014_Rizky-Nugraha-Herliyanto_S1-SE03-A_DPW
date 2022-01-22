<?php

use App\Models\Student;
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

// route untuk mengakses halaman index
Route::get('/', 'MyController@index')->name('index');

// route untuk mengakses halaman about 
Route::get('/tentang', 'MyController@about')->name('about');

//route ke halaman student
Route::get('/mahasiswa', 'StudentController@index')->name('student.index');

//route ke halaman student create
Route::get('/mahasiswa/tambah', 'StudentController@create')->name('student.create');

//route ke untuk simpan
Route::post('/mahasiswa/tambah', 'StudentController@store')->name('student.store');

//route untuk edit
Route::get('/mahasiswa/edit/{id}', 'StudentController@edit')->name('student.edit');

//route untuk update data
Route::put('/mahasiswa/edit/{id}', 'StudentController@update')->name('student.update');

//route untuk menghapus data 
Route::delete('/mahasiswa/hapus/{id}', 'StudentController@destroy')->name('student.destroy');
