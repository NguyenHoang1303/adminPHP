<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ShopController;
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


//  Example Table, Form, Dashboard
Route::prefix('admin')->group(function(){
    Route::get('/', [Admincontroller::class, 'getDashboard'])->name('admin.dashboard');
    Route::get('/form', [Admincontroller::class, 'getForm']);
    Route::get('/table', [Admincontroller::class, 'getTable']);
    Route::get('/profile', [Admincontroller::class, 'getProfile']);
});

//============================================ Admin ==============================================================
//  Login
Route::get('/admin/login', [Admincontroller::class, 'getFormLogin'])->name('admin.login');
Route::post('/admin/login', [Admincontroller::class, 'login']);
//==========================================================================================================
//  LogOut
Route::get('/admin/logOut', [Admincontroller::class, 'logOut'])->name('admin.logOut');
//==========================================================================================================
//  Register
Route::get('/admin/register', [Admincontroller::class, 'getFormRegister']);
Route::post('/admin/register', [Admincontroller::class, 'register']);
//==========================================================================================================
//  Category
Route::prefix('/admin/category')->group(function (){
    Route::get('/', [CategoryController::class, 'getCategories'])->name('categories');
    Route::get('/form', [CategoryController::class, 'getForm']);
    Route::post('/form', [CategoryController::class, 'create'])->name('createCategory');
    Route::get('/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/update/{id}', [CategoryController::class, 'getInformation']);
    Route::post('/update', [CategoryController::class, 'update'])->name('updateCategory');
    Route::get('/search', [CategoryController::class, 'search'])->name('searchByNameCategory');
});
//==========================================================================================================
//  Product
Route::prefix('/admin/product')->group(function (){
    Route::get('/', [ProductController::class, 'getProducts'])->name('products');
    Route::get('/form', [ProductController::class, 'getForm']);
    Route::post('/form/create', [ProductController::class, 'create'])->name('createProduct');
    Route::get('/update/{id}', [ProductController::class, 'getInformation']);
    Route::post('/update', [ProductController::class, 'update'])->name('updateProduct');
    Route::get('/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/search', [ProductController::class, 'search'])->name('searchProduct');
});

//============================================ User ==============================================================
Route::get('/home',[HomeController::class,'getViewHome']);
Route::get('/shop',[ShopController::class,'getShop']);
Route::get('/product/search',[ShopController::class,'search']);
Route::get('/shop/detail/{id}',[ShopController::class,'getInformation']);







Route::get('/test',[HomeController::class,'test']);
