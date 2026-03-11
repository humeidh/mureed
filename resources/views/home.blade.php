@extends('layouts.app')

@section('title', 'The Mureed - Perfect Getaway')

@section('content')
<div id="home">
    <!-- Hero Section -->
    <section class="hero">
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
                <div class="room-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🍽️</div>
                <div class="room-content">
                    <h3>Culinary Excellence</h3>
                    <p>Savor exquisite dishes crafted by our world-class chefs using the finest local ingredients.</p>
                </div>
            </a>
            <a href="{{ url('/amenities') }}" class="room-card" style="text-decoration: none; color: inherit;">
                <div class="room-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🏊‍♀️</div>
                <div class="room-content">
                    <h3>Premium Amenities</h3>
                    <p>Unwind with our luxury spa, infinity pool, and world-class facilities designed for your relaxation.</p>
                </div>
            </a>
            <a href="{{ url('/rooms') }}" class="room-card" style="text-decoration: none; color: inherit;">
                <div class="room-image" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">🏨</div>
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
                <svg width="100" height="30" viewBox="0 0 100 30" fill="currentColor">
                    <text x="0" y="20" font-size="14" fill="currentColor">★ Reviews</text>
                </svg>
            </div>

            <div class="testimonial-carousel">
                <button class="carousel-controls carousel-prev" onclick="changeTestimonial(-1)">‹</button>
                <button class="carousel-controls carousel-next" onclick="changeTestimonial(1)">›</button>

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
                <div class="nav-dot {{ $i === 0 ? 'active' : '' }}" onclick="goToTestimonial({{ $i }})"></div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
@endsection
