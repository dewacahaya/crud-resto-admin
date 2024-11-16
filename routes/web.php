<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenusController;
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

Route::get('/', [LoginController::class, 'index']);

Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'login_proses'])->name('login.proses');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
    Route::post('/admin/profile/update/{admin_id}', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});


Route::get('menus', [MenusController::class, 'index'])->name('menus.index');
Route::get('menus/create', [MenusController::class, 'create'])->name('menus.create');
Route::post('menus/store', [MenusController::class, 'store'])->name('menus.store');
Route::get('menus/edit/{menus_id}', [MenusController::class, 'edit'])->name('menus.edit');
Route::put('menus/update/{menus_id}', [MenusController::class, 'update'])->name('menus.update');
Route::get('menus/show/{menus_id}', [MenusController::class, 'show'])->name('menus.show');
Route::delete('menus/destroy/{menus_id}', [MenusController::class, 'destroy'])->name('menus.destroy');