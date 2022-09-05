<?php

use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\SiteController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('test', function () {
    return view('layouts.admin');
});
Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::group(['prefix' => 'settings'], function () {
        Route::get('shippindmethods/{type}', [SettingController::class, 'editshipping'])->name('shippingmethod');
        Route::post('shippindmethods/{id}', [SettingController::class, 'updateshipping'])->name('updateshipping');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('editprofile', [ProfileController::class, 'editprofile'])->name('editprofile');
        Route::post('updateprofile', [ProfileController::class, 'updateprofile'])->name('updateprofile');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('index', [CategoryController::class, 'index'])->name('indexcategory');
        Route::get('create', [CategoryController::class, 'create'])->name('createcategory');
        Route::post('store', [CategoryController::class, 'store'])->name('storecategory');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('editcategory');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::post('updatecategory/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('status', [CategoryController::class, 'status'])->name('admin.category.status');
    });

    ##################subcategory##############################################
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('index', [SubCategoryController::class, 'index'])->name('indexsubcategory');
        Route::get('create', [SubCategoryController::class, 'create'])->name('createsubcategory');
        Route::post('store', [SubCategoryController::class, 'store'])->name('storesubcategory');
        Route::get('edit/{id}', [SubCategoryController::class, 'edit'])->name('editsubcategory');
        Route::get('delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');
        Route::post('updatecategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('status', [SubCategoryController::class, 'status'])->name('admin.subcategory.status');
    });
    ##################Brands#######################################
    Route::group(['prefix' => 'brands'], function () {
        Route::get('index', [BrandController::class, 'index'])->name('index.brands');
        Route::get('create', [BrandController::class, 'create'])->name('create.brands');
        Route::post('store', [BrandController::class, 'store'])->name('storebrands');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('editbrands');
        Route::get('delete/{id}', [BrandController::class, 'destroy'])->name('brands.delete');
        Route::post('updatecategory/{id}', [BrandController::class, 'update'])->name('brands.update');
        Route::get('status', [BrandController::class, 'status'])->name('admin.brands.status');
    });
    ##################################Tags########################################
    Route::group(['prefix' => 'tags'], function () {
        Route::get('index', [TagController::class, 'index'])->name('index.tags');
        Route::get('create', [TagController::class, 'create'])->name('create.tags');
        Route::post('store', [TagController::class, 'store'])->name('storetags');
        Route::get('edit/{id}', [TagController::class, 'edit'])->name('edittags');
        Route::get('delete/{id}', [TagController::class, 'destroy'])->name('tags.delete');
        Route::post('updatecategory/{id}', [TagController::class, 'update'])->name('tags.update');
        Route::get('status', [TagController::class, 'status'])->name('admin.tags.status');
    });
    ##########################products##################################################
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('indexgeneral.products');
        Route::get('create-generel', [ProductController::class, 'create'])->name('createproductsgeneral');
        Route::post('store-general', [ProductController::class, 'store'])->name('storegeneral');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('editptoduct');
        Route::post('updateproduct/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('deleteproduct');
        Route::get('images/{id}', [ProductController::class, 'images'])->name('imagesproduct');

        ##############################price##########################
        Route::get('get-price/{id}', [ProductController::class, 'createprice'])->name('createprice');
        Route::post('store-updateprice', [ProductController::class, 'updateprice'])->name('updateprice');
        ####################################stock###################
        Route::get('get-stock/{id}', [ProductController::class, 'createstock'])->name('createstock');
        Route::post('store-updatestock', [ProductController::class, 'updatestock'])->name('updatestock');
         ####################################photo###################
         Route::get('get-photo/{id}', [ProductController::class, 'createphoto'])->name('createphoto');
         Route::post('store-updatephoto', [ProductController::class, 'updatephoto'])->name('updatephoto');

    });
    ############################# end products######################################

    ###################attribute#############################################
    Route::group(['prefix' => 'attribute'], function () {
        Route::get('index', [AttributeController::class, 'index'])->name('index.attribute');
        Route::get('create', [AttributeController::class, 'create'])->name('create.attribute');
        Route::post('store', [AttributeController::class, 'store'])->name('storeattribute');
        Route::get('edit/{id}', [AttributeController::class, 'edit'])->name('editattribute');
        Route::get('delete/{id}', [AttributeController::class, 'destroy'])->name('attribute.delete');
        Route::post('updatecategory/{id}', [AttributeController::class, 'update'])->name('attribute.update');
    });
    ###########################option###################################
    Route::group(['prefix' => 'option'], function () {
        Route::get('index', [OptionController::class, 'index'])->name('index.option');
        Route::get('create', [OptionController::class, 'create'])->name('create.option');
        Route::post('store', [OptionController::class, 'store'])->name('storeoption');
        Route::get('edit/{id}', [OptionController::class, 'edit'])->name('editoption');
        Route::get('delete/{id}', [OptionController::class, 'destroy'])->name('option.delete');
        Route::post('updatecategory/{id}', [OptionController::class, 'update'])->name('option.update');
    });
});
Route::group(['namespace' => 'Dashboard', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [LoginController::class, 'login'])->name('adminlogin');
    Route::post('postlogin', [LoginController::class, 'postlogin'])->name('post.login');
});
#########################user########################
Route::get('productdetailstwo/{id}', [ProductController::class, 'productdetailstwo'])->name('productdetailstwo');
        Route::get('productall', [ProductController::class, 'productall'])->name('productall');
#####################################################


#####Front##############]

// Route::get('/front', function () {
//     return view('front.home');
// });

