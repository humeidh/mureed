@extends('layouts.app')

@section('title', 'Our Rooms - The Mureed')

@section('content')
<div class="page-header">
    <h1>Our Rooms</h1>
    <p>Discover comfort and elegance in every corner of our beautifully appointed accommodations</p>
</div>

<div class="content-section">
    <div class="rooms-grid">
        <!-- Ocean View Suite -->
        <div class="room-card">
            <div class="room-image">🌊</div>
            <div class="room-content">
                <div class="room-header">
                    <h3 class="room-title">Ocean View Suite</h3>
                    <div class="room-price">$299/night</div>
                </div>
                <ul class="room-features">
                    <li><div class="room-feature-icon">🌊</div><div class="room-feature-text">Ocean Views</div></li>
                    <li><div class="room-feature-icon">🛏️</div><div class="room-feature-text">King Bed</div></li>
                    <li><div class="room-feature-icon">🏡</div><div class="room-feature-text">Balcony</div></li>
                    <li><div class="room-feature-icon">🛁</div><div class="room-feature-text">Soaking Tub</div></li>
                    <li><div class="room-feature-icon">📶</div><div class="room-feature-text">Free WiFi</div></li>
                    <li><div class="room-feature-icon">❄️</div><div class="room-feature-text">AC</div></li>
                </ul>
                <div class="room-buttons">
                    <button class="btn btn-primary" onclick="showBookingModal()">Book Now</button>
                    <button class="btn btn-secondary" onclick="showRoomGallery('ocean-suite')">Room Gallery</button>
                </div>
            </div>
        </div>

        <!-- Beach Villa -->
        <div class="room-card">
            <div class="room-image" style="background: linear-gradient(45deg, #fa709a, #fee140);">🏖️</div>
            <div class="room-content">
                <div class="room-header">
                    <h3 class="room-title">Beach Villa</h3>
                    <div class="room-price">$499/night</div>
                </div>
                <ul class="room-features">
                    <li><div class="room-feature-icon">🏖️</div><div class="room-feature-text">Beach Access</div></li>
                    <li><div class="room-feature-icon">🚿</div><div class="room-feature-text">Outdoor Shower</div></li>
                    <li><div class="room-feature-icon">🛋️</div><div class="room-feature-text">Living Area</div></li>
                    <li><div class="room-feature-icon">🍽️</div><div class="room-feature-text">Kitchenette</div></li>
                    <li><div class="room-feature-icon">🛎️</div><div class="room-feature-text">Butler Service</div></li>
                    <li><div class="room-feature-icon">🌺</div><div class="room-feature-text">Garden View</div></li>
                </ul>
                <div class="room-buttons">
                    <button class="btn btn-primary" onclick="showBookingModal()">Book Now</button>
                    <button class="btn btn-secondary" onclick="showRoomGallery('beach-villa')">Room Gallery</button>
                </div>
            </div>
        </div>

        <!-- Garden Room -->
        <div class="room-card">
            <div class="room-image" style="background: linear-gradient(45deg, #a8edea, #fed6e3);">🌺</div>
            <div class="room-content">
                <div class="room-header">
                    <h3 class="room-title">Garden Room</h3>
                    <div class="room-price">$199/night</div>
                </div>
                <ul class="room-features">
                    <li><div class="room-feature-icon">🌿</div><div class="room-feature-text">Garden Views</div></li>
                    <li><div class="room-feature-icon">👑</div><div class="room-feature-text">Queen Bed</div></li>
                    <li><div class="room-feature-icon">🪑</div><div class="room-feature-text">Private Patio</div></li>
                    <li><div class="room-feature-icon">📺</div><div class="room-feature-text">Smart TV</div></li>
                    <li><div class="room-feature-icon">🍾</div><div class="room-feature-text">Mini-bar</div></li>
                    <li><div class="room-feature-icon">🛡️</div><div class="room-feature-text">Safe</div></li>
                </ul>
                <div class="room-buttons">
                    <button class="btn btn-primary" onclick="showBookingModal()">Book Now</button>
                    <button class="btn btn-secondary" onclick="showRoomGallery('garden-room')">Room Gallery</button>
                </div>
            </div>
        </div>

        <!-- Presidential Suite -->
        <div class="room-card">
            <div class="room-image" style="background: linear-gradient(45deg, #667eea, #764ba2);">👑</div>
            <div class="room-content">
                <div class="room-header">
                    <h3 class="room-title">Presidential Suite</h3>
                    <div class="room-price">$799/night</div>
                </div>
                <ul class="room-features">
                    <li><div class="room-feature-icon">🏰</div><div class="room-feature-text">Two Bedrooms</div></li>
                    <li><div class="room-feature-icon">🏊‍♀️</div><div class="room-feature-text">Private Pool</div></li>
                    <li><div class="room-feature-icon">👨‍💼</div><div class="room-feature-text">Concierge</div></li>
                    <li><div class="room-feature-icon">👨‍🍳</div><div class="room-feature-text">Kitchen</div></li>
                    <li><div class="room-feature-icon">🚁</div><div class="room-feature-text">Helipad Access</div></li>
                    <li><div class="room-feature-icon">💎</div><div class="room-feature-text">Luxury Amenities</div></li>
                </ul>
                <div class="room-buttons">
                    <button class="btn btn-primary" onclick="showBookingModal()">Book Now</button>
                    <button class="btn btn-secondary" onclick="showRoomGallery('presidential-suite')">Room Gallery</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection