<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\FoodFinderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusesController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboards',[DashboardsController::class,'index'])->name('dashboards.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('customers',CustomersController::class);

    Route::resource('statuses',StatusesController::class);

    Route::get('/searchfoods',[FoodFinderController::class,'index'])->name('searchfoods.index');
});

require __DIR__.'/auth.php';
