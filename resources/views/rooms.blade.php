@extends('layouts.app')

@section('title', 'Our Rooms - The Mureed')

@section('content')
<div class="page-header">
    <h1>Our Rooms</h1>
    <p>Discover comfort and elegance in every corner of our beautifully appointed accommodations</p>
</div>

@if(session('booking_success'))
<div style="background: #c6f6d5; border: 1px solid #38a169; color: #276749; padding: 1rem 2rem; margin: 1rem auto; max-width: 900px; border-radius: 10px; text-align: center; font-weight: 600;">
    {{ session('booking_success') }}
</div>
@endif

<div class="content-section">
    <div class="rooms-grid">
        @forelse($rooms as $room)
        <div class="room-card">
            <div class="room-image" style="background: {{ $room->gradient_style ?? 'linear-gradient(45deg, #667eea, #764ba2)' }};">
                {{ $room->icon ?? '🏨' }}
            </div>
            <div class="room-content">
                <div class="room-header">
                    <h3 class="room-title">{{ $room->name }}</h3>
                    <div class="room-price">${{ number_format($room->price_per_night) }}/night</div>
                </div>
                @if($room->description)
                <p style="color: #666; margin-bottom: 1rem; line-height: 1.6;">{{ $room->description }}</p>
                @endif
                @if($room->amenities->count())
                <ul class="room-features">
                    @foreach($room->amenities->take(6) as $amenity)
                    <li>
                        <div class="room-feature-icon">{{ $amenity->icon ?? '✓' }}</div>
                        <div class="room-feature-text">{{ $amenity->name }}</div>
                    </li>
                    @endforeach
                </ul>
                @endif
                <div class="room-buttons">
                    <button class="btn btn-primary" onclick="showBookingModal({{ $room->id }}, '{{ addslashes($room->name) }}')">Book Now</button>
                </div>
            </div>
        </div>
        @empty
        <p style="text-align:center; color:#666; grid-column: 1/-1;">No rooms available at this time.</p>
        @endforelse
    </div>
</div>
@endsection
