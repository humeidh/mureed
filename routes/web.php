<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'));
Route::get('/rooms', fn() => view('rooms'));
Route::get('/restaurant', fn() => view('restaurant'));
Route::get('/amenities', fn() => view('amenities'));
Route::get('/gallery', fn() => view('gallery'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));