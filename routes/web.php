<?php

// use App\Http\Controllers\OffersController;

use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::multiauth('Administrator', 'administrator');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => 'lang'
], function () {
    #### offers 
    Route::resource('/offers', OffersController::class);

    #### products 
    Route::resource('/products', ProductsController::class);

    #### videos 
    Route::resource('/videos', VideosController::class);
});

#### home page 
Route::view('homepage', 'homepage')->name('homePage');


################################# start Relations ##############################
use App\Http\Controllers\Relations\RelationsController;

// one to one (users && phones )
Route::get('user/phone/{id}', [RelationsController::class, 'oneToOne']); // one to one 
Route::get('phone/user/{id}', [RelationsController::class, 'inverseOneToOne']); // inverse one to one 

################################# end Relations ##############################