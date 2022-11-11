<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login',[AdminController::class,'LoginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});


Route::middleware([ 'auth:sanctum,admin',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});



///////Admin All Routes////////////

Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edite',[AdminProfileController::class,'AdminProfileEdite'])->name('admin.profile.edite');
Route::post('admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('update/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('update.change.password');
////////////////////////////////////////////////////////////
/////////User All Routes//////////








///////////////////////////////////////////////////////////
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});

Route::get('/',[IndexController::class,'Index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('user/change/password',[IndexController::class,'UserChangePassword'])->name('change.password');
Route::post('/user/password/update',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');


/////////////////////////////////////////////////////////////////////////
/////////////////////////Admin Brands All Routes//////////////////////////////

Route::prefix('brand')->group(function(){
     Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
     Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
     Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
     Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
     Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');

});


/////////////////////////////////////////////////////////////////////////
/////////////////////////Admin Category All Routes//////////////////////////////
Route::prefix('category')->group(function(){
     Route::get('/view',[CategoryController::class,'CategoryView'])->name('all_category');
     Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
     Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
     Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
     Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

     /////////////////Admin SubCategory All Routes/////////////
      Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all_subcategory');
     Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
     Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
     Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
     Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

});
