<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Fontend\IndexController;
use App\Http\Controllers\Fontend\LanguageController;



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

Route::get('/',[IndexController::class,'index']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// =====================================Admin Route==================================================

Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'Admin'],function(){

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('update/data',[AdminController::class, 'updataData'])->name('admin.update');
    Route::get('image',[AdminController::class, 'imagePage'])->name('admin.image');
    Route::post('update/image',[AdminController::class, 'UpdateImage'])->name('adminUpdate.image');
    Route::get('password',[AdminController::class, 'PasswordPage'])->name('admin.passowrd');
    Route::post('update/password',[AdminController::class, 'UpdatePassword'])->name('adminUpdate.passowrd');

    // brand route
    Route::get('all-brand',[BrandController::class,'index'])->name('brands');
    Route::post('brand/store',[BrandController::class,'brandStore'])->name('brand.store');
    Route::get('brand/edit/{brand_id}',[BrandController::class,'brandEdit'])->name('brand.edit');
    Route::post('brand/update/',[BrandController::class,'brandUpdate'])->name('brand.update');
    Route::get('brand/delete/{brand_id}',[BrandController::class,'brandDelete'])->name('brand.delete');

    //category route

    Route::get('all_category',[CategoryController::class,'index'])->name('categorys');
    Route::post('category/store',[CategoryController::class,'categoryStore'])->name('category.store');
    Route::get('category/edit/{category_id}',[CategoryController::class,'categoryEdit'])->name('category.edit');
    Route::post('category/update',[CategoryController::class,'categoryUpdate'])->name('category.update');
    Route::get('category/delete/{category_id}',[CategoryController::class,'categoryDelete'])->name('category.delete');

    //subcategory route

    Route::get('subcategory',[CategoryController::class,'subindex'])->name('subcategorys');
    Route::post('subcategory/store',[CategoryController::class,'subcategoryStore'])->name('subcategory.store');
    Route::get('subcategory/edit/{category_id}',[CategoryController::class,'subcategoryEdit'])->name('subcategory.edit');
    Route::post('subcategory/update',[CategoryController::class,'subcategoryUpdate'])->name('subcategory.update');
    Route::get('subcategory/delete/{category_id}',[CategoryController::class,'subcategoryDelete'])->name('subcategory.delete');
    Route::get('subcategory/ajax/{cat_id}',[CategoryController::class,'getSubCat']);

    //======== Sub Sub Category route==========

    Route::get('subsubcategory',[CategoryController::class,'subsubindex'])->name('subsubcategorys');
    Route::post('subsubcategory/store',[CategoryController::class,'subsubcategoryStore'])->name('subsubcategory.store');
    Route::get('subsubcategory/edit/{category_id}',[CategoryController::class,'subsubcategoryEdit'])->name('subsubcategory.edit');
    Route::post('subsubcategory/update',[CategoryController::class,'subsubcategoryUpdate'])->name('subsubcategory.update');
    Route::get('subsubcategory/delete/{category_id}',[CategoryController::class,'subsubcategoryDelete'])->name('subsubcategory.delete');
    Route::get('subsubcategory/ajax/{cat_id}',[CategoryController::class,'getSubsubCat']);

    //======== Product route ==========


    Route::get('add_product',[ProductController::class,'addProduct'])->name('add_product');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('product/manage',[ProductController::class,'index'])->name('product.manage');
    Route::get('product/edit/{product_id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('product/data_update',[ProductController::class,'productDataUpdate'])->name('product_data.update');
    Route::post('product/thambnail_update',[ProductController::class,'productThambnailUpdate'])->name('product_thambnail.update');
    Route::post('product/multi_img_update',[ProductController::class,'productMultiImgUpdate'])->name('product_multi_img.update');
    Route::get('product/multi_img_delete{id}',[ProductController::class,'productMultiImgDelete'])->name('product_multi_img.delete');
    Route::get('product/inactive/{id}',[ProductController::class,'productInactive'])->name('product.inactive');
    Route::get('product/active/{id}',[ProductController::class,'productActive'])->name('product.active');
    Route::get('product/delete/{id}',[ProductController::class,'productDelete'])->name('product.delete');


    // ==================Slider route =================

    Route::get('slider',[SliderController::class,'slider'])->name('sliders');
    Route::post('slider/store',[SliderController::class,'sliderStore'])->name('slider.store');
    Route::get('slider/edit/{brand_id}',[SliderController::class,'sliderEdit'])->name('slider.edit');
    Route::post('slider/update/',[SliderController::class,'sliderUpdate'])->name('slider.update');
    Route::get('slider/delete/{brand_id}',[SliderController::class,'sliderDelete'])->name('slider.delete');
    Route::get('slider/inactive/{id}',[SliderController::class,'sliderInactive'])->name('slider.inactive');
    Route::get('slider/active/{id}',[SliderController::class,'sliderActive'])->name('slider.active');


});
// =====================================User Route==================================================
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'],function(){

    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class, 'updataData'])->name('update.profile');
    Route::get('image',[UserController::class, 'imagePage'])->name('user.image');
    Route::post('update/image',[UserController::class, 'UpdateImage'])->name('update.image');
    Route::get('password',[UserController::class, 'PasswordPage'])->name('user.passowrd');
    Route::post('update/password',[UserController::class, 'UpdatePassword'])->name('update.passowrd');

});

// =====================================Fontend Route==================================================

Route::get('single/product/{id}/{slug}',[IndexController::class, 'singleProduct']);

Route::get('language/bangla',[LanguageController::class, 'bangla'])->name('language.bangla');
Route::get('language/english',[LanguageController::class, 'english'])->name('language.english');
