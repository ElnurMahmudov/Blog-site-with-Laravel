<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\PageController;
use App\Http\Controllers\Back\MessageController;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/


// site offline route
  Route::get('site.offline',function(){
    return view('front.offline');
  });


//admin panel
Route::prefix('admin')->group(function(){
  //Meqale route's
  Route::get('yazilar/trashed','App\Http\Controllers\Back\ArticleController@trashed')->name('trashed');
  Route::get('yazilar/deleted/{id}','App\Http\Controllers\Back\ArticleController@hardDelete')->name('hardDelete');
  Route::get('yazilar/recover/{id}','App\Http\Controllers\Back\ArticleController@recover')->name('recover');
  Route::resource('yazilar', 'App\Http\Controllers\Back\ArticleController');
  Route::get('delete/{id}','App\Http\Controllers\Back\ArticleController@delete')->name('delete');
  
  //kateqoriya route's
  Route::get('kateqoriyalar/delete/{id}','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
  Route::post('kateqoriyalar/update/{id}','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
  Route::get('kateqoriyalar','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
  Route::post('kateqoriyalar/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
  Route::get('kateqoriyalar/edit/{id}','App\Http\Controllers\Back\CategoryController@edit')->name('category.edit');

  //page's route's
  Route::get('/sehifeler','App\Http\Controllers\Back\PageController@index')->name('pages.index');
  Route::get('/sehifeler/yeni','App\Http\Controllers\Back\PageController@create')->name('pages.create');
  Route::get('/sehifeler/redakte/{id}','App\Http\Controllers\Back\PageController@edit')->name('pages.edit');
  Route::post('/sehifeler/yenile/{id}','App\Http\Controllers\Back\PageController@update')->name('pages.update');
  Route::post('/sehifeler/yeni','App\Http\Controllers\Back\PageController@post')->name('pages.post');
  Route::get('/sehifeler/delete/{id}','App\Http\Controllers\Back\PageController@delete')->name('pages.delete');
  Route::get('/sehifeler/siralama','App\Http\Controllers\Back\PageController@orders')->name('pages.orders');

  //message route's
  Route::get('/mesajlar','App\Http\Controllers\Back\MessageController@index')->name('message.index');
  Route::get('/mesajlar/delete/{id}','App\Http\Controllers\Back\MessageController@delete')->name('message.delete');

  //config route's
  Route::get('/ayarlar','App\Http\Controllers\Back\ConfigController@index')->name('config.index');
  Route::post('/ayarlar/update','App\Http\Controllers\Back\ConfigController@update')->name('config.update');



  //login route's
  Route::get('login','App\Http\Controllers\Back\AuthController@login')->name('adminLogin');
  Route::post('login','App\Http\Controllers\Back\AuthController@loginPost')->name('loginPost');
  Route::get('exit', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('adminauth')->group(function () {
  Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/kateqoriya/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/blog{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/elaqe','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/elaqe','App\Http\Controllers\Front\Homepage@contactpost')->name('contactpost');
Route::get('/{page}','App\Http\Controllers\Front\Homepage@page')->name('page');