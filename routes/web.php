<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');

    Route::middleware('auth')->group(function(){
        Route::post('/', 'store')->name('home.store')->middleware('auth');
        Route::get('/caption', 'caption')->name('home.caption')->middleware('auth');
        Route::get('/caption/edit/{id}', 'captionedit')->name('home.caption.edit');
        Route::post('/caption/update', 'captionupdate')->name('home.caption.update');
        Route::get('/caption/delete/{id}', 'captiondelete')->name('home.caption.delete');
    });
});

Route::middleware('admin')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/admin/caption', 'caption')->name('admin.caption');
        Route::get('/admin/caption/add', 'add')->name('admin.caption.add');
        Route::post('/admin/caption/store', 'store')->name('admin.caption.store');
        Route::get('/admin/caption/edit/{id}', 'captionedit')->name('admin.caption.edit');
        Route::post('/admin/caption/update', 'captionupdate')->name('admin.caption.update');
        Route::get('/admin/caption/delete/{id}', 'captiondelete')->name('admin.caption.delete');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/proseslogin', 'proseslogin')->name('proseslogin');
    Route::get('/register', 'register')->name('register');
    Route::post('/prosesregister', 'prosesregister')->name('prosesregister');
    Route::get('/logout', 'logout')->name('logout');
});
