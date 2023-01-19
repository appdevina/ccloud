<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/menu', [DashboardController::class, 'menu']);

Route::get('/activity', [DashboardController::class, 'activityCreate']);
Route::post('/activity', [DashboardController::class, 'activityStore']);

Route::get('/stockopname', [DashboardController::class, 'stockOpnameCreate']);
Route::post('/stockopname', [DashboardController::class, 'stockOpnameStore']);

Route::get('/visibility', [DashboardController::class, 'visibilityCreate']);
Route::post('/visibility', [DashboardController::class, 'visibilityStore']);

Route::get('/sales', [DashboardController::class, 'salesCreate']);
Route::post('/sales', [DashboardController::class, 'salesStore']);