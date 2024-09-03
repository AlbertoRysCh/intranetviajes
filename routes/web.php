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
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/mi-viaje/{groupId}', [DashboardController::class, 'showTripDetails'])->name('tu-viaje');
Route::get('/mi-viaje/{groupId}/itinerario', [DashboardController::class, 'downloadItinerario'])->name('download-itinerario');
Route::get('/mi-viaje/{groupId}/indicaciones', [DashboardController::class, 'downloadIndicaciones'])->name('download-indicaciones');
Route::get('/mi-viaje/{groupId}/recomendaciones', [DashboardController::class, 'downloadRecomendaciones'])->name('download-recomendaciones');
Route::get('/mi-viaje/{groupId}/ropaviajes', [DashboardController::class, 'downloadRopaViaje'])->name('download-ropaviajes');
Route::get('/mi-viaje/{groupId}/permisonotarial', [DashboardController::class, 'downloadPermisoNotarial'])->name('download-permisonotarial');
Route::get('/mi-viaje/{groupId}/voucher', [DashboardController::class, 'downloadVoucher'])->name('download-voucher');
Route::get('/mi-viaje/{groupId}/listaclinicas', [DashboardController::class, 'downloadListaClinicas'])->name('download-listaclinicas');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/usuarios', [UserController::class, 'show'])->name('users.mis-datos');
Route::post('/usuarios', [UserController::class, 'update'])->name('user.update');
Route::put('/usuarios/update-foto', [UserController::class, 'updateFoto'])->name('usuarios.updateFoto');
Route::post('/upload-users', [UserController::class, 'import'])->name('users.import');
Route::get('/importar-usuario', [UserController::class, 'importacionUser'])->name('importar.usuario');


Route::get('/ficha-medica', [health_sheetController::class, 'show'])->name('ficha-medica.show');
Route::post('/ficha-medica', [health_sheetController::class, 'store'])->name('ficha-medica.store');


Route::get('/ficha-nutritional', [Sheet_NutritionalController::class, 'show'])->name('nutritional-sheet.show');
Route::post('/ficha-nutritional', [Sheet_NutritionalController::class, 'store'])->name('nutritional-sheet.store');

Route::get('/mi-checkin', [CheckinController::class, 'show'])->name('mi-checkin.show');
Route::post('/mi-checkin', [CheckinController::class, 'store'])->name('mi-checkin.store');




Route::get('/mi-itinerario', function () {
    return view('users.mi-itinerario');
})->middleware(['auth', 'verified'])->name('mi-itinerario');

Route::get('/mi-fotoyvideo', function () {
    return view('users.mi-fotoyvideo');
})->middleware(['auth', 'verified'])->name('mi-fotoyvideo');

Route::get('/mi-documento', function () {
    return view('users.mi-documento');
})->middleware(['auth', 'verified'])->name('mi-documento');

Route::get('/mi-cronograma', function () {
    return view('users.mi-cronograma');
})->middleware(['auth', 'verified'])->name('mi-cronograma');
Route::get('/principal', function () {
    return view('users.principal');
})->middleware(['auth', 'verified'])->name('principal');

require __DIR__.'/auth.php';

