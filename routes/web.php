<?php

use App\Http\Controllers\CampagneCrudController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/test', [TestController::class, 'test'])->name('test');

Route::get('/campagnes/create', [CampagneCrudController::class, 'form'])->name('campagne.create');
Route::post('/campagnes/create', [CampagneCrudController::class, 'create'])->name('campagne.createHandle');
Route::get('/campagnes', [CampagneCrudController::class, 'read'])->name('campagne.liste');
Route::get('/campagnes/{campagne}', [CampagneCrudController::class, 'read'])->name('campagne.details');
Route::get('/campagnes/{campagne}/update', [CampagneCrudController::class, 'form'])->name('campagne.update');
Route::post('/campagnes/{campagne}/update', [CampagneCrudController::class, 'update'])->name('campagne.updateHandle');
Route::get('/campagnes/{campagne}/delete', [CampagneCrudController::class, 'delete'])->name('campagne.delete');
