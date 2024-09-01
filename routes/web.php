<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;
use App\Http\Controllers\PemasukanController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(Admin::class);
Route::get('home-user', function (){
    return view('home-user');
});

Route::resource('pemasukan', PemasukanController::class);