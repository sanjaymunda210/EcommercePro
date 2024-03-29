<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/view_catagory', [adminController::class, 'view_catagory']);
Route::post('/add_catagory', [adminController::class, 'add_catagory']);
Route::get('/delete_catagory/{id}', [adminController::class, 'delete_catagory']);
Route::get('/view_product', [adminController::class, 'view_product']);
Route::post('/add_product', [adminController::class, 'add_product']);
