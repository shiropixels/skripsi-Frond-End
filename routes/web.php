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
Route::get('/GuruUas11','GuruControllerUas11@indexUas11');
Route::get('downloadDataUas11/{type}','GuruControllerUas11@downloadDataUas11');
Route::post('/GuruUas11/importUas11','GuruControllerUas11@importUas11');
//Route Untuk UTS KELAS 12
Route::get('/GuruUts12', 'GuruControllerUts12@indexUts12');
Route::get('downloadDataUts12/{type}','GuruControllerUts12@downloadDataUts12');
Route::post('/GuruUts12/importUts12','GuruControllerUts12@importUts12');
Auth::routes();
//Route Untuk Deskripsi Siswa Kelas 10
Route::get('/SikapSiswaKelas10', 'GuruControllerDeskripsiSiswa10@indexSikap10');
Route::post('/SikapSiswaKelas10/importSikap10','GuruControllerDeskripsiSiswa10@importSikap10');
//Route Untuk Deskripsi Siswa Kelas 11
Route::get('/SikapSiswaKelas11', 'GuruControllerDeskripsiSiswa11@indexSikap11');
Route::post('/SikapSiswaKelas11/importSikap11','GuruControllerDeskripsiSiswa11@importSikap11');
//route Untuk deskripsi siswa kelas 12
Route::get('/SikapSiswaKelas12', 'GuruControllerDeskripsiSiswa12@indexSikap12');
Route::post('/SikapSiswaKelas12/importSikap12','GuruControllerDeskripsiSiswa12@importSikap12');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/' ,function(){
  if(Auth::check()){
  	return redirect('/home');
  }else{
  	return view('auth.login');
  }
});