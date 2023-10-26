<?php

use App\Http\Controllers\Appraiser\DisplayAppraiserDetailController;
use App\Http\Controllers\Appraiser\AppraiseeListController;
use App\Http\Controllers\Appraiser\ShowAppraiseeDetails;
use App\Http\Controllers\HomeController;
use App\Livewire\Appraisee\PersonalDetailsForm;
use App\Livewire\Calendar;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');

    Route::get('/home', [HomeController::class, 'rollBaseAccess'])->middleware('auth')->name('home');

    Route::get('/user-details-form', PersonalDetailsForm::class)
        ->middleware(['web', 'auth'])
        ->name('user-details-form');

    Route::post('/user-details-form/update', PersonalDetailsForm::class)
        ->middleware(['web', 'auth'])
        ->name('user-details-form.update');

    Route::view('/unauthorized', 'unauthorized')->name('unauthorized');


    Route::get('/user-details/{userId}', [ShowAppraiseeDetails::class , 'showDetails'])->name('user.details')
        ->middleware(['web', 'auth', 'AppraiserMiddleware']);

    Route::get('/appraisee/list', [AppraiseeListController::class , 'showForm'])->name('user.list')
        ->middleware(['web', 'auth', 'AppraiserMiddleware']);

    Livewire::component('calendar', Calendar::class);

});
