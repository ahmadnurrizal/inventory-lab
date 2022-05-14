<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowingController;

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

Route::get('/item', [ItemController::class, 'index'])->name('item.index');
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/{id}/edit', [ItemController::class, 'show']);
Route::post('/item/{id}', [ItemController::class, 'update']);
Route::delete('/item/{id}', [ItemController::class, 'destroy']);
Route::get('/item/list', [ItemController::class, 'getItems'])->name('items.list');

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'regis']);

Route::get('/borrowing-form', function () {
    return view('form/borrowing');
});
Route::post('/borrowing-confirm', [BorrowingController::class, 'checkUserData'])->name('borrowing.confirm');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
