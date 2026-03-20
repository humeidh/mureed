@extends('layouts.app')

@section('title', 'The Mureed - Luxury Boutique Resort in Maldives')
@section('meta_description', 'The Mureed - A luxury boutique resort on Fulidhoo Island, Vaavu Atoll, Maldives. Book your perfect getaway with pristine beaches, world-class dining, and authentic hospitality.')
@section('og_title', 'The Mureed - Luxury Boutique Resort in Maldives')
@section('og_description', 'Experience unparalleled comfort and hospitality at The Mureed. Pristine beaches, world-class dining, and authentic Maldivian culture.')

@section('content')
<div id="home">
    <!-- Hero Section -->
    <section class="hero{{ $heroImage ? ' has-image' : '' }}"@if($heroImage) style="background-image: url('{{ asset('storage/' . $heroImage) }}')"@endif>
        <div class="hero-content">
            <div class="hero-text">
                <h1>{{ $heroTitle }}</h1>
                <p>{{ $heroSubtitle }}</p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary" onclick="showBookingModal()">Book Now</a>
                    <a href="{{ url('/rooms') }}" class="btn btn-secondary">Explore Rooms</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="beach-scene"></div>
            </div>
        </div>
    </section>

    <!-- Quick Preview Section -->
    <section class="content-section">
        <h2 class="section-title">Experience Serenity at The Mureed</h2>
        <div class="rooms-grid">
            <a href="{{ url('/restaurant') }}" class="room-card" style="text-decoration: none; color: inherit;">
                <div class="room-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                    <span aria-hidden="true" style="font-size: 3rem;">&#127860;</span>
                </div>
                <div class="room-content">
                    <h3>Culinary Excellence</h3>
                    <p>Savor exquisite dishes crafted by our world-class chefs using the finest local ingredients.</p>
                </div>
            </a>
            <a href="{{ url('/about') }}" class="room-card" style="text-decoration: none; color: inherit;">
                <div class="room-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
                    <span aria-hidden="true" style="font-size: 3rem;">&#127946;&#8205;&#9792;&#65039;</span>
                </div>
                <div class="room-content">
                    <h3>Premium Amenities</h3>
                    <p>Unwind with our luxury spa, infinity pool, and world-class facilities designed for your relaxation.</p>
                </div>
            </a>
            <a href="{{ url('/rooms') }}" class="room-card" style="text-decoration: none; color: inherit;">
                <div class="room-image" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">
                    <span aria-hidden="true" style="font-size: 3rem;">&#127976;</span>
                </div>
                <div class="room-content">
                    <h3>Luxurious Accommodations</h3>
                    <p>Rest in elegantly appointed rooms and suites with breathtaking ocean views and modern amenities.</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Testimonial Carousel Section -->
    @if($testimonials->count())
    <section class="testimonial">
        <div class="testimonial-content">
            <div style="margin-bottom: 2rem; opacity: 0.7;">
                <span style="font-size: 14px; color: currentColor;">&#9733; Reviews</span>
            </div>

            <div class="testimonial-carousel">
                <button class="carousel-controls carousel-prev" onclick="changeTestimonial(-1)" aria-label="Previous review">&#8249;</button>
                <button class="carousel-controls carousel-next" onclick="changeTestimonial(1)" aria-label="Next review">&#8250;</button>

                @foreach($testimonials as $i => $t)
                <div class="testimonial-slide {{ $i === 0 ? 'active' : '' }}">
                    <p class="testimonial-text">{{ $t->content }}</p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: {{ $t->avatar_gradient ?? 'linear-gradient(45deg, #667eea, #764ba2)' }};"></div>
                        <div class="author-info">
                            <h4>{{ $t->guest_name }}</h4>
                            <p>{{ $t->guest_title }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="testimonial-nav">
                @foreach($testimonials as $i => $t)
                <div class="nav-dot {{ $i === 0 ? 'active' : '' }}" onclick="goToTestimonial({{ $i }})" aria-label="Go to review {{ $i + 1 }}"></div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>

<!-- JSON-LD: Hotel/LocalBusiness -->
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Hotel",
    "name": "The Mureed",
    "description": "A luxury boutique resort on Fulidhoo Island, Vaavu Atoll, Maldives offering pristine beaches, world-class dining, and authentic Maldivian hospitality.",
    "url": "{{ url('/') }}",
    "telephone": "{{ \App\Models\FooterSetting::get('contact_phone_1', '+960 765-4321') }}",
    "email": "{{ \App\Models\FooterSetting::get('contact_email_1', 'info@themureed.com') }}",
    "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Fulidhoo Island",
        "addressLocality": "Vaavu Atoll",
        "addressCountry": "MV"
    },
    "geo": {
        "@@type": "GeoCoordinates",
        "latitude": "3.2109",
        "longitude": "73.4321"
    },
    "starRating": {
        "@@type": "Rating",
        "ratingValue": "5"
    },
    "priceRange": "$199 - $799",
    "amenityFeature": [
        {"@@type": "LocationFeatureSpecification", "name": "Infinity Pool"},
        {"@@type": "LocationFeatureSpecification", "name": "Luxury Spa"},
        {"@@type": "LocationFeatureSpecification", "name": "Water Sports"},
        {"@@type": "LocationFeatureSpecification", "name": "Restaurant"},
        {"@@type": "LocationFeatureSpecification", "name": "Free WiFi"}
    ]
}
</script>
@endsection
