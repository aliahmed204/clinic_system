<?php

use App\Http\Controllers\EndUser\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EndUser\ContactController;
use App\Http\Controllers\EndUser\DoctorController;
use App\Http\Controllers\EndUser\EndUserController;
use App\Http\Controllers\EndUser\MajorController;
use Illuminate\Support\Facades\Route;



Route::get('/', [EndUserController::class , 'index'])->name('index');

require __DIR__.'/auth.php';

Route::group([
    'prefix'=>'doctor',
    'as'=>'doctor.',
    'controller'=> DoctorController::class,
],function (){
    Route::get('/' , 'index')->name('index');

    Route::get('/majorDoctor/{major}' , 'majorDoctor')->name('majorDoctor');

    Route::get('/{doctor}' , 'show')->name('show');
    Route::post('/submit-rating/{doctor}' , 'store')->name('submit_rating');


});
Route::group([
    'prefix'=>'major',
    'as'=>'major.',
    'controller'=> MajorController::class,
],function (){
    Route::get('/' , 'index')->name('index');
    Route::get('/{major}' , 'show')->name('show');
});

Route::group([
    'prefix'=>'contact',
    'as'=>'contact.',
    'controller'=> ContactController::class,
],function (){
    Route::get('/' , 'index')->name('index');
    Route::get('/contact' , 'contact')->name('contact')->middleware('auth');
});

Route::post('bookData',[BookingController::class , 'bookData'])->name('bookData')->middleware('auth');

