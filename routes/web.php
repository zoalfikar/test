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
Route::get('/userImage', function () {
    $users = User::all();
    return view('createimage.createUserImage')->with(["users"=>$users]);
});
Route::get('/productImage', function () {
    $products = Product::all();
    return view('createimage.createProductImage')->with(["products"=>$products]);
});

Route::resource('units', UnitController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('images', ImageController::class);
Route::resource('inventories', InventoryController::class);
