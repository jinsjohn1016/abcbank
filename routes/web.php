<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
Route::get('deposit', [TransactionController::class, 'deposit'])->name('deposit');
Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.deposit');
Route::get('statement', [TransactionController::class, 'index'])->name('statement');
Route::get('withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
Route::get('transfer', [TransactionController::class, 'transfer'])->name('transfer');
Route::post('storewithdraw', [TransactionController::class, 'storewithdraw'])->name('transaction.withdraw');
Route::post('storetransfer', [TransactionController::class, 'storetransfer'])->name('transaction.transfer');
Route::post('balancecheck', [TransactionController::class, 'balancecheck'])->name('balancecheck');
