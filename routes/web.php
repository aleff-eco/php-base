<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


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

Route::get('/', 'DashBoardController@home')->name('home');
Route::get('aviso-de-privacidad', 'DashBoardController@informacion')->name('informacion');
Route::get('productos', 'DashBoardController@productos')->name('products');
Route::get('{id}/ver', 'DashBoardController@ver')->name('ver');
Route::get('nosotros', 'DashBoardController@nosotros')->name('nosotros');
Route::get('contactanos', 'DashBoardController@contactanos')->name('contactanos');

Route::get('login', 'AuthController@login')->name('login');
Route::get('forget-password', 'AuthController@showForgetPasswordForm')->name('forget.password');
Route::get('reset-password/{token}', 'AuthController@showResetPasswordForm')->name('reset.password');
//Route::get('register', 'AuthController@customerRegistration')->name('customer.registration');

Route::post('/send-email', 'ContactController@sendEmail')->name('send.email');


Route::middleware(['auth','status'])->group(function () {
    Route::get('dashboard', 'AuthController@dashboard')->name('dashboard');
    Route::post('logout','AuthController@logout')->name('logout');

    Route::middleware(['role:1'])->group(function () {
        Route::resource('users','Admin\UserController')->except(['destroy', 'update','store']);
        Route::resource('products','Admin\ProductController')->except(['destroy', 'update','store','show']);
        Route::resource('clients','Admin\ClientController')->except(['destroy', 'update','store']);
        Route::resource('inventories','Admin\InventoryController')->except(['destroy', 'update','store','show','index','create']);
        Route::resource('categories', 'Admin\ProductCategoryController')->except(['store', 'show']);
        Route::resource('categories.subcategories', 'Admin\ProductSubcategoryController')->except(['show', 'store']);
    });
});

// Route::get('configuration', function () {
//     Artisan::call('storage:link');
//     return 'proceso-terminado'; 
// });
