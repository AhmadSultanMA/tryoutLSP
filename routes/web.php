<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;

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

// Auth
Route::get('/', [ArtikelController::class, ('artikel')])->name('dashboard');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, ('login')])->name('login');

// Tampilan Admin
Route::get('/admin', function () {
    return view('admin.isidashboard');
})->middleware('role:admin');

// Artikel
Route::get('/artikel', [ArtikelController::class, ('index')])->name('artikel')>middleware('role:admin');

Route::get('/addArtikel', [ArtikelController::class, ('create')])->middleware('role:admin');

Route::post('/addArtikel', [ArtikelController::class, ('store')]);
Route::post('/updateArtikel/{id}', [ArtikelController::class, ('update')])->name('updateartikel');
Route::get('/editArtikel/{id}', [ArtikelController::class, ('show')])->name('editartikel')->middleware('role:admin');
Route::get('/deleteArtikel/{id}', [ArtikelController::class, ('destroy')])->name('deleteartikel')->middleware('role:admin');

// Kategori
Route::get('/kategori', [KategoriController::class, ('index')])->name('kategori')->middleware('role:admin');

Route::get('/addKategori', function () {
    return view('admin.addKategori');
})->middleware('role:admin');

Route::post('/addKategori', [KategoriController::class, ('store')]);
Route::post('/updateKategori/{id}', [KategoriController::class, ('update')])->name('updatekategori');
Route::get('/editKategori/{id}', [KategoriController::class, ('show')])->name('editkategori')->middleware('role:admin');
Route::get('/deleteKategori/{id}', [KategoriController::class, ('destroy')])->name('deletekategori')->middleware('role:admin');

// Baca
Route::get('/baca/{id}', [ArtikelController::class, ('baca')])->name('baca');



