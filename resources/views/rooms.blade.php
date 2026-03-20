@extends('layouts.app')

@section('title', 'Our Rooms - The Mureed')
@section('meta_description', 'Explore luxury rooms and suites at The Mureed resort. From Ocean View Suites to Presidential Suites, discover comfort and elegance in the Maldives.')
@section('og_title', 'Our Rooms - The Mureed')
@section('og_description', 'Explore luxury rooms and suites at The Mureed resort in the Maldives. Ocean views, private pools, and world-class amenities.')

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
                    @if($room->images->count())
                    <button class="btn btn-secondary" onclick="openRoomGallery({{ $room->id }})">View Gallery</button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <p style="text-align:center; color:#666; grid-column: 1/-1;">No rooms available at this time.</p>
        @endforelse
    </div>
</div>
<!-- Room Gallery Modal -->
<div id="roomGalleryModal" class="modal-overlay" style="display:none;" onclick="if(event.target===this)closeRoomGallery()">
    <div class="modal-content" style="max-width: 900px; padding: 0; background: #000; border-radius: 12px; position: relative;">
        <button onclick="closeRoomGallery()" style="position:absolute;top:10px;right:15px;background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;z-index:10;" aria-label="Close gallery">&times;</button>
        <h3 id="roomGalleryTitle" style="color:#fff;padding:1.5rem 1.5rem 0.5rem;margin:0;font-size:1.2rem;"></h3>
        <div id="roomGalleryImages" style="display:flex;flex-wrap:wrap;gap:4px;padding:0.5rem 1.5rem 1.5rem;justify-content:center;">
        </div>
    </div>
</div>

<script>
const roomGalleryData = {};
@foreach($rooms as $room)
@if($room->images->count())
roomGalleryData[{{ $room->id }}] = {
    name: @json($room->name),
    images: @json($room->images->map(fn($img) => asset('storage/' . $img->image_path)))
};
@endif
@endforeach

function openRoomGallery(roomId) {
    const data = roomGalleryData[roomId];
    if (!data) return;
    document.getElementById('roomGalleryTitle').textContent = data.name + ' Gallery';
    const container = document.getElementById('roomGalleryImages');
    container.innerHTML = data.images.map(src =>
        '<img src="' + src + '" alt="' + data.name + '" loading="lazy" style="max-height:400px;width:auto;object-fit:contain;border-radius:6px;flex:1 1 auto;min-width:200px;">'
    ).join('');
    document.getElementById('roomGalleryModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeRoomGallery() {
    document.getElementById('roomGalleryModal').style.display = 'none';
    document.body.style.overflow = '';
}
</script>
@endsection
