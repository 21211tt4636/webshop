<?php

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
//Login
use App\Http\Controllers\CustomAuthController;

Route::get('/', [CustomAuthController::class, 'dashboard']); 
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

//reset password

use App\Http\Controllers\ForgetPasswordController;

Route::get('forgetpassword', [ForgetPasswordController::class, 'forget_password'])->name('forget.password'); 
Route::post('login', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('resetpassword'); 
Route::post('/', [ForgetPasswordController::class, 'sendMailCreateAccount'])->name('createAccount');

//admin about user
Route::get('admin/user', [CustomAuthController::class, 'getUser']);
Route::get('admin/useradd', [CustomAuthController::class, 'useradd'])->name('admin/useradd');
Route::get('admin/useredit/{id}', [CustomAuthController::class, 'editprofile']);
Route::post('admin/user', [CustomAuthController::class, 'AddUser'])->name('admin.user');
Route::get('admin/delete/{id}', [CustomAuthController::class, 'delete']);
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::post('admin/useredit/{id}', [CustomAuthController::class,'update']);


use App\Http\Controllers\ManuManagerController;
//admin about manufacture
Route::get('admin/manu', [ManuManagerController::class, 'getManu']);
Route::get('admin/manuadd', [ManuManagerController::class, 'manuadd'])->name('admin/manuadd');
Route::get('admin/manuedit/{id}', [ManuManagerController::class, 'editmanu']);
Route::post('admin/manu', [ManuManagerController::class, 'AddManu'])->name('admin.manu');
  Route::post('admin/manuedit/{id}', [ManuManagerController::class,'update']);


use App\Http\Controllers\ProtypeController;
//admin about ProductProtype
Route::get('admin/protype', [ProtypeController::class, 'getProtype']);
Route::get('admin/protypeadd', [ProtypeController::class, 'protypeadd'])->name('admin/protypeadd');
Route::get('admin/protypeedit/{id}', [ProtypeController::class, 'editprotype']);
Route::post('admin/protype', [ProtypeController::class, 'AddProtype'])->name('admin.protype');
Route::get('admin/deleteprotype/{id}', [ProtypeController::class, 'delete']);
Route::post('admin/protypeedit/{id}', [ProtypeController::class,'update']);


use App\Http\Controllers\ProductController;
//admin about Product
Route::get('admin/product', [ProductController::class, 'getProduct']);
Route::get('admin/product_detail/{id}', [ProductController::class, 'viewDetailProduct'])->name('view_productdetail');
Route::get('admin/product_detail/{id}/manager', [ProductController::class, 'viewManagerDetail'])->name('manager_detail');
Route::get('admin/productadd', [ProductController::class, 'productadd'])->name('admin/productadd');
Route::post('admin/product', [ProductController::class, 'AddProduct'])->name('admin.product');
Route::get('admin/productedit/{id}', [ProductController::class, 'editproduct']);
Route::post('admin/productedit/{id}', [ProductController::class, 'update']);
Route::get('admin/delete_detail/{id}', [ProductController::class, 'delete']);
// Route::get('admin/update_detail/{id}', [ProductController::class, 'updateDetail']);
Route::get('admin/product_detail/{id}/manager/add', [ProductController::class, 'view'])->name('viewadd_detail');
Route::post('admin/add_detail/{id}', [ProductController::class, 'AddProductDetail'])->name('add_detail');




use App\Http\Controllers\IndexController;
//Page Index
Route::get('profile/{id}', [IndexController::class, 'viewProfile']);
// Route::get('store', [IndexController::class, 'viewStore'])->name('viewstore');
Route::get('blank', [IndexController::class, 'search'])->name('search');
Route::get('/', [IndexController::class, 'getTypeIndex']);

use App\Http\Controllers\ProductDetailController;
//Page Product

Route::post('product/{id}', [ProductDetailController::class, 'viewProduct']);
Route::post('/product/{id}/add_reviewer',[ProductDetailController::class, 'AddReviewer'])->name('add_reviewer');
Route::get('/product/{id}', [ProductDetailController::class, 'viewProduct'])->name('product_detail');



use App\Http\Controllers\StoreController;
//Page Product

Route::get('store', [StoreController::class, 'getProductStore'])->name('viewstore');
Route::get('store?type_id={id}', [StoreController::class, 'getProductStore'])->name('viewStoreOfType');

//Cart
use App\Http\Controllers\CartController;
Route::get('cart/add/{id}', [CartController::class, 'add']);
Route::post('product/add/{id}', [CartController::class, 'add'])->name('add_detailpro');
Route::get('cart', [CartController::class, 'showCart']);
Route::get('/cart/delete', [CartController::class, 'delete']);
Route::get('/cart/update', [CartController::class, 'update']);


//Checkout
use App\Http\Controllers\CheckoutController;
Route::get('checkout', [CheckoutController::class, 'showCheckout']);
Route::post('checkout/',[CheckoutController::class, 'addOrder']);
//hủy đơn hàng
Route::get('checkout/deleteorder/{id}', [CheckoutController::class, 'delete']);