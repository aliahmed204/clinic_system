<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\auth\LogoutController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SettingController;
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




// login to dashboard
Route::middleware(['web'])->group(function (){
    Route::group([
        'prefix'=>'admin',
        'as'=>'admin.',
        'middleware'=>['guest'],
        'controller'=>LoginController::class,
    ],function (){
        Route::get('/login','loginPage')->name('loginPage');
        Route::post('/login' , 'login')->name('login');
    });

    Route::group([
        'prefix'=>'admin',
        'as'=>'admin.',
        'middleware'=>['auth'],
    ],function (){
        Route::get('/' , [AdminController::class , 'index'])->name('index')->middleware('check.admin');
        Route::get('/logout' , [LogoutController::class , 'logout'])->name('logout');
    });
});

// Doctors Routes
Route::group([
    'prefix'=>'admin/doctor',
    'as'=>'admin.doctor.',
    'middleware'=>['auth' ,'check.admin'],
    'controller'=> DoctorController::class,
],function (){
    Route::get('/' , 'index')->name('index');

    Route::get('/create' , 'create')->name('create');
    Route::post('/store' , 'store')->name('store');

    Route::get('/show/{doctor}' , 'show')->name('show');
    Route::get('/{doctor}/edit' , 'edit')->name('edit');
    Route::patch('/{doctor}/update' , 'update')->name('update');

    Route::delete('/{doctor}/delete' , 'softDelete')->name('delete'); //soft Delete
    Route::get('/archive' , 'archive')->name('archive');
    Route::post('/{doctor}/restore' , 'restore')->name('restore');

    Route::delete('/{doctor}/destroy' , 'forceDelete')->name('destroy');// destroy
});

// Majors Routes
Route::group([
    'prefix'=>'admin/major',
    'as'=>'admin.major.',
    'middleware'=>['auth' ,'check.admin'],
    'controller'=> MajorController::class,
],function (){
    Route::get('/' , 'index')->name('index');

    Route::get('/create' , 'create')->name('create');
    Route::post('/store' , 'store')->name('store');

    Route::get('/show/{major}' , 'show')->name('show');
    Route::get('/{major}/edit' , 'edit')->name('edit');
    Route::patch('/{major}/update' , 'update')->name('update');

    Route::delete('/{major}/destroy' , 'destroy')->name('destroy');// destroy
});

// Booking Routes
Route::group([
    'prefix'=>'admin/booking',
    'as'=>'admin.booking.',
    'middleware'=>['auth' ,'check.admin'],
    'controller'=> BookingController::class,
],function (){
    Route::get('/' , 'index')->name('index');
    Route::get('/bookedDate' , 'bookedDate')->name('bookedDate');
    Route::get('/detectedDate' , 'detectedDate')->name('detectedDate');

    Route::patch('/{booking}/update' , 'update')->name('update');

    Route::delete('/{booking}/destroy' , 'destroy')->name('destroy');// destroy
});
// Users Routes
Route::group([
    'prefix'=>'admin/user',
    'as'=>'admin.user.',
    'middleware'=>['auth' ,'check.admin'],
    'controller'=> UserController::class,
],function (){
    Route::get('/' , 'index')->name('index');
    Route::get('/showAdmins' , 'showAdmins')->name('showAdmins');
    Route::get('/showUsers' , 'showUsers')->name('showUsers');

    Route::get('/create' , 'create')->name('create');
    Route::post('/store' , 'store')->name('store');

    Route::get('/show/{user}' , 'show')->name('show');
    Route::get('/{user}/edit' , 'edit')->name('edit');
    Route::patch('/{user}/update' , 'update')->name('update');

    Route::patch('/{user}/makeRoleUser' , 'makeRoleUser')->name('makeRoleUser');
    Route::patch('/{user}/makeRoleAdmin' , 'makeRoleAdmin')->name('makeRoleAdmin');

    Route::delete('/{user}/destroy' , 'destroy')->name('destroy');// destroy
});
// contact Routes
Route::group([
    'prefix'=>'admin/contact',
    'as'=>'admin.contact.',
    'middleware'=>['auth' ,'check.admin'],
    'controller'=> ContactController::class,
],function (){
    Route::get('/' , 'index')->name('index');
    Route::delete('/{contact}/destroy' , 'destroy')->name('destroy');// destroy
});
// Settings Routes
Route::group([
    'prefix'=>'admin/setting',
    'as'=>'admin.setting.',
    'middleware'=>['auth' ,'check.admin'],
    'controller'=> SettingController::class,
],function (){
    Route::get('/' , 'home')->name('home');
    Route::patch('/homeUpdate{setting}' , 'homeUpdate')->name('homeUpdate');
});
