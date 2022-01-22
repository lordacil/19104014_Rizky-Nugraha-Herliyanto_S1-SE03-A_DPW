<?php

use App\Http\Controllers\AboutController;
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
// Route::get('/tentang', 'MyController@about')->name('about');

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


// ABOUT
// Route About
Route::get('/tentang', 'AboutController@index')->name('about.index');

//about view create
Route::get('/tentang/tambah', 'AboutController@create')->name('about.create');

//post
Route::post('/tentang/tambah', 'AboutController@store')->name('about.store');

//view edit 
Route::get('/tentang/edit/{id}', 'AboutController@edit') ->name('about.edit');

Route::put('/tentang/edit/{id}', 'AboutController@update') ->name('about.update');

Route::delete('/tentang/hapus/{id}', 'AboutController@destroy')->name('about.destroy');

// PRODUK
Route::get('/product', 'ProductController@index')->name('product.index');

// input
Route::get('/product/tambah', 'ProductController@create')->name('product.create');

//post
Route::post('/product/tambah', 'ProductController@store')->name('product.store');

//hapus
Route::delete('/product/hapus/{id}', 'ProductController@destroy')->name('product.destroy');

//edit
Route::get('/product/edit/{id}', 'ProductController@edit') ->name('product.edit');

Route::put('/product/edit/{id}', 'ProductController@update') ->name('product.update');