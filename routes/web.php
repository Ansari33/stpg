<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\NomorSuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataInformasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingController;
use App\Models\Kecamatan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Storage;



// Route::get('/gambar-file/{filename}', function ($filename) {
//     $path = 'gambar/' . $filename;
//     if (!Storage::exists($path)) abort(404);
//     return response()->file(storage_path('app/private/' . $path));
// });

Route::get('/', function () { return view('welcome');})->name('admin');
Route::middleware(['auth', 'verified'])->group(function () {
  Volt::route('dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified'])->prefix('permintaan')->group(function () {
  Volt::route('/', 'permintaan.index')->name('permintaan');
  Volt::route('add', 'permintaan.add')->name('permintaan.add');
  Volt::route('edit/{id}', 'permintaan.edit')->name('permintaan.edit');
  Route::get('/delete/{id}', [PermintaanController::class, 'delete'])->name('permintaan.delete');    
});

Route::middleware(['auth', 'verified'])->prefix('guru')->group(function () {
    Volt::route('/', 'guru.index')->name('guru');
    Volt::route('add', 'guru.add')->name('guru.add');  
    Volt::route('edit/{id}', 'guru.edit')->name('guru.edit'); 
    Route::get('/delete/{id}', [guruController::class, 'delete'])->name('guru.delete');
    Volt::route('import', 'guru.import')->name('guru.import');      
});

Route::middleware(['auth', 'verified'])->prefix('nomor-surat')->group(function () {
    Volt::route('/', 'nomor-surat.index')->name('nomor-surat');
    //Route::get('/', [NomorSuratController::class, 'index'])->name('nomor-surat');
    Route::get('/add', [NomorSuratController::class, 'add'])->name('nomor-surat.add');  
    Route::post('/store', [NomorSuratController::class, 'store'])->name('nomor-surat.store');     
    Route::get('/edit/{id}', [NomorSuratController::class, 'edit'])->name('nomor-surat.edit');
    Route::patch('/update', [NomorSuratController::class, 'update'])->name('nomor-surat.update');
    Route::get('/delete/{id}', [NomorSuratController::class, 'delete'])->name('nomor-surat.delete');  
});

Route::middleware(['auth', 'verified'])->prefix('kegiatan')->group(function () {
  Volt::route('/', 'kegiatan.index')->name('kegiatan');
  Volt::route('add', 'kegiatan.add')->name('kegiatan.add');
  Volt::route('edit/{id}', 'kegiatan.edit')->name('kegiatan.edit');
  Route::get('/delete/{id}', [KegiatanController::class, 'delete'])->name('kegitatan.delete');
  Volt::route('/search', 'kegiatan.search')->name('kegiatan.search');    
});


Route::prefix('pengajuan')->group(function () {
    Volt::route('/', 'pengajuan.index')->name('pengajuan');
    Volt::route('add', 'pengajuan.add')->name('pengajuan.add');
    Volt::route('edit/{id}', 'pengajuan.edit')->name('pengajuan.edit');
    Route::get('/delete/{id}', [DataInformasiController::class, 'delete'])->name('pengajuan.delete');
    Route::get('/export', [DataInformasiController::class, 'delete'])->name('pengajuan.export'); 
    Route::get('/kwitansi/{id}', [PermintaanController::class, 'kwitansi'])->name('pengajuan.kwitansi');    
});

Route::prefix('landing-set')->group(function () {
    Volt::route('/', 'landing-set.index')->name('landing-set');
    Volt::route('edit/{id}', 'landing-set.edit')->name('landing-set.edit');
});


Route::middleware(['auth', 'verified'])->prefix('zi')->group(function () { 
  Volt::route('/', 'konten.index')->name('zi');
});

Route::middleware(['auth', 'verified'])->prefix('data-informasi')->group(function () {
  Volt::route('/', 'data-informasi.index')->name('data-informasi');
  Volt::route('add', 'data-informasi.add')->name('data-informasi.add');
  Volt::route('edit/{id}', 'data-informasi.edit')->name('data-informasi.edit');
  Route::get('/delete/{id}', [DataInformasiController::class, 'delete'])->name('data-informasi.delete');    
});


Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
  Route::get('/', [UserController::class, 'index'])->name('user');
  Route::get('/setrole/{u}/{r}', [UserController::class, 'setRole'])->name('user.role');    
});

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');

  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});


Route::get('/makeadmin', function () {
  auth()->user()->assignRole('admin');
  return 'success';
});


require __DIR__ . '/auth.php';
