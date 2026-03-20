@extends('layouts.app')

@section('title', 'Contact Us - The Mureed')
@section('meta_description', 'Get in touch with The Mureed resort in Fulidhoo Island, Maldives. Contact us for reservations, inquiries, or to plan your perfect tropical getaway.')

@section('content')
<div class="page-header">
    <h1>Contact Us</h1>
    <p>Get in touch with our team to plan your perfect getaway to The Mureed</p>
</div>

<div class="content-section">
    <!-- Google Map -->
    <div class="map-container" style="margin: 0 0 4rem 0; height: 450px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15883.234567890123!2d73.4321098765432!3d3.2109876543210!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b3f1234567890ab%3A0x1234567890abcdef!2sFulidhoo%2C%20Maldives!5e0!3m2!1sen!2smv!4v1234567890123!5m2!1sen!2smv"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="The Mureed Resort Location - Fulidhoo Island, Maldives">
        </iframe>
    </div>

    <h2 class="section-title">Get in Touch</h2>

    <!-- Office Hours -->
    <div style="text-align: center; margin: 2rem 0 3rem 0; padding: 2rem; background: #f8f9fa; border-radius: 15px;">
        <h4 style="color: #1a365d; margin-bottom: 1rem; font-size: 1.3rem;">Office Hours</h4>
        <p style="color: #666; font-size: 1.1rem;">{{ $officeHours }}<br>Emergency Support: 24/7</p>
        <p style="color: #3182ce; font-weight: 600; margin-top: 1rem;">We typically respond within 4 hours during office hours</p>
    </div>

    <!-- Contact Info Cards -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div class="contact-details">
                <h4>Address</h4>
                <p>{!! nl2br(e($address)) !!}</p>
            </div>
        </div>
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div class="contact-details">
                <h4>Phone</h4>
                <p><a href="tel:{{ preg_replace('/[^+0-9]/', '', $phone1) }}">{{ $phone1 }}</a><br><a href="tel:{{ preg_replace('/[^+0-9]/', '', $phone2) }}">{{ $phone2 }}</a></p>
            </div>
        </div>
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div class="contact-details">
                <h4>Email</h4>
                <p><a href="mailto:{{ $email1 }}">{{ $email1 }}</a><br><a href="mailto:{{ $email2 }}">{{ $email2 }}</a></p>
            </div>
        </div>
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div class="contact-details">
                <h4>Follow Us</h4>
                <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 1rem;">
                    @if($facebook && $facebook !== '#')<a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: #1877f2; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-weight: bold;" aria-label="Facebook">f</a>@endif
                    @if($instagram && $instagram !== '#')<a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-weight: bold;" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>@endif
                    @if($tripadvisor && $tripadvisor !== '#')<a href="{{ $tripadvisor }}" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: #00af87; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-weight: bold;" aria-label="TripAdvisor">T</a>@endif
                </div>
                @if((!$facebook || $facebook === '#') && (!$instagram || $instagram === '#') && (!$tripadvisor || $tripadvisor === '#'))
                <p style="color: #999; font-size: 0.9rem;">Social links coming soon</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div style="background: #f8f9fa; padding: 4rem 2rem; margin-top: 4rem;">
    <div class="content-section">
        <h2 class="section-title">Send us a Message</h2>

        @if(session('contact_success'))
        <div style="background: #c6f6d5; border: 1px solid #38a169; color: #276749; padding: 1.25rem 2rem; margin-bottom: 2rem; border-radius: 10px; text-align: center; font-weight: 600; max-width: 800px; margin: 0 auto 2rem;">
            {{ session('contact_success') }}
        </div>
        @endif

        <div style="max-width: 800px; margin: 0 auto;">
            <div class="contact-form" style="background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.1);">
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 2rem;">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                            <option value="">Select a subject (optional)</option>
                            <option value="booking">Room Booking Inquiry</option>
                            <option value="dining">Restaurant Reservation</option>
                            <option value="activities">Activities & Excursions</option>
                            <option value="events">Special Events</option>
                            <option value="general">General Information</option>
                            <option value="feedback">Feedback</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 2rem;">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Tell us about your travel plans, special requests, or any questions you may have..." required style="height: 180px;"></textarea>
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary" style="padding: 1rem 4rem; font-size: 1.2rem; border-radius: 30px;">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
