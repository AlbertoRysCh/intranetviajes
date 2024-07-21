<?php

use App\Http\Controllers\CreatePackagesController;
use App\Http\Controllers\CreateTravelsController;
use App\Http\Controllers\CreatePassengerController;
use App\Http\Controllers\CreateGroupsController;
use App\Http\Controllers\CreatePaymentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardAdminController;


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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');  // Asegúrate de que esta vista existe
    }
});
Route::get('/dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboardAdmin');
Route::get('/packages', [CreatePackagesController::class, 'index']);
Route::get('/travels', [CreateTravelsController::class, 'index']);
Route::get('/groups', [CreateGroupsController::class, 'index']);
Route::get('/passengers', [CreatePassengerController::class, 'index']);
Route::get('/payments', [CreatePaymentsController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mis-datos', function () {
    return view('users.mis-datos');
})->middleware(['auth', 'verified'])->name('mis-datos');

Route::get('/ficha-medica', function () {
    return view('users.ficha-medica');
})->middleware(['auth', 'verified'])->name('ficha-medica');

Route::get('/ficha-nutricional', function () {
    return view('users.ficha-nutricional');
})->middleware(['auth', 'verified'])->name('ficha-nutricional');

Route::get('/tu-viaje', function () {
    return view('users.tu-viaje');
})->middleware(['auth', 'verified'])->name('tu-viaje');

Route::get('/mi-itinerario', function () {
    return view('users.mi-itinerario');
})->middleware(['auth', 'verified'])->name('mi-itinerario');

Route::get('/mi-fotoyvideo', function () {
    return view('users.mi-fotoyvideo');
})->middleware(['auth', 'verified'])->name('mi-fotoyvideo');

Route::get('/mi-documento', function () {
    return view('users.mi-documento');
})->middleware(['auth', 'verified'])->name('mi-documento');

Route::get('/mi-checkin', function () {
    return view('users.mi-checkin');
})->middleware(['auth', 'verified'])->name('mi-checkin');

Route::get('/mi-cronograma', function () {
    return view('users.mi-cronograma');
})->middleware(['auth', 'verified'])->name('mi-cronograma');
Route::get('/principal', function () {
    return view('users.principal');
})->middleware(['auth', 'verified'])->name('principal');

require __DIR__.'/auth.php';

