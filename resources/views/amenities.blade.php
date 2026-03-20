@extends('layouts.app')

@section('title', 'Premium Amenities - The Mureed')
@section('meta_description', 'Discover premium amenities at The Mureed resort. Infinity pool, luxury spa, water sports, fitness center, and more on Fulidhoo Island, Maldives.')

@section('content')
<div class="page-header">
    <h1>Premium Amenities</h1>
    <p>Unwind with our luxury facilities designed for your ultimate relaxation and enjoyment</p>
</div>

<div class="content-section">
    <div class="amenities-grid">
        @forelse($amenities as $amenity)
        <div class="amenity-card">
            <div class="amenity-icon">{{ $amenity->icon ?? '✨' }}</div>
            <h3>{{ $amenity->name }}</h3>
            @if($amenity->description)
            <p>{{ $amenity->description }}</p>
            @endif
        </div>
        @empty
        <p style="text-align:center; color:#666; grid-column: 1/-1;">Amenities information coming soon.</p>
        @endforelse
    </div>
</div>
@endsection
