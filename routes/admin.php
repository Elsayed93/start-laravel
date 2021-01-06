<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return 'admin page';
});


Route::namespace('Front')->prefix('admin')->group(function () {

    //All routes in Front Directory
    Route::get('/home', [HomeController::class, 'show']);

    Route::middleware('auth')->group(function(){
        Route::get('/home1', [HomeController::class, 'show1']);
        Route::get('/home2', [HomeController::class, 'show2']);
        Route::get('/home3', [HomeController::class, 'show3']);
    
    });
});
