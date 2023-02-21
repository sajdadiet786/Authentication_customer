<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Models\Admin;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\HomeController;
use GuzzleHttp\Promise\Create;

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
    return view ('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('show-auth-user',[ShowController::class,'show_auth_user']);
Route::get('check-auth-user',[ShowController::class,'check_auth_user']);
Route::get('/report', function () {
    return view('report');
})->middleware('auth');
Route::get('/product', function () {
    return view('product');
})->name('product');
require __DIR__.'/auth.php';
//admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
//login
Route::get('login','AuthenticatedSessionController@create')->name('login');
Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');

    });
    Route::middleware('admin')->group(function(){

        Route::get('dashboard','HomeController@index')->name('dashboard'); // /admin/dashboard
        Route::get('/customer/create','HomeController@create')->name('customer.create'); // /admin/customer/create
        Route::post('/customer/create','HomeController@create')->name('customer.create');
        // Route::post('/customer/create',[HomeController::class,'create'])->name('customer.create');
        // Route::post('/customer',[HomeController::class,'store'])->name('customer.store');
        // Route::get('/dashboard',[HomeController::class,'view']);
        // Route::get('/customer/delete/{id}',[HomeController::class,'delete'])->name('customer.delete');
        // Route::get('/customer/edit/{id}',[HomeController::class,'edit'])->name('customer.edit');
        // Route::post('/customer/edit/{id}',[HomeController::class,'update'])->name('customer.update'); 
        // Route::get('/order',[CustomerController::class,'Order'])->name('customer.order');
        // Route::post('/order',[CustomerController::class,'Suborder'])->name('customer.order');
        // Route::post('/get-amount',[CustomerController::class,'amount'])->name('get.amount');
    });
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});
// Route::post('/admin/customer/create',[HomeController::class,'create'])->name('customer.create');
// Route::post('/dashboard',[HomeController::class,'store'])->name('dashboard.store');
// Route::get('/dashboard',[HomeController::class,'view']);
// Route::get('/customer/delete/{id}',[HomeController::class,'delete'])->name('customer.delete');
// Route::get('/customer/edit/{id}',[HomeController::class,'edit'])->name('customer.edit');
// Route::post('/customer/edit/{id}',[HomeController::class,'update'])->name('customer.update'); 
// Route::get('/order',[CustomerController::class,'Order'])->name('customer.order');
// // Route::post('/order',[CustomerController::class,'Suborder'])->name('customer.order');
// Route::post('/get-amount',[CustomerController::class,'amount'])->name('get.amount');

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers','index');
   Route::get('/add-customer','create');
   Route::post('/add-customer','store');
   Route::get('/edit-customer/{customer_id}','edit');
   Route::put('/update-customer/{customer_id}','update');
   Route::get('/delete-customer/{customer_id}','destroy');
Route::get('/order-customer','Order')->name('customer.order');
Route::post('/order-customer','Suborder')->name('customer.order');
Route::post('/get-amount','amount')->name('get.amount');
}); 
// Route::get('/order-customer/{customer_id}','Order')->name('customer.order');
// Route::post('/order-customer/{customer_id}','Suborder')->name('customer.order');
// Route::post('/get-amount','amount')->name('get.amount')->name('get.amount');
