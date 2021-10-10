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


Route::get('/admin/login', [Admincontroller::class, 'getFormLogin']);
Route::post('/admin/login', [Admincontroller::class, 'login']);
Route::get('/admin/register', [Admincontroller::class, 'getFormRegister']);
Route::post('/admin/register', [Admincontroller::class, 'register']);

Route::get('/admin', [Admincontroller::class, 'getDashboard']);
Route::get('/admin/form', [Admincontroller::class, 'getForm']);
Route::get('/admin/table', [Admincontroller::class, 'getTable']);
