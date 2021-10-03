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

/**
 * TODO snub on Thu 23 Sep 2021 00:06:48
 * ᚛ kurang buat halaman untuk ganti dashboard (yang ada petanya)
 * ᚛ cari pelanggan dari marker
 * ᚛ buat 9 unit di overLayer
 * ᚛ edit polygon berdasarkan nama yang login
 * ᚛ edit marker berdasarkan nama yang login
 * ᚛ kalo pake database postgis ingat "ST_AsGeoJSON" untuk rubah format geometry jadi coordinate
 */

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'CekController@index')->name('index');
    Route::get('situbondo', 'CekController@situbondo')->name('situbondo');
    Route::get('arjasa', 'CekController@arjasa')->name('arjasa');
    Route::get('test', 'CekController@test')->name('test');
    Route::get('testdb','CekController@testDB');
    Route::get('testdb2','CekController@testDB2');

    /* Route::get('marker', 'CekController@semuaMarker')->name('all.marker'); */
    /* Route::get('polygon', 'CekController@semuaPolygon')->name('all.polygon'); */
    /* Route::get('attribute', 'CekController@semuaAttribute')->name('all.attribute'); */
    Route::get('peta', function(){
        return view('peta');
    })->name('peta');
});



require __DIR__ . '/auth.php';
