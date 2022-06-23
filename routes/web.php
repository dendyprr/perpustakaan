<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;

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

Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan')->middleware('auth');

Route::get('/tambahbuku', [PerpustakaanController::class, 'tambahbuku'])->name('tambahbuku');
Route::post('/insertdata', [PerpustakaanController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [PerpustakaanController::class, 'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}', [PerpustakaanController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [PerpustakaanController::class, 'delete'])->name('delete');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');