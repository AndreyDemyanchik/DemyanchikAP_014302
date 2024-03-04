<?php

use App\Http\Controllers\VisualizationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScooterController;
use App\Http\Controllers\MalfunctionController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/admin');
Route::get('statData/visualization/start', [
    'as' => 'platform.startHandlingStatData',
    'uses' => 'App\Orchid\Screens\StartHandlingStatDataScreen@__invoke',
    'controller' => 'App\Orchid\Screens\StartHandlingStatDataScreen',
    'prefix' => '/admin/'
])->name('platform.startHandlingStatData');
Route::post('api/visualization/clients', [ClientController::class, 'create']);
Route::post('api/visualization/scooters', [ScooterController::class, 'create']);
Route::post('api/visualization/malfunctions', [MalfunctionController::class, 'create']);
Route::post('api/visualization/rides', [RideController::class, 'create']);
Route::get('api/aggregated-data', [VisualizationController::class, 'getData']);
Route::get('api/categories', [CategoryController::class, 'all']);
Route::post('api/user/update', [UserController::class, 'update']);
Route::post('api/user/password', [UserController::class, 'changePassword']);
Route::post('api/user/destroy', [UserController::class, 'destroy']);
Route::get('api/users', [UserController::class, 'index']);
