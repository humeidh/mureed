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
<div id="roomGalleryModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:1000;align-items:center;justify-content:center;" onclick="if(event.target===this)closeRoomGallery()">
    <div style="position:relative;width:90%;max-width:900px;">
        <button onclick="closeRoomGallery()" style="position:absolute;top:-40px;right:0;background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;z-index:10;" aria-label="Close gallery">&times;</button>
        <h3 id="roomGalleryTitle" style="color:#fff;text-align:center;margin:0 0 1rem;font-size:1.2rem;font-weight:500;"></h3>
        <div style="position:relative;overflow:hidden;border-radius:10px;">
            <img id="roomGallerySlide" src="" alt="" style="width:100%;max-height:70vh;object-fit:contain;display:block;background:#111;border-radius:10px;">
            <button id="roomGalleryPrev" onclick="slideRoomGallery(-1)" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.6);border:none;color:#fff;font-size:2rem;width:48px;height:48px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background 0.2s;" aria-label="Previous image">&#8249;</button>
            <button id="roomGalleryNext" onclick="slideRoomGallery(1)" style="position:absolute;right:10px;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.6);border:none;color:#fff;font-size:2rem;width:48px;height:48px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background 0.2s;" aria-label="Next image">&#8250;</button>
        </div>
        <div style="text-align:center;margin-top:1rem;">
            <span id="roomGalleryCounter" style="color:rgba(255,255,255,0.7);font-size:0.9rem;"></span>
        </div>
        <div id="roomGalleryThumbs" style="display:flex;gap:8px;justify-content:center;margin-top:0.75rem;overflow-x:auto;padding:4px 0;"></div>
    </div>
</div>

<script>
const roomGalleryData = {};
let currentSlide = 0;
let currentGalleryImages = [];

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
    currentGalleryImages = data.images;
    currentSlide = 0;
    document.getElementById('roomGalleryTitle').textContent = data.name + ' Gallery';
    renderThumbnails(data.name);
    showSlide(0, data.name);
    document.getElementById('roomGalleryModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function showSlide(index, altText) {
    if (currentGalleryImages.length === 0) return;
    currentSlide = (index + currentGalleryImages.length) % currentGalleryImages.length;
    const img = document.getElementById('roomGallerySlide');
    img.src = currentGalleryImages[currentSlide];
    img.alt = altText || '';
    document.getElementById('roomGalleryCounter').textContent = (currentSlide + 1) + ' / ' + currentGalleryImages.length;
    document.querySelectorAll('.room-gallery-thumb').forEach((t, i) => {
        t.style.opacity = i === currentSlide ? '1' : '0.5';
        t.style.borderColor = i === currentSlide ? '#fff' : 'transparent';
    });
}

function slideRoomGallery(dir) {
    showSlide(currentSlide + dir);
}

function renderThumbnails(altText) {
    const container = document.getElementById('roomGalleryThumbs');
    if (currentGalleryImages.length <= 1) { container.innerHTML = ''; return; }
    container.innerHTML = currentGalleryImages.map((src, i) =>
        '<img class="room-gallery-thumb" src="' + src + '" alt="' + (altText || '') + '" onclick="showSlide(' + i + ')" style="width:60px;height:44px;object-fit:cover;border-radius:6px;cursor:pointer;border:2px solid transparent;transition:opacity 0.2s,border-color 0.2s;opacity:' + (i === 0 ? '1' : '0.5') + ';">'
    ).join('');
}

function closeRoomGallery() {
    document.getElementById('roomGalleryModal').style.display = 'none';
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (document.getElementById('roomGalleryModal').style.display !== 'flex') return;
    if (e.key === 'ArrowLeft') slideRoomGallery(-1);
    else if (e.key === 'ArrowRight') slideRoomGallery(1);
    else if (e.key === 'Escape') closeRoomGallery();
});
</script>
@endsection
