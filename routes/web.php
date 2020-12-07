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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["prefix" => "Admin", "middleware" => "role.Administrator"], function(){
    Route::resource("pendidikan", "Appcontrollers\PendidikanController");
    Route::resource("jabatan", "Appcontrollers\JabatanController");
    Route::resource("tambahAdmin", "AdminController");
    
    // Pelamar
    Route::resource("data_pelamar", "Appcontrollers\DataPelamarController");
    Route::post("verifikasiPelamar/{id}", "Appcontrollers\DataPelamarController@verifikasi");
    
    // Profile
    Route::resource("profile", "Appcontrollers\ProfileController");
});

Route::group(["middleware" => ["role.User", "auth"]], function(){
    Route::resource("tambahUser", "UserController");

    // Pelamar
    Route::resource("data_pelamar", "Appcontrollers\DataPelamarController");
    Route::get("getNamaJabatan", "Appcontrollers\DataPelamarController@getNamaJabatan");
    Route::get("getKodeJabatan", "Appcontrollers\DataPelamarController@getKodeJabatan");
    
    // Profile
    Route::resource("profile", "Appcontrollers\ProfileController");
    Route::post("profile/{id}", "Appcontrollers\ProfileController@update_kataSandi")->name('updateKS');
});