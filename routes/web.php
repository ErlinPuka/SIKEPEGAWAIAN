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



// Route::get('/', function () {
//     return view('index');
// });

/**Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

*/

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/staf', function () {
    return view('staf');
});
Route::get('/datastaf_entry', function () {
    return view('datastaf_entry');
});

Route::get('/supir', function () {
    return view('supir');
});
Route::get('/palet', function () {
    return view('palet');
});
Route::get('/mesin', function () {
    return view('mesin');
});
Route::get('/kenek', function () {
    return view('kenek');
});
Route::get('/datapegawai', function () {
    return view('datapegawai');
});
Route::get('/absen', function () {
    return view('absen');
});
Route::get('/jamkerja', function () {
    return view('jamkerja');
});
Route::get('/pengaturan', function () {
    return view('pengaturan');
});
