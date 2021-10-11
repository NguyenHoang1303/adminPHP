<?php

use App\Http\Controllers\Admincontroller;
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
Route::get('/admin', [Admincontroller::class, 'getDashboard'])->name('admin.dashboard');
Route::get('/admin/form', [Admincontroller::class, 'getForm']);
Route::get('/admin/table', [Admincontroller::class, 'getTable']);
Route::get('/admin/profile', [Admincontroller::class, 'getProfile']);
//==========================================================================================================
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
Route::get('/admin/category', [Admincontroller::class, 'getCategories']);
Route::get('/admin/category/form', [Admincontroller::class, 'getFormCategory']);
Route::post('/admin/category/form', [Admincontroller::class, 'createCategory'])->name('admin.createCategory');
Route::get('/admin/category/delete/{id}', [Admincontroller::class, 'deleteCategory']);
Route::get('/admin/category/update/{id}', [Admincontroller::class, 'getInformationCategory']);
Route::post('/admin/category/update', [Admincontroller::class, 'updateInformationCategory'])->name('admin.updateCategory');

