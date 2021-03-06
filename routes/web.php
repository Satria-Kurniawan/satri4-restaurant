<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Products;
use App\Http\Livewire\Cart;
use App\Http\Livewire\ProductsTransactions;
use App\Http\Livewire\Transactions;

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

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
    'accessrole',
]], function() {

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/order', Cart::class)->name('cart');
    Route::get('/products', Products::class)->name('products');
    Route::get('/categories', Categories::class)->name('categories');
    Route::get('/productstransactions', ProductsTransactions::class)->name('productstransactions');
    Route::get('/transactions', Transactions::class)->name('transactions');

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     return view('livewire.welcome');
// })->name('home');

Route::get('/', [WelcomeController::class, 'index'])->name('home');
