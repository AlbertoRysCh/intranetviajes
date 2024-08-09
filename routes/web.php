<?php

use App\Http\Controllers\CreatePackagesController;
use App\Http\Controllers\CreateTravelsController;
use App\Http\Controllers\CreatePassengerController;
use App\Http\Controllers\CreateGroupsController;
use App\Http\Controllers\CreatePaymentsController;
use App\Http\Controllers\health_sheetController;
use App\Http\Controllers\Sheet_NutritionalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\UserController;

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

Route::get('/usuarios', [UserController::class, 'show'])->name('users.mis-datos');
Route::post('/usuarios', [UserController::class, 'update'])->name('user.update');
Route::put('/usuarios/update-foto', [UserController::class, 'updateFoto'])->name('usuarios.updateFoto');

Route::get('/ficha-medica', [health_sheetController::class, 'show'])->name('ficha-medica.show');
Route::post('/ficha-medica', [health_sheetController::class, 'store'])->name('ficha-medica.store');


Route::get('/ficha-nutricional', [Sheet_NutritionalController::class, 'show'])->name('nutritional-sheet.show');
Route::post('/ficha-nutricional', [Sheet_NutritionalController::class, 'store'])->name('nutritional-sheet.store');

Route::get('/tu-viaje', function () {
    return view('users.tu-viaje');
})->middleware(['auth', 'verified'])->name('tu-viaje');

Route::get('/viajes', function () {
    return view('users.viajes');
})->middleware(['auth', 'verified'])->name('viajes');

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

Route::get('/mi-perfil', function () {
    return view('users.mi-perfil');
})->middleware(['auth', 'verified'])->name('mi-perfil');



require __DIR__.'/auth.php';

