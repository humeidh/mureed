<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Models\Room;
use App\Models\Amenity;
use App\Models\MenuItem;
use App\Models\GalleryCategory;
use App\Models\Testimonial;
use App\Models\AboutSection;
use App\Models\Attraction;
use App\Models\TeamMember;
use App\Models\SiteSetting;
use App\Models\FooterSetting;

Route::get('/', function () {
    return view('home', [
        'testimonials' => Testimonial::where('is_published', true)->orderBy('sort_order')->get(),
        'heroTitle'    => SiteSetting::get('hero_title', 'Reserve Your Perfect Getaway'),
        'heroSubtitle' => SiteSetting::get('hero_subtitle', 'Experience unparalleled comfort and hospitality at The Mureed.'),
    ]);
});

Route::get('/rooms', function () {
    return view('rooms', [
        'rooms' => Room::where('is_active', true)->with(['images', 'amenities'])->orderBy('sort_order')->get(),
    ]);
});

Route::get('/restaurant', function () {
    return view('restaurant', [
        'breakfast' => MenuItem::where('is_active', true)->where('category', 'breakfast')->orderBy('sort_order')->get(),
        'lunch'     => MenuItem::where('is_active', true)->where('category', 'lunch')->orderBy('sort_order')->get(),
        'dinner'    => MenuItem::where('is_active', true)->where('category', 'dinner')->orderBy('sort_order')->get(),
        'specials'  => MenuItem::where('is_active', true)->where('is_special', true)->orderBy('sort_order')->get(),
    ]);
});

Route::get('/amenities', function () {
    return view('amenities', [
        'amenities' => Amenity::where('is_active', true)->where('type', 'global')->orderBy('sort_order')->get(),
    ]);
});

Route::get('/gallery', function () {
    return view('gallery', [
        'categories' => GalleryCategory::where('is_active', true)->with(['images' => fn($q) => $q->where('is_active', true)->orderBy('sort_order')])->orderBy('sort_order')->get(),
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'sections'    => AboutSection::where('is_active', true)->orderBy('sort_order')->keyBy('section_key'),
        'attractions' => Attraction::where('is_active', true)->orderBy('sort_order')->get(),
        'team'        => TeamMember::where('is_active', true)->orderBy('sort_order')->get(),
        'philosophy'  => SiteSetting::get('philosophy_text'),
        'mission'     => SiteSetting::get('mission'),
        'vision'      => SiteSetting::get('vision'),
    ]);
});

Route::get('/contact', fn() => view('contact'));

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
