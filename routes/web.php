<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\FoodFinderController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\GendersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\StatusesController;
use Illuminate\Support\Facades\Route;


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
    Route::get('/games',[GamesController::class,'index'])->name('games.index');
    Route::resource('genders',GendersController::class);
    Route::resource('roles',RolesController::class);
    Route::resource('stages',StagesController::class);
    Route::resource('statuses',StatusesController::class);

    Route::get('/searchfoods',[FoodFinderController::class,'index'])->name('searchfoods.index');
});

require __DIR__.'/auth.php';
