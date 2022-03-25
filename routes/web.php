<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::post('/new-redirect', [\App\Http\Controllers\RedirectRouteController::class, 'create'])->name('createRedirect');
Route::get('/logs/{redirectRoute}', [\App\Http\Controllers\RouteLogsController::class, 'index']);

Route::get('/{redirectRoute}', [\App\Http\Controllers\RedirectController::class, 'redirect'])->name('redirect');
