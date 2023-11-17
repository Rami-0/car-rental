<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;

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

//Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
//});
//Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
//});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'role:0101010101010101'])->group(function () {
//    Route::resource('/cars', CarController::class);
    // cars
    Route::get('/admin/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/admin/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/admin/cars/create', [CarController::class, 'store'])->name('cars.store');
    Route::get('/admin/cars/{car}', [CarController::class, 'show'])->name('cars.show');
    Route::get('/admin/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/admin/cars/{car}/edit', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/admin/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    //     reservations
//    Route::resource('/reservations', ReservationController::class);
    // Listing Reservations (Index)
    // reservations
    Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/admin/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/admin/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/admin/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    // Add more admin-specific routes here
});
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    // cars
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

    // reservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});


// cars
//Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
//Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
//Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');
//Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
//Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
//Route::put('/cars/{car}/edit', [CarController::class, 'update'])->name('cars.update');
//Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');


//Route::resource('/cars', CarController::class);
//Route::get('/cars/{car}', [CarController::class, 'create'])->name('cars.car');
//Route::get('/cars/{car}/edit', [CarController::class, 'create'])->name('cars.edit');
//Route::get('/cars/{car}/reserve', [ReservationController::class, 'create'])->name('cars.reserve');


// reservations
//Route::resource('/reservations', ReservationController::class);
// Listing Reservations (Index)
//Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
//Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
//Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
//Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');


// authentication
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
