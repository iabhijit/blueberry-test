<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductController;
// Route::get('/', function () {
//     return view('welcome');
// })->name(name:'home');
Route::get('/',[ProductController::class,"frontendlist"])->name(name:'home');
Route::get('/login', [AuthManager::class,'login'])->name(name:'login');
Route::post('/login', [AuthManager::class,'loginPost'])->name(name:'login.post');
Route::get('/logout', [AuthManager::class,'logout'])->name(name:'logout');
Route::get('/registration', [AuthManager::class,'registration'])->name(name:'registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name(name:'registration.post');


Route::get('products',[ProductController::class,"index"])->name(name:'products');
Route::get('products/manage-product',[ProductController::class,"create"])->name(name:'products.manage-product');
Route::post('products/manage-product-process',[ProductController::class,"manage_product_process"])->name('product.manage_product_process');
Route::get('products/delete/{id}',[ProductController::class,"delete"]);
Route::get('products/manage-product/{id}',[ProductController::class,"create"]);
Route::get('products/restore/{id}',[ProductController::class,"restore"]);
Route::get('products/trash',[ProductController::class,"trash"])->name(name:'products.trash');
Route::get('products/force-delete/{id}',[ProductController::class,"forcedelete"]);
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name(name:'admin.dashboard');

