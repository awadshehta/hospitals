<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {

    //Route::get("/dashboard_admin", [DashboardController::class, 'index']);

    Route::get('/dashboard/user', function () {
        return view('dashboard.user.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard.user');

    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
    require __DIR__.'/auth.php';

});
