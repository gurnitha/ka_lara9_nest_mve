<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
// Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');

// Route for admin dashboard:http://127.0.0.1:1000/admin/dashboard
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
});

// Route for admin dashboard:http://127.0.0.1:1000/vendor/dashboard
Route::middleware(['auth','role:vendor'])->group(function() {
   Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');
});

