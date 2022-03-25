<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\RegistrationController;
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


Route::get('/', [DemoController::class, 'index']);

Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register'])->name('customer.view');

Route::group(['prefix'=>'/customer'], function(){
    Route::get('/view', [RegistrationController::class, 'view']);
    Route::get('/delete/{id}', [RegistrationController::class, 'delete'])->name('customer.delete');
    Route::get('/trash', [RegistrationController::class, 'trash'])->name('customer.trash');
    Route::get('/restore/{id}', [RegistrationController::class, 'restore'])->name('customer.restore');
    Route::get('/forcedelete/{id}', [RegistrationController::class, 'forcedelete'])->name('customer.forcedelete');
    Route::get('/edit/{id}', [RegistrationController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [RegistrationController::class, 'update'])->name('customer.update');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/demo/{name}/{id?}', function($name, $id = null){
    $data = compact('name','id');
    return view('demo')->with($data,$id);
});

Route::get('/home', function(){
    return view('home');
});

