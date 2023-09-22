<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceRequestController;
use App\Models\Bike;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [BikeController::class, 'index'])->name('dashboard');

    // Bikes routes
    Route::apiResource('/bikes', BikeController::class);
    // Route::get('/bikes/mechanic/{name}', [BikeController::class, 'mechanicname'])->name('bikes.mechanicname');
    Route::get('/bikes/{bike}', [BikeController::class, 'show'])->name('bike.show');

    Route::patch('/bikes/{bike}', [BikeController::class, 'update'])->name('bikes.update');

    Route::delete('/bikes/{bike}', [BikeController::class, 'destroy']);

    Route::delete('/bikes', [BikeController::class, 'destroyBikes']);



    
    // Service requests routes
    Route::get('/service-requests', [ServiceRequestController::class, 'index'])->name('service-requests');
    Route::post('/service-request/store', [ServiceRequestController::class, 'store'])->name('service-request.store');


    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
