<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ShopController;
use Illuminate\Http\Request;

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



Route::prefix('admin')->middleware(['auth', 'Admin'])->group(function () {
    Route::get('/home', function() {
        return view('layouts.admin');
    });
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubCategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/image', ImageController::class);
    Route::resource('/cart', CartController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/riwayat', RiwayatController::class);
    
    Route::get('getSub_category/{id}', [SubCategoryController::class, 'getSubCategory']);

    
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

  
Auth::routes();
Route::get('/shop' , [ShopController::class, 'index']);
Route::get('/product' , [ShopController::class, 'product']);

Route::get('/main', function () {
    return view('main');
});

// Route::get('/product', function () {
//     return view('frontend.product');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


