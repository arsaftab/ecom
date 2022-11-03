<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\View;


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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('user_active', [DashboardController::class, 'is_active'])->name('user_active');
Route::post('product-color-update', [ProductController::class, 'updateProdClrQty'])->name('prod_clr_upd');
Route::post('product-color-delete', [ProductController::class, 'deleteProdClrQty'])->name('prod_clr_dlt');


Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function(){
    // $users = User::where('is_active',0)->get();
    // View::share('users', $users);

    Route::get('dashboard', [DashboardController::class, 'index']);
    
    Route::get('users/{user}/{notification_id}', [DashboardController::class, 'show'])->name('users.show');
    
    //category routes
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('category/create', [CategoryController::class, 'create']);
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{category}', [CategoryController::class, 'update'])->name('category.update');
    
    Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/create', [ProductController::class, 'create']);
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit']);
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    Route::resource('colors', ColorController::class);
    
    
    Route::get('product-image/{image_id}/delete', [ProductController::class, 'destroyImage']);



});