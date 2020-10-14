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
Auth::routes();

//home route
Route::get('/home', 'HomeController@index')->middleware('pegawai')->name('dashboard');
Route::get('/', 'HomeController@home')->name('welcome');

Route::resource('users', 'UserController')->middleware('admin');


Route::resource('surat', 'SuratController')->middleware('pegawai');
Route::post("/surat/delete/{id}", "SuratController@delete")->middleware('pegawai')->name("surat.delete");
Route::resource('pegawai', 'PegawaiController')->middleware('pegawai');


//arsip route

Route::group(["prefix" => "/recycle"], function () {
    Route::get("/surat", "RecycleController@index")->middleware('pegawai')->name("recycle.index");
    Route::post("/surat/delete/{id}", "RecycleController@delete")->middleware('pegawai')->name("recycle.delete");
    Route::post("/surat/restore/{id}", "RecycleController@restore")->middleware('pegawai')->name("recyle.restore");
    Route::get("/pegawai", "RecycleController@index1")->middleware('pegawai')->name("recycle.pegawai");
    Route::post("/pegawai/delete/{id}", "RecycleController@delete1")->middleware('pegawai')->name("recycle.delete1");
    Route::post("/pegawai/restore/{id}", "RecycleController@restore1")->middleware('pegawai')->name("recyle.restore1");
  });

Route::group(["prefix" => "/laporan"], function () {
    Route::get("surat/keseluruhan", "LaporanController@keseluruhan")->middleware('pegawai')->name("laporan.keseluruhan");
    Route::get("pegawai/keseluruhan1", "LaporanController@keseluruhan1")->middleware('pegawai')->name("laporan.keseluruhan1");
    Route::get("surat/masuk/", "LaporanController@masuk")->middleware('pegawai')->name("laporan.masuk");
    Route::get("surat/keluar/", "LaporanController@keluar")->middleware('pegawai')->name("laporan.keluar");
    Route::get("surat/pengirim/", "LaporanController@pengirim")->middleware('pegawai')->name("laporan.pengirim");
    Route::get("surat/bulanan/", "LaporanController@bulanan")->middleware('pegawai')->name("laporan.bulanan");
    Route::get("surat/tahunan/", "LaporanController@tahunan")->middleware('pegawai')->name("laporan.tahunan");
  });

