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

require __DIR__.'/auth.php';

