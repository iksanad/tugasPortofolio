<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;

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

// Mid Auth
Route::middleware('auth')->group(function(){
	Route::resource('/dashboard', DashboardController::class);
	Route::post('logout', [LoginController::class, 'logout']);

	Route::resource('/master-siswa', SiswaController::class);
	Route::get('/master-siswa/{id}/hapus', [SiswaController::class, 'hapus'])->name('master-siswa.hapus');

	Route::resource('/master-project', ProjectController::class);
	Route::get('/master-project/tambah/{id}', [ProjectController::class, 'tambah'])->name('master-project.tambah');
	Route::get('/master-project/ubah/{id}', [ProjectController::class, 'edit'])->name('master-project.ubah');

	Route::resource('/master-kontak', KontakController::class);
	Route::post('/master-kontak/tambah', [KontakController::class, 'tambah'])->name('master-kontak.tambah');	// Add JK
	Route::get('/master-kontak/create/{id}', [KontakController::class, 'create'])->name('master-kontak.buat');	  // Add Contact
	Route::get('/master-kontak/ubah/{id}', [KontakController::class, 'edit'])->name('master-kontak.ubah');
	Route::get('/master-kontak/{id}/hapus', [KontakController::class, 'hapus'])->name('master-kontak.hapus');
});

// Mid Guest
Route::middleware('guest')->group(function(){
	Route::get('login', [LoginController::class, 'index'])->name('login');
	Route::post('login', [LoginController::class, 'authenticate']);
});

// Portofolio
Route::get('/', [ClientController::class, 'index']);
Route::get('/hero', [ClientController::class, 'hero']);
Route::get('/about', [ClientController::class, 'about']);
Route::get('/projects', [ClientController::class, 'projects']);
Route::get('/contact', [ClientController::class, 'contact']);
