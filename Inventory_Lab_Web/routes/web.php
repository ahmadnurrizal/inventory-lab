<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowingController;
use App\Models\Item;

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

Route::get('/login', [AuthController::class, 'loginIndex']);
Route::get('/register', [AuthController::class, 'regisIndex']);
Route::post('/register', [AuthController::class, 'regisAction'])->name('register');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login');

Route::get('/borrowing-form', function () {
    $items = Item::all();
    return view('form/borrowing', compact('items'));
});
Route::post('/borrowing-confirm', [BorrowingController::class, 'checkUserData'])->name('borrowing.confirm');
Route::post('/borrow', [BorrowingController::class, 'borrowItems']);

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
