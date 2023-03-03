<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\UserController;
/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UserController::class,'index'])->name('Login');
Route::post('/user_login',[UserController::class,'Handle_Login'])->name('.handle-Login');
Route::get('/login-google/{provider}',[GoogleController::class,'redirect'])->name('LoginGoogle');
Route::get('/callback/{provider}',[GoogleController::class,'callback'])->name('Callback');


Route::get('/chinh-sach-quyen-rieng-tu', function(){
    return '<h1> Chính sách quyền riêng tư </h1>';
});
Route::get('/login-facebook/{provider}',[FacebookController::class,'redirect'])->name('LoginFacebook');
Route::get('/callback-facebook/{provider}',[FacebookController::class,'callback'])->name('CallbackFacebook');

