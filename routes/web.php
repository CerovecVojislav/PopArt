<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OglasController;
use App\Http\Controllers\AdminOglasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategorijasController;
use Illuminate\Support\Facades\Route;
use App\Models\Kategorija;
use App\Models\Oglasi;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['oglasiLista'=>Oglasi::all(),
     'kategorija'=>Kategorija::all()]);
});

Route::get('/', [KategorijasController::class, 'welcome'])->name('welcome'); 

Route::middleware('admin')->group(function () {
    Route::get('/userForm{id}',[CustomerController::class, 'userForm'])->name('userForm');    
    Route::get('/form',[AdminOglasController::class, 'form'])->name('form');
    Route::get('/formK',[KategorijasController::class, 'formK'])->name('formK');
    Route::get('/formKUpdate{id}',[KategorijasController::class, 'formKUpdate'])->name('formKUpdate');
    Route::get('/aupdateForm{id}',[AdminOglasController::class, 'aupdateForm'])->name('aupdateForm');
    Route::post('/aoglasi/create', [AdminOglasController::class, 'acreateOglas'])->name('acreateOglas');
    Route::get('/aoglasi/getOglasiByVlasnik', [AdminOglasController::class, 'agetOglasiByVlasnik'])->name('agetOglasiByVlasnik');
    Route::post('/aoglasi/update/{id}', [AdminOglasController::class, 'aupdateOglas'])->name('aupdateOglas');
    Route::get('/aoglasi/delete/{id}', [AdminOglasController::class, 'adeleteOglas'])->name('adeleteOglas');
    Route::get('/user/get', [CustomerController::class, 'getUsers'])->name('getUsers');
    Route::get('/user/delete/{id}', [CustomerController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/user/update/{id}', [CustomerController::class, 'updateUser'])->name('updateUser');
    Route::get('kategorije/get', [KategorijasController::class, 'getKategorije'])->name('getKategorije');
    Route::post('/kategorije/create', [KategorijasController::class, 'createKategorija'])->name('createKategorija');
    Route::post('/kategorije/update/{id}', [KategorijasController::class, 'updateKategorije'])->name('updateKategorije');
    Route::get('/kategorije/delete/{id}', [KategorijasController::class, 'deleteKategorije'])->name('deleteKategorije');
});
Route::middleware('customer')->group(function () {    
    Route::get('/form', [OglasController::class, 'form'])->name('form');
    Route::get('/updateForm{id}',[OglasController::class, 'updateForm'])->name('updateForm');
    Route::post('/oglasi/create', [OglasController::class, 'createOglas'])->name('createOglas');
    Route::post('/oglasi/update/{id}', [OglasController::class, 'updateOglas'])->name('updateOglas');
    Route::get('/oglasi/delete/{id}', [OglasController::class, 'deleteOglas'])->name('deleteOglas');
});




/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/oglasi/get', [OglasController::class, 'getOglasi'])->name('getOglasi');

Route::get('/oglasi/getOglasById/{id}', [OglasController::class, 'getOglasById'])->name('getOglasById');
Route::get('/oglasi/getOglasiByVlasnik', [OglasController::class, 'getOglasiByVlasnik'])->name('getOglasiByVlasnik');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/searchByKategorija/{id}', [SearchController::class, 'searchByKategorija'])->name('searchByKategorija');
Route::get('/searchByKategorija2/{id}', [SearchController::class, 'searchByKategorija2'])->name('searchByKategorija2');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';