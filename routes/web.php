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
 * ᚛ kurang buat halaman untuk ganti dashboard (yang ada petanya) OK
 * ᚛ cari pelanggan dari marker OK
 * ᚛ buat 9 unit di overLayer OK
 * ᚛ edit polygon berdasarkan nama yang login X
 * ᚛ edit marker berdasarkan nama yang login X
 * ᚛ kalo pake database postgis ingat "ST_AsGeoJSON" untuk rubah format geometry jadi coordinate OK
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
    Route::get('getAllPelanggan', 'allUnitController@getPelanggan')->name('getAllPelanggan');
    Route::get('getArjasaPelanggan', 'arjasaController@getPelanggan')->name('getArjasaPelanggan');
    Route::get('getAsembagusPelanggan', 'asembagusController@getPelanggan')->name('getAsembagusPelanggan');
    Route::get('getBanyuputihPelanggan', 'banyuputihController@getPelanggan')->name('getBanyuputihPelanggan');
    Route::get('getBesukiPelanggan', 'besukiController@getPelanggan')->name('getBesukiPelanggan');
    Route::get('getJatibantengPelanggan', 'jatibantengController@getPelanggan')->name('getJatibantengPelanggan');
    Route::get('getKaponganPelanggan', 'kaponganController@getPelanggan')->name('getKaponganPelanggan');
    Route::get('getKenditPelanggan', 'kenditController@getPelanggan')->name('getKenditPelanggan');
    Route::get('getMangaranPelanggan', 'mangaranController@getPelanggan')->name('getMangaranPelanggan');
    Route::get('getPanarukanPelanggan', 'panarukanController@getPelanggan')->name('getPanarukanPelanggan');
    Route::get('getSitubondoPelanggan', 'situbondoController@getPelanggan')->name('getSitubondoPelanggan');

    /* Route::get('test', 'allUnitController@index'); */
});

/* Route::get('/resources/views/peta/js/{filename}', function($filename){ */
Route::get('/assets/{filename}', function ($filename) {
    $path = resource_path() . '/js/peta/' . $filename;
    if (!File::exists($path)) {
        return response()->json(['message' => 'File not found.', 'path' => $path], 404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});


require __DIR__ . '/auth.php';
