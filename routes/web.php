<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(AuthController::class)->prefix('/auth')->name('auth.')->group(function () {
    Route::get('/register', 'registerPage')->name('register-page');
    Route::get('/login', 'loginPage')->name('login-page');
    Route::get('/admin/login', 'adminLoginPage')->name('admin-login');
    Route::get('/me', 'profilePage')->name('profile');
    Route::get('/admin/dashboard', 'adminDashboardPage')->name('admin-dashboard');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/admin/login', 'adminEntry')->name('admin-entry');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(ApplicationController::class)->prefix('/application')->name('application.')->group(function () {
    Route::get('/create', 'create')->name('application-create');
    Route::post('/create', 'store')->name('store-application');
    Route::patch('/{id}/set-status', 'setStatus')->name('set-status');
    Route::post('/{id}/make-review', 'addReview  ')->name('add-review');
});