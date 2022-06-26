<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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

Route::get('/borrowing', [BorrowingController::class, 'borrowingIndex'])->name('borrowing.index');
Route::get('/borrowing/{flag}', [BorrowingController::class, 'getBorrowing'])->name('borrowing.list');
Route::get('/borrowing/invoice/{id}', [BorrowingController::class, 'invoice'])->name('borrowing.invoice');

Route::get('/returning', [BorrowingController::class, 'returningIndex'])->name('returning.index');
Route::get('/return-item/{id}', [BorrowingController::class, 'returnItem'])->name('returning.item');

Route::get('/backendUser', [UserController::class, 'backendUserIndex'])->name('backendUser.index');
Route::post('/backendUser', [UserController::class, 'store']);
Route::get('/backendUser/{id}/show', [UserController::class, 'show']);
Route::post('/backendUser/{id}', [UserController::class, 'update']);
Route::delete('/backendUser/{id}', [UserController::class, 'destroy']);
Route::get('/backendUser/list', [UserController::class, 'getBackendUsers'])->name('user.BackendUser');

Route::get('/borrower', [UserController::class, 'borrowerUserIndex'])->name('borrower.index');
Route::get('/borrower/list', [UserController::class, 'getBorrowerUsers'])->name('user.Borrower');

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
