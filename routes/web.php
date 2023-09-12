<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin/dashboard', function(){
        return view('admin.dashboard');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/admin/dashboard', [PageController::class, 'dashboard']);
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::get('/delete_category/{id}', [CategoryController::class, 'destroy']);
Route::get('/category/{id}/show', [CategoryController::class, 'show']);
Route::resource('/product', ProductController::class);
Route::get('/delete_product/{id}', [ProductController::class, 'destroy']);

Route::get('/', [PageController::class, 'home']);
Route::get('/categories', [PageController::class, 'categories']);
Route::get('/view-category/{slug}', [PageController::class, 'view_category']);
Route::get('/category/{cate_slug}/{prod_slug}', [PageController::class, 'product_view']);
Route::post('/add-to-cart', [CartController::class, 'add_product']);
Route::get('/cart', [CartController::class, 'view_cart']);
Route::post('/delete-cart-item', [CartController::class, 'delete_product']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/load-cart-data', [CartController::class, 'cart_count']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/place-order', [CheckoutController::class, 'place_order']);
Route::get('/my-orders', [UserController::class, 'index']);
Route::get('/view-orders/{id}', [UserController::class, 'view']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/admin/view-orders/{id}', [OrderController::class, 'view']);
Route::put('/update-order/{id}', [OrderController::class, 'update_order']);
Route::get('/order-history', [OrderController::class, 'order_history']);
Route::get('/orders-pdf-download', [OrderController::class, 'pdf_download']);


Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');


Route::get('/view-users', [UserController::class, 'view_users']);
Route::get('/product-list', [PageController::class, 'product_list_Ajax']);
Route::post('/search_product', [PageController::class, 'search_product']);

