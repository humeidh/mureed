@extends('layouts.app')

@section('title', 'Contact Us - The Mureed')

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
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <h2 class="section-title">Get in Touch</h2>

    <!-- Office Hours -->
    <div style="text-align: center; margin: 2rem 0 3rem 0; padding: 2rem; background: #f8f9fa; border-radius: 15px;">
        <h4 style="color: #1a365d; margin-bottom: 1rem; font-size: 1.3rem;">🕐 Office Hours</h4>
        <p style="color: #666; font-size: 1.1rem;">Daily: 6:00 AM - 10:00 PM MVT<br>Emergency Support: 24/7</p>
        <p style="color: #3182ce; font-weight: 600; margin-top: 1rem;">We typically respond within 4 hours during office hours</p>
    </div>

    <!-- Contact Info Cards -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">📍</div>
            <div class="contact-details">
                <h4>Address</h4>
                <p>Fulidhoo Island<br>Vaavu Atoll<br>Republic of Maldives</p>
            </div>
        </div>
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">📞</div>
            <div class="contact-details">
                <h4>Phone</h4>
                <p>+960 765-4321<br>+960 987-6543</p>
            </div>
        </div>
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">✉️</div>
            <div class="contact-details">
                <h4>Email</h4>
                <p>info@themureed.com<br>reservations@themureed.com</p>
            </div>
        </div>
        <div class="contact-item" style="flex-direction: column; text-align: center; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="contact-icon" style="margin: 0 auto 1rem;">🌐</div>
            <div class="contact-details">
                <h4>Follow Us</h4>
                <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 1rem;">
                    <a href="#" style="width: 40px; height: 40px; background: #1877f2; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-weight: bold;">f</a>
                    <a href="#" style="width: 40px; height: 40px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-weight: bold;">📷</a>
                    <a href="#" style="width: 40px; height: 40px; background: #00af87; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; font-weight: bold;">T</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div style="background: #f8f9fa; padding: 4rem 2rem; margin-top: 4rem;">
    <div class="content-section">
        <h2 class="section-title">Send us a Message</h2>
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="contact-form" style="background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.1);">
                <form id="contactForm">
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