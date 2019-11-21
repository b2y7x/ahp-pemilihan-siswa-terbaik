<?php

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
Auth::routes();
Route::group(array('middleware' => 'auth'), function()
{
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin', 'AdminController');

Route::resource('kriteria', 'KriteriaController');
Route::resource('sub_kriteria', 'SubKriteriaController',
                ['only' => ['show', 'destroy', 'store', 'update']]);
Route::get('/sub_kriteria/{kode_kriteria}/create','SubKriteriaController@create')->name('sub_kriteria.create');
Route::get('/sub_kriteria/{kode_kriteria}/edit','SubKriteriaController@edit')->name('sub_kriteria.edit');
Route::get('/hasil/{jurusan}/{kelas}','HasilController@hasil')->name('hasil.index');
Route::get('/hasil/{jurusan}/{kelas}/cetak','HasilController@cetak')->name('hasil.cetak');
Route::resource('alternatif', 'AlternatifController');
Route::resource('bobot_kriteria', 'BobotKriteriaController');
Route::resource('bobot_sub_kriteria', 'BobotSubKriteriaController');

Route::get('/hasil', function () {
    return view('perhitungan.jurusan');
});
Route::get('/hasil/{jurusan}','HasilController@kelas')->name('hasil.kelas');
Route::get('/hasil/{jurusan}/kelas', function () {
    return view('perhitungan.kelas');
});
});