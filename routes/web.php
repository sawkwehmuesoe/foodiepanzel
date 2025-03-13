<?php

use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\EnrollsController;
use App\Http\Controllers\FoodFinderController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\GendersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TypesController;
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


    Route::resource('attendances',AttendancesController::class);
    Route::resource('categories',CategoriesController::class);
    Route::resource('comments',CommentsController::class);
    Route::resource('customers',CustomersController::class);
    Route::resource('cities',CitiesController::class);
    Route::resource('countries',CountriesController::class);
    Route::resource('days',DaysController::class);
    Route::resource('enrolls',EnrollsController::class);
    Route::get('/games',[GamesController::class,'index'])->name('games.index');
    Route::resource('genders',GendersController::class);
    Route::resource('posts',PostsController::class);
    Route::resource('roles',RolesController::class);
    Route::resource('stages',StagesController::class);
    Route::resource('statuses',StatusesController::class);
    Route::resource('tags',TagsController::class);
    Route::resource('types',TypesController::class);

    Route::get('/searchfoods',[FoodFinderController::class,'index'])->name('searchfoods.index');
});

require __DIR__.'/auth.php';
