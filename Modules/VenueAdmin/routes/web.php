<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Support\Facades\Route;
use Modules\VenueAdmin\Http\Controllers\VenueAdminController;
use Modules\VenueAdmin\Http\Controllers\VenueUserProfileController;
use Modules\VenueAdmin\Http\Controllers\VenueBookingController;
use Illuminate\Foundation\Configuration\Middleware;
use Modules\VenueAdmin\Http\Middleware\VenueAdminMiddleware;
use App\Http\Middleware\FlashMessageMiddleware;

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

/*Route::group([], function () {
    Route::resource('venueadmin', VenueAdminController::class)->names('venueadmin');
});*/


Route::get('/venue/login',[VenueAdminController::class, 'index'])->name('venue/login');
Route::any('/venue/mobileotp',[VenueAdminController::class, 'mobileotp'])->name('mobileotp');
Route::any('/venue/sendotp',[VenueAdminController::class, 'sendotp'])->name('venueadmin/sendotp');
Route::any('/venue/logincheck',[VenueAdminController::class, 'logincheck'])->name('venue/logincheck');
Route::any('/venueadmin/inactiveuser',[VenueAdminController::class, 'inactiveuser'])->name('venueadmin/inactiveuser');
Route::any('/venue/register',[VenueAdminController::class, 'register'])->name('venueadmin/register');
Route::post('/venue/newaccountadd',[VenueAdminController::class, 'newaccountadd'])->name('venueadmin/newaccountadd');

Route::prefix('venueadmin')->middleware([VenueAdminMiddleware::class, FlashMessageMiddleware::class])->group(function () { 

    Route::any('/dashboard',[VenueAdminController::class, 'dashboard'])->name('venueadmin/dashboard');

    Route::any('/userprofile',[VenueUserProfileController::class, 'index'])->name('venueadmin/userprofile');
    Route::any('/userprofileupdate',[VenueUserProfileController::class, 'store'])->name('venueadmin/userprofileupdate');
    Route::any('/changemobileno',[VenueUserProfileController::class, 'changemobileno'])->name('venueadmin/changemobileno');

    Route::any('/venueadd',[VenueAdminController::class, 'storevenue'])->name('venueadmin/venueadd');


     Route::any('/addvenue',[VenueAdminController::class, 'createvenue'])->name('venueadmin/create');

    Route::any('/venuelist',[VenueAdminController::class, 'show'])->name('venueadmin/venuelist');


    Route::any('/venuebooking/{id}/add',[VenueBookingController::class, 'create']);
    Route::any('/venuebooking/addnewevents',[VenueBookingController::class, 'addnewevents']);
    Route::any('/venuebooking/updatenewevents',[VenueBookingController::class, 'updatenewevents']);
    Route::any('/venuebooking/events',[VenueBookingController::class, 'getevents']);
    Route::any('/venuebooking/{id}/edit',[VenueBookingController::class, 'edit']);
    

     Route::any('/logout',[VenueAdminController::class, 'destroy'])->name('venueadmin/logout');

});