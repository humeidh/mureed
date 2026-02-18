<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//websites frontend navoptions, aboutsus, ooms, restaurant,contactus
Route::get('/about', function () {
    return view('aboutus');
}); 

Route::get('/rooms', function () {
    return view('rooms');
}); 

Route::get('/restaurant', function () {
    return view('restaurant');
});

Route::get('/contact', function () {
    return view('contact');
});