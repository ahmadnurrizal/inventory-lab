<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get('/item', [ItemController::class, 'index']);
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/{id}/edit', [ItemController::class, 'show']);
Route::post('/item/{id}', [ItemController::class, 'update']);
Route::delete('/item/{id}', [ItemController::class, 'destroy']);
Route::get('/item/list', [ItemController::class, 'getItems'])->name('items.list');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'regis']);
Route::get('/login', [AuthController::class, 'loginIndex']);
Route::get('/register', [AuthController::class, 'regisIndex']);
Route::get('/admin/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth:sanctum')->get('/user', function () {
    Route::delete('/logout', [AuthController::class, 'logout']);
});
