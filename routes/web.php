<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
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
use App\Models\BlogPost;

Route::get('/', function () {
    return view('home', [
        'testimonials' => Testimonial::where('is_published', true)->orderBy('sort_order')->get(),
        'heroTitle'    => SiteSetting::get('hero_title', 'Reserve Your Perfect Getaway'),
        'heroSubtitle' => SiteSetting::get('hero_subtitle', 'Experience unparalleled comfort and hospitality at The Mureed.'),
        'heroImage'    => SiteSetting::get('hero_image'),
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

/*Route::get('/amenities', function () {
    return view('amenities', [
        'amenities' => Amenity::where('is_active', true)->where('type', 'global')->orderBy('sort_order')->get(),
    ]);
});  uncomment this block to enable ameneties in the menu*/

Route::get('/gallery', function () {
    return view('gallery', [
        'categories' => GalleryCategory::where('is_active', true)->with(['images' => fn($q) => $q->where('is_active', true)->orderBy('sort_order')])->orderBy('sort_order')->get(),
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'sections'    => AboutSection::where('is_active', true)->orderBy('sort_order')->get()->keyBy('section_key'),
        'attractions' => Attraction::where('is_active', true)->orderBy('sort_order')->get(),
        'team'        => TeamMember::where('is_active', true)->orderBy('sort_order')->get(),
        'philosophy'  => SiteSetting::get('philosophy_text'),
        'mission'     => SiteSetting::get('mission'),
        'vision'      => SiteSetting::get('vision'),
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'phone1'     => FooterSetting::get('contact_phone_1', '+960 765-4321'),
        'phone2'     => FooterSetting::get('contact_phone_2', '+960 987-6543'),
        'email1'     => FooterSetting::get('contact_email_1', 'info@themureed.com'),
        'email2'     => FooterSetting::get('contact_email_2', 'reservations@themureed.com'),
        'address'    => FooterSetting::get('contact_address', "Fulidhoo Island\nVaavu Atoll\nRepublic of Maldives"),
        'facebook'   => FooterSetting::get('social_facebook', '#'),
        'instagram'  => FooterSetting::get('social_instagram', '#'),
        'tripadvisor'=> FooterSetting::get('social_tripadvisor', '#'),
        'officeHours'=> FooterSetting::get('office_hours', 'Daily: 6:00 AM - 10:00 PM MVT'),
    ]);
});

Route::get('/blog', function () {
    return view('blog.index', [
        'posts' => BlogPost::published()->orderByDesc('published_at')->paginate(9),
    ]);
});

Route::get('/blog/{slug}', function (string $slug) {
    $post = BlogPost::published()->where('slug', $slug)->with('images')->firstOrFail();
    $related = BlogPost::published()->where('id', '!=', $post->id)->orderByDesc('published_at')->take(3)->get();
    return view('blog.show', compact('post', 'related'));
});

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
