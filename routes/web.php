<?php

use App\Http\Controllers\{
    EventSportifController,
    HomeController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',HomeController::class)->name('home');
//Route::resource('events',EventSportifController::class);

Route::prefix('organisateur')->middleware(['auth','can:organisateur-view'])->group(function (){
    Route::resource('/events',EventSportifController::class);
});

Route::prefix('admin')->middleware(['auth','can:admin-view'])->group(function (){
    Route::get('/users',[AdminDashboardController::class,'userDashboard'])->name('admin.users');
    Route::get('/events',[AdminDashboardController::class, 'eventDashboard'])->name('admin.events');
});
