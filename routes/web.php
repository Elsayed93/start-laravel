<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UsersController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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


//offers

//offers Home
Route::get('/homepage', function () {
    return view('homepage');
})->name('offershome');

//offers CRUD
Route::group([
    'prefix' =>  LaravelLocalization::setLocale() . '/offers',
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('/', 'OffersController@index')->name('offers.index'); //get all offers
    Route::get('/create', 'OffersController@create')->name('offers.create'); // show offer create form 
    Route::post('/store', 'OffersController@store')->name('offers.store'); // store offer in offers table
    Route::get('edit/{offer_id}', 'OffersController@edit')->name('offer.edit'); // edite offer  
    Route::post('update/{offer_id}', 'OffersController@update')->name('offers.update'); // update offer  
    
});

// view method to return a view direct ,,, (url, view name, data passed to view)
Route::namespace('Front')->prefix('/users')->group(function () {

    Route::view('/home', 'landing');
    Route::view('/aboutus', 'about-us');
    Route::get('/', [UsersController::class, 'index']);
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| socialite package
|--------------------------------------------------------------------------
| socialite package to register with a social media account
| (facebook, twitter, linkedin, google, github, gitlab, or bitbucket)
|
*/

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token


    // OAuth 1.0 providers...
    $token = $user->token;
    $tokenSecret = $user->tokenSecret;

    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();
});
