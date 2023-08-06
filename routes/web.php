<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;

App::setLocale('en');

Route::view('/', 'home') -> name('home');
Route::view('/about', 'about') -> name('about');

Route::resource('portfolio', ProjectController::class) -> names('projects') -> parameters(['portfolio' => 'project']);

Route::view('/contact', 'contact') -> name('contact');
// Route::post('contact', [MessageController::class, 'store']) -> name('contact');
Route::post('contact', [MessageController::class, 'store']);

Auth::routes(['register' => false]);

Auth::routes();
