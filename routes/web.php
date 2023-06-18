<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::controller(ListingController::class)->group(function (){
    Route::get('/', 'index');
    Route::get('/listings', 'index');
    Route::get('/listing/{listing}', 'show');
    Route::get('/listings/create', 'create')->middleware('auth');
    Route::post('/listings', 'store')->middleware('auth');
    Route::get('/listing/{listing}/edit', 'edit')->middleware('auth');
    Route::patch('/listing/{listing}', 'update')->middleware('auth');
    Route::delete('/listing/{listing}', 'destroy')->middleware('auth');
    Route::get('/listings/manage', 'manage')->middleware('auth');
});

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
