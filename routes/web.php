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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect', 'SocialAuthTwitterController@redirect');
Route::get('/callback', 'SocialAuthTwitterController@callback');

Route::get('event', 'EventController@daftarevent');
Route::get('tambahevent', 'EventController@tambahevent');
Route::post('prosestambahevent','EventController@prosestambahevent');
Route::get('editevent/{idevent}','EventController@editevent');
Route::post('proseseditevent','EventController@proseseditevent');
Route::get('hapusevent/{idevent}','EventController@hapusevent');
Route::get('detailevent/{idevent}','EventController@detailevent');

Route::get('lokasi', 'LokasiController@daftarlokasi');
Route::get('tambahlokasi', 'LokasiController@tambahlokasi');
Route::post('prosestambahlokasi','LokasiController@prosestambahlokasi');
Route::get('editlokasi/{idlokasi}','LokasiController@editlokasi');
Route::post('proseseditlokasi','LokasiController@proseseditlokasi');
Route::get('hapuslokasi/{idlokasi}','LokasiController@hapuslokasi');

Route::get('tiket', 'TiketController@daftartiket');
Route::get('tambahtiket', 'TiketController@tambahtiket');
Route::post('prosestambahtiket','TiketController@prosestambahtiket');
Route::get('edittiket/{idtiket}','TiketController@edittiket');
Route::post('prosesedittiket','TiketController@prosesedittiket');
Route::get('hapustiket/{idtiket}','TiketController@hapustiket');

Route::get('postontwitter/{idevent}', 'EventController@postontwitter');
