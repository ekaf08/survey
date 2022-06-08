<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataindividuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NonaktifController;
use App\Http\Controllers\RumahtanggaController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\NonbpjsController;
use App\Models\DataIndividu;
use App\Models\DataWarga;
use App\Models\Rumahtangga;

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


// Route::redirect('/', '/dashboard');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


//edit
Route::get('/main/tampil/{no_kk}', [DataWargaController::class, 'tampilwarga'])->name('tampilwarga')->middleware('auth');
Route::post('/entridata/updatewarga', [DataWargaController::class, 'updatewarga'])->name('updatewarga')->middleware('auth');
// Route::get('/main/data_ART/{nama_kepala_keluarga}', [DataindividuController::class, 'tampilART'])->name('tampilART')->middleware('auth');
// form input
Route::get('/entridata/validasi-data-warga', [DataWargaController::class, 'showDataWarga']);
Route::get('/entridata/form-data-individu', [DataindividuController::class, 'showDataIndividu']);

//Data Table
Route::get('/main/list-data-individu', [DataindividuController::class, 'listDataIndividu'])->name('listDataIndividu')->middleware('auth');
Route::get('/main/data-warga', [DataWargaController::class, 'listDataWarga'])->name('listDataWarga')->middleware('auth');
Route::get('/main/list-data-rumahtangga', [RumahtanggaController::class, 'listDataRumahtangga'])->name('listDataIndividu')->middleware('auth');
Route::get('/main/prelist_survei', [DataWargaController::class, 'listSurvei'])->name('listSurvei')->middleware('auth');
Route::get('/main/data_warga', [DataWargaController::class, 'tbldatawarga'])->name('tbldatawarga')->middleware('auth');


// Insert Data
Route::post('/entridata/svDataindividu', [DataindividuController::class, 'svDataindividu'])->name('svDataindividu')->middleware('auth');
Route::post('/entridata/svDatarumahtangga', [RumahtanggaController::class, 'svDatarumahtangga'])->name('svDatarumahtangga')->middleware('auth');
Route::post('/entridata/svDataWarga', [DataWargaController::class, 'svDataWarga'])->name('svDataWarga')->middleware('auth');
// Route::post('/entridata/tambah_prelist', [DataWargaController::class, 'tambah_prelist'])->name('tambah_prelist')->middleware('auth');
# Dashboard
Route::get('/entridata/form-data-rumahtangga', [RumahtanggaController::class, 'showDatarumahtangga'])->middleware('auth');


Route::get('/entridata/form_prelist', [DataWargaController::class, 'show_form_prelist'])->name('show_form_prelist')->middleware('auth');

// PDF
Route::get('/entridata/form_cetak', [DataWargaController::class, 'show_form_cetak'])->name('show_form_cetak')->middleware('auth');
Route::get('/entridata/cetak_pdf', [DataWargaController::class, 'cetak_pdf'])->name('cetak_pdf')->middleware('auth');


//coba LiveWire
Route::get('/livewire/coba-tambah', [DataWargaController::class, 'FormCoba']);
