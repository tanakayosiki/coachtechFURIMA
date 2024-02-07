<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ShopSellController;
use App\Http\Controllers\ShopCommentController;

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
Route::get('/login',[AuthController::class,'getLogin'])->name('login');
Route::post('/login',[AuthController::class,'postLogin']);
Route::get('/register', [AuthController::class,'getRegister']);
Route::post('/register', [AuthController::class,'postRegister']);
Route::get('/',[ItemController::class,'index']);
Route::get('/item/{id}',[ItemController::class,'detail'])->name('detail');
Route::get('/shop',[ShopController::class,'index']);
Route::get('/inviter/{shop}/{user}',[ManagementController::class,'mailInvite'])->name('mailInvite');
Route::post('/inviter/{shop}/{user}',[ManagementController::class,'postMailInvite'])->name('postMailInvite');
Route::get('/shop/detail/{id}',[ShopController::class,'shopDetail'])->name('shopDetail');

Route::middleware('auth')->group(function () {
Route::get('/sell',[SellController::class,'index']);
Route::post('/sell/{id}',[SellController::class,'sell'])->name('sell');
Route::get('/mypage',[MyPageController::class,'index']);
Route::get('/mypage/buy',[MyPageController::class,'buyList']);
Route::get('/mypage/profile',[MyPageController::class,'profile']);
Route::post('/mypage/profile',[MyPageController::class,'postProfile']);
Route::get('/buy/{id}',[BuyController::class,'index'])->name('buy');
Route::post('/buy/{id}',[BuyController::class,'buy'])->name('postBuy');
Route::get('/buy/address/{id}',[BuyController::class,'address'])->name('address');
Route::post('/buy/address/{id}',[BuyController::class,'postAddress'])->name('postAddress');
Route::get('/nice/{id}',[NiceController::class,'nice'])->name('nice');
Route::get('/unnice/{id}',[NiceController::class,'unNice'])->name('unnice');
Route::get('/item/comment/{id}',[CommentController::class,'index'])->name('comment');
Route::post('/item/comment/{id}',[CommentController::class,'postComment'])->name('postComment');
Route::get('/item/comment/delete/{id}',[CommentController::class,'deleteComment'])->name('deleteComment');
Route::get('/mylist',[ItemController::class,'myList']);
Route::get('/logout',[AuthController::class,'getLogout']);
Route::post('/charge/{id}', [StripeController::class,'charge'])->name('stripe.charge');
Route::get('/newshop',[ManagementController::class,'newShop']);
Route::post('/newshop',[ManagementController::class,'postNewShop'])->name('postNewShop');
Route::get('/shop/management',[ManagementController::class,'management'])->name('management');
Route::get('/shop/sell',[ShopSellController::class,'index']);
Route::post('/shop/sell/{id}',[ShopSellController::class,'shopSell'])->name('shopSell');
Route::get('/shop/comment/{id}',[ShopCommentController::class,'index'])->name('shopComment');
Route::get('/shop/commentlist/{id}',[ShopCommentController::class,'commentList'])->name('commentList');
Route::post('/shop/comment/{item}/{itemShop}',[ShopCommentController::class,'postShopComment'])->name('postShopComment');
Route::get('/shop/commentlist/comment/{id}',[ShopCommentController::class,'staffComment'])->name('staffComment');
Route::post('/shop/commentlist/comment/{id}',[ShopCommentController::class,'postStaffComment'])->name('postStaffComment');
Route::get('/shop/comment/delete/{id}',[ShopCommentController::class,'deleteShopComment'])->name('deleteShopComment');

Route::middleware(['AdminMiddleware'])->group(function(){
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/userlist',[AdminController::class,'userList']);
Route::get('/admin/userlist/delete/{id}',[AdminController::class,'delete'])->name('adminDelete');
Route::get('/admin/check',[AdminController::class,'check'])->name('check');
Route::get('/admin/check/{id}',[AdminController::class,'checkComment'])->name('checkComment');
Route::get('/admin/mail',[MailController::class,'sendAdmin']);
});

Route::middleware(['ManagerMiddleware'])->group(function(){
Route::get('/shop/invite',[ManagementController::class,'invite']);
Route::get('/manager/invite/{id}',[MailController::class,'sendInvite'])->name('sendInvite');
Route::get('/shop/staff_delete',[ManagementController::class,'staffList']);
Route::get('/shop/staff_delete/{id}',[ManagementController::class,'staffDelete'])->name('staffDelete');
});
});

