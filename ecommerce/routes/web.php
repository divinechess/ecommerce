<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
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


Route::group(['prefix' =>'admin', 'middleware'=>['admin:admin']],function () {
    route::get('/login', [AdminController::class, 'loginForm']);
    route::post('/login', [AdminController::class, 'Store'])->name('admin.login');
});






// admin all routes

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
route::post('/update/change/password', [AdminProfileController::class, 'UpdateChangePassword'])->name('update.change.password');

// All user routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('/', [IndexController::class, 'index']);

