<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampagneCrudController;
use App\Http\Controllers\SendCampagneController;
use App\Http\Controllers\SouscriptionController;

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

Route::get('/campagnes/create', [CampagneCrudController::class, 'form'])->name('campagne.create')->can('admin');
Route::post('/campagnes/create', [CampagneCrudController::class, 'create'])->name('campagne.createHandle')->can('admin');
Route::get('/campagnes', [CampagneCrudController::class, 'read'])->name('campagne.liste');
Route::get('/campagnes/{campagne}', [CampagneCrudController::class, 'read'])->name('campagne.details');
Route::get('/campagnes/{campagne}/update', [CampagneCrudController::class, 'form'])->name('campagne.update')->can('admin');
Route::post('/campagnes/{campagne}/update', [CampagneCrudController::class, 'update'])->name('campagne.updateHandle')->can('admin');
Route::get('/campagnes/{campagne}/delete', [CampagneCrudController::class, 'delete'])->name('campagne.delete')->can('admin');

Route::get('/campagnes/{campagne}/subscribe', [SouscriptionController::class, 'subscriptionForm'])->name('campagne.subscribe');
Route::post('/campagnes/{campagne}/subscribe', [SouscriptionController::class, 'subscribe'])->name('campagne.subscribe');
Route::get('/campagnes/{campagne}/unsubscribe/{token}', [SouscriptionController::class, 'unsubscribe'])->name('campagne.unsubscribe');

Route::get('/campagnes/{campagne}/send', [SendCampagneController::class, 'send'])->name('campagne.send')->can('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
