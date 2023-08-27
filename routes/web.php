<?php

// DB::listen( function($query) ){

// }

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;

App::setLocale('en');

Route::view('/', 'home') -> name('home');
Route::view('/about', 'about') -> name('about');

Route::get('paperbin', [ProjectController::class, 'index_paperbin']) -> name('paperbin');
Route::resource('portfolio', ProjectController::class)->names('projects')->parameters(['portfolio' => 'project']);

Route::patch('paperbin/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('paperbin/{project}/forceDelete', [ProjectController::class, 'forceDelete']) -> name('projects.forceDelete');

Route::get('categorias/{category}', [CategoryController::class, 'show']) -> name('categories.show');

Route::view('/contact', 'contact') -> name('contact');
// Route::post('contact', [MessageController::class, 'store']) -> name('contact');
Route::post('contact', [MessageController::class, 'store']);

Auth::routes(['register' => false]);

Auth::routes();
