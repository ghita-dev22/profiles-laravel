<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\informationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
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
Route::name('profiles.')->prefix('profiles')->group(function(){
Route::controller(ProfileController::class)->group(function(){
Route::get('/','index')->name('index')->middleware('auth');
Route::get('/{profile}','show')->where('profile','\d+')
->name('show')->middleware('auth');
Route::get('/create','create')->name('create');
Route::post('/','store')->name('store');
Route::delete('/{profile}','destroy')
->name('destroy')->middleware('auth');
Route::put('/{profile}','update')->name('update')->middleware('auth');
Route::get('/{profile}/edit','edit')
->name('edit')->middleware('auth');
});
});
Route::get('/', [homeController::class,'index'])->name('homePage.index');
Route::get('/infos',[informationsController::class,'index'])->name('settings.index'); 

Route::get('/login',[LoginController::class,'show'])->name('login.showLogin');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');   
 
Route::resource('publications',PublicationController::class);
   

