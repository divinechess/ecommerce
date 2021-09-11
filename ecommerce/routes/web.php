<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
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
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
    })->name('dashboard');

route::get('/', [IndexController::class, 'index']);
route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
route::post('/user/update/password', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

// Admin Brand All Routes
route::prefix('brand')->group(function(){
    route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit'); //pick up id from brand_view
    route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});

// Admin Category All Routes
route::prefix('category')->group(function(){
    route::get('/view', [CategoryController::class, 'CategoryView'])->name('view.category');
    route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit'); //pick up id from brand_view
    route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});

