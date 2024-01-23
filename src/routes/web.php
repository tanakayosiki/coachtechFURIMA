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
});

