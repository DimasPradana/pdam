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
    Route::get('/', 'allUnitController@index');
    Route::get('arjasa', 'arjasaController@index')->name('arjasa');
    Route::get('asembagus', 'asembagusController@index')->name('asembagus');
    Route::get('banyuputih', 'banyuputihController@index')->name('banyuputih');
    Route::get('besuki', 'besukiController@index')->name('besuki');
    Route::get('jatibanteng', 'jatibantengController@index')->name('jatibanteng');
    Route::get('kapongan', 'kaponganController@index')->name('kapongan');
    Route::get('kendit', 'kenditController@index')->name('kendit');
    Route::get('mangaran', 'mangaranController@index')->name('mangaran');
    Route::get('panarukan', 'panarukanController@index')->name('panarukan');
    Route::get('situbondo', 'situbondoController@index')->name('situbondo');

    /* Route::get('test', 'allUnitController@index'); */
});


require __DIR__ . '/auth.php';
