<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'The Mureed - Perfect Getaway')</title>
    <meta name="description" content="@yield('meta_description', 'The Mureed - A luxury boutique resort on Fulidhoo Island, Maldives. Experience pristine beaches, world-class dining, and authentic Maldivian hospitality.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="The Mureed">
    <meta property="og:title" content="@yield('og_title', 'The Mureed - Perfect Getaway')">
    <meta property="og:description" content="@yield('og_description', 'Luxury boutique resort on Fulidhoo Island, Maldives. Pristine beaches, world-class dining, and authentic Maldivian hospitality.')">
    <meta property="og:url" content="{{ url()->current() }}">
    @hasSection('og_image')
    <meta property="og:image" content="@yield('og_image')">
    @endif

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'The Mureed - Perfect Getaway')">
    <meta name="twitter:description" content="@yield('og_description', 'Luxury boutique resort on Fulidhoo Island, Maldives.')">
    @hasSection('og_image')
    <meta name="twitter:image" content="@yield('og_image')">
    @endif

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>

    @unless(request()->is('/'))
    <!-- JSON-LD: Organization (non-home pages) -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "The Mureed",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('favicon.svg') }}"
    }
    </script>
    @endunless
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar" aria-label="Main navigation">
        <a href="{{ url('/') }}" class="logo">The Mureed</a>
        <button class="mobile-menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false">&#9776;</button>
        <ul class="nav-links">
            <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">About Us</a></li>
            <li><a href="{{ url('/rooms') }}" class="{{ request()->is('rooms') ? 'active' : '' }}">Rooms</a></li>
            <li><a href="{{ url('/restaurant') }}" class="{{ request()->is('restaurant') ? 'active' : '' }}">Restaurant</a></li>
            <li><a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
            <li><a href="{{ url('/blog') }}" class="{{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact Us</a></li>
        </ul>
        <button class="book-btn" onclick="showBookingModal()">Book</button>
    </nav>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="gallery-modal" role="dialog" aria-label="Gallery">
        <div class="gallery-modal-content">
            <div class="gallery-modal-header">
                <h3 id="galleryTitle">Gallery</h3>
                <button class="gallery-modal-close" onclick="closeGalleryModal()" aria-label="Close gallery">&times;</button>
            </div>
            <div class="gallery-carousel">
                <button class="gallery-controls gallery-prev" onclick="changeGallerySlide(-1)" aria-label="Previous image">&#8249;</button>
                <button class="gallery-controls gallery-next" onclick="changeGallerySlide(1)" aria-label="Next image">&#8250;</button>
                <div class="gallery-slide active">Gallery Image</div>
                <div class="gallery-slide">Gallery Image</div>
                <div class="gallery-slide">Gallery Image</div>
                <div class="gallery-slide">Gallery Image</div>
                <div class="gallery-slide">Gallery Image</div>
            </div>
            <div class="gallery-indicators">
                <div class="gallery-dot active" onclick="goToGallerySlide(0)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(1)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(2)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(3)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(4)"></div>
            </div>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div id="reservationModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; align-items: center; justify-content: center;" role="dialog" aria-label="Restaurant reservation">
        <div style="background: white; padding: 3rem; border-radius: 15px; max-width: 500px; width: 90%; position: relative;">
            <span onclick="closeReservationModal()" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 2rem; cursor: pointer; color: #666;" aria-label="Close">&times;</span>
            <h2 style="color: #1a365d; margin-bottom: 2rem; text-align: center;">Restaurant Reservation</h2>
            <form>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Date</label>
                        <input type="date" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Time</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>6:00 PM</option><option>6:30 PM</option><option>7:00 PM</option>
                            <option>7:30 PM</option><option>8:00 PM</option><option>8:30 PM</option><option>9:00 PM</option>
                        </select>
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Guests</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>2 Guests</option><option>3 Guests</option><option>4 Guests</option>
                            <option>5 Guests</option><option>6+ Guests</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Seating</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>Indoor</option><option>Outdoor</option><option>Beachfront</option>
                        </select>
                    </div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Special Requests</label>
                    <textarea placeholder="Any dietary restrictions or special occasions..." style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem; height: 100px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;" onclick="submitReservation(event)">Confirm Reservation</button>
            </form>
        </div>
    </div>

    <!-- Booking Modal -->
    <div id="bookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; align-items: center; justify-content: center;" role="dialog" aria-label="Book your stay">
        <div style="background: white; padding: 3rem; border-radius: 15px; max-width: 560px; width: 90%; position: relative; max-height: 90vh; overflow-y: auto;">
            <span onclick="closeBookingModal()" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 2rem; cursor: pointer; color: #666;" aria-label="Close">&times;</span>
            <h2 style="color: #1a365d; margin-bottom: 2rem; text-align: center;">Book Your Stay</h2>
            <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="room_id" id="booking_room_id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Full Name *</label>
                        <input type="text" name="guest_name" required style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Email *</label>
                        <input type="email" name="email" required style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Phone</label>
                        <input type="tel" name="phone" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Nationality</label>
                        <input type="text" name="nationality" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Check-in Date *</label>
                        <input type="date" name="check_in" required id="checkin_date" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Check-out Date *</label>
                        <input type="date" name="check_out" required id="checkout_date" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Adults *</label>
                        <select name="adults" required style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5+</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Children</label>
                        <select name="children" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Special Requests</label>
                    <textarea name="special_requests" rows="3" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem; resize: vertical;" placeholder="Any special requirements or requests..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;">Send Booking Inquiry</button>
                <p style="text-align:center; color:#888; font-size:0.85rem; margin-top:1rem;">Our team will confirm availability within 4 hours.</p>
            </form>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>The Mureed</h4>
                <p>Subscribe to our newsletter for the latest updates and special offers.</p>
                <div class="newsletter">
                    <input type="email" placeholder="Your Email" aria-label="Email for newsletter">
                    <button onclick="subscribeNewsletter()">Subscribe</button>
                </div>
                <p style="margin-top: 1rem; font-size: 0.9rem;">By subscribing, you consent to our Privacy Policy and receive updates.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/rooms') }}">Rooms</a>
                <a href="{{ url('/restaurant') }}">Restaurant</a>
                <a href="{{ url('/gallery') }}">Gallery</a>
                <a href="{{ url('/blog') }}">Blog</a>
                <a href="{{ url('/about') }}">About Us</a>
                <a href="{{ url('/contact') }}">Contact Us</a>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <a href="{{ url('/contact') }}">Contact Us</a>
                <a href="{{ url('/blog') }}">Blog</a>
                <a href="{{ url('/about') }}">About</a>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    @php
                        $footerFacebook = \App\Models\FooterSetting::get('social_facebook', '#');
                        $footerInstagram = \App\Models\FooterSetting::get('social_instagram', '#');
                        $footerTwitter = \App\Models\FooterSetting::get('social_twitter', '#');
                        $footerLinkedin = \App\Models\FooterSetting::get('social_linkedin', '#');
                        $footerYoutube = \App\Models\FooterSetting::get('social_youtube', '#');
                        $footerPhone = \App\Models\FooterSetting::get('contact_phone_1', '+960 765-4321');
                        $footerEmail = \App\Models\FooterSetting::get('contact_email_1', 'info@themureed.com');
                        $footerAddress = \App\Models\FooterSetting::get('contact_address', "Fulidhoo Island\nVaavu Atoll\nRepublic of Maldives");
                    @endphp
                    <a href="{{ $footerFacebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">f</a>
                    <a href="{{ $footerInstagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="{{ $footerTwitter }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter">X</a>
                    <a href="{{ $footerLinkedin }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">in</a>
                    <a href="{{ $footerYoutube }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6A3 3 0 0 0 .5 6.2 31.4 31.4 0 0 0 0 12a31.4 31.4 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 0 0 2.1-2.1c.3-1.9.5-3.8.5-5.8s-.2-3.9-.5-5.8zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                    </a>
                </div>
                <p style="margin-top: 1rem; font-size: 0.9rem;">{!! nl2br(e($footerAddress)) !!}<br>Phone: {{ $footerPhone }}<br>Email: {{ $footerEmail }}</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} The Mureed. All rights reserved. | Privacy Policy | Terms of Service | Cookie Settings</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/frontend/app.js') }}" defer></script>

    @stack('scripts')
</body>
</html>
