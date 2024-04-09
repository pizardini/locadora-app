<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentController;

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

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('rents', RentController::class);

Route::get('/rents/create/{customerId}', [RentController::class, 'create'])->name('rents.create');



// Solicitação de autenticação nas rotas internas
// Route::middleware('auth')->group(function () {
//     Route::resource('products', ProductController::class);
//     Route::resource('customers', CustomerController::class);
//      Route::resource('rents', CustomerController::class);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
