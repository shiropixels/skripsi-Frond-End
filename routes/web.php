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
//Route Untuk UTS KELAS 10
Route::get('/GuruUts10', 'GuruControllerUts@indexUts');
Route::get('downloadDataUts/{type}','GuruControllerUts@downloadDataUts');
Route::post('/GuruUts10/importUts','GuruControllerUts@importUts');
//Route Untuk UAS Kelas 10
Route::get('/GuruUas10','guruControllerUAS@indexUas');
Route::get('downloadDataUas/{type}','guruControllerUAS@downloadDataUas');
Route::post('/GuruUas10/importUas','guruControllerUAS@importUas');
//Route untuk UTS KELAS 11
Route::get('/GuruUts11', 'GuruControllerUts11@indexUts11');
Route::get('downloadDataUts11/{type}','GuruControllerUts11@downloadDataUts11');
Route::post('/GuruUts11/importUts11','GuruControllerUts11@importUts11');
//ROUTE UNTUK UAS KELAS 11


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/' ,function(){
  if(Auth::check()){
  	return redirect('/home');
  }else{
  	return view('auth.login');
  }
});