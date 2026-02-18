@extends('layouts.app')

@section('title', 'The Mureed - Perfect Getaway')

@section('content')
<div id="home">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Reserve Your Perfect Getaway</h1>
                <p>Experience unparalleled comfort and hospitality at The Mureed - your home away from home.</p>
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

                <div class="testimonial-slide active">
                    <p class="testimonial-text">"The Mureed was a hidden gem! The hospitality and attention to detail made our stay unforgettable. The staff went above and beyond to ensure our comfort."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(45deg, #667eea, #764ba2);"></div>
                        <div class="author-info"><h4>John Doe</h4><p>Travel Blogger</p></div>
                    </div>
                </div>

                <div class="testimonial-slide">
                    <p class="testimonial-text">"Absolutely stunning location with pristine beaches and crystal-clear waters. The Ocean View Suite exceeded all our expectations. Perfect for our honeymoon!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(45deg, #f093fb, #f5576c);"></div>
                        <div class="author-info"><h4>Sarah & Michael Johnson</h4><p>Honeymooners</p></div>
                    </div>
                </div>

                <div class="testimonial-slide">
                    <p class="testimonial-text">"The diving experiences at Fotteyo Kandu were incredible! Dr. Waheed's knowledge of marine life made every dive an educational adventure. Truly a diver's paradise."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(45deg, #4facfe, #00f2fe);"></div>
                        <div class="author-info"><h4>David Chen</h4><p>Marine Photographer</p></div>
                    </div>
                </div>

                <div class="testimonial-slide">
                    <p class="testimonial-text">"Chef Hassan's culinary creations were outstanding! Every meal was a perfect blend of traditional Maldivian flavors and international cuisine. The sunset dinner was magical."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(45deg, #43e97b, #38f9d7);"></div>
                        <div class="author-info"><h4>Isabella Rodriguez</h4><p>Food Critic</p></div>
                    </div>
                </div>

                <div class="testimonial-slide">
                    <p class="testimonial-text">"As a family, we were amazed by how The Mureed catered to everyone's needs. The kids loved the snorkeling, while we adults enjoyed the spa. Perfect family getaway!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(45deg, #fa709a, #fee140);"></div>
                        <div class="author-info"><h4>The Williams Family</h4><p>Family Travelers</p></div>
                    </div>
                </div>
            </div>

            <div class="testimonial-nav">
                <div class="nav-dot active" onclick="goToTestimonial(0)"></div>
                <div class="nav-dot" onclick="goToTestimonial(1)"></div>
                <div class="nav-dot" onclick="goToTestimonial(2)"></div>
                <div class="nav-dot" onclick="goToTestimonial(3)"></div>
                <div class="nav-dot" onclick="goToTestimonial(4)"></div>
            </div>
        </div>
    </section>
</div>
@endsection