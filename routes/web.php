<?php
use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::match(['get', 'post'], '/images/create/user-image', [ImageController::class ,'createUserImage']);
Route::match(['get', 'post'], '/images/create/product-image', [ImageController::class,'createProductImage']);
Route::resource('units', UnitController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('images', ImageController::class);
Route::resource('inventories', InventoryController::class);
