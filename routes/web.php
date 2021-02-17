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

// one to many 
Route::get('hospital/doctor/{id}', [RelationsController::class, 'oneToMany']); // one to many
Route::get('doctor/hospital/{id}', [RelationsController::class, 'inverseOneToMany']); // inverse one to many

// many to many (doctors && services)
Route::get('/doctors', [RelationsController::class, 'doctorServices']);
################################# end Relations ##############################

################################# start hospitals controller ##############################
use App\Http\Controllers\Relations\HospitalsController;

Route::prefix('hospital')->group(function () {
    Route::get('/', [HospitalsController::class, 'allHospitals'])->name('hospitals.index');
    Route::get('/{hospital_id}', [HospitalsController::class, 'allDoctors'])->name('doctors');
    Route::post('/{hospital_id}', [HospitalsController::class, 'deleteHospital'])->name('hospital.delete');
});
################################# end hospitals controller ##############################


################################# start Doctors services relation (many to many) ##############################

################################# end Doctors services relation (many to many) ##############################
