@extends('layouts.app')

@section('title', 'Gallery - The Mureed')
@section('meta_description', 'Explore the beauty and elegance of The Mureed resort through our stunning photography collection. Rooms, beaches, dining, and island life in the Maldives.')
@section('og_title', 'Gallery - The Mureed')
@section('og_description', 'Stunning photography from The Mureed resort in the Maldives.')

@section('content')
<div class="page-header">
    <h1>Gallery</h1>
    <p>Explore the beauty and elegance of The Mureed through our stunning photography collection</p>
</div>

<div class="content-section">
    @if($categories->count())
        @foreach($categories as $category)
        <div style="margin-bottom: 3rem;">
            <h2 style="color: #1a365d; margin-bottom: 1.5rem; font-size: 1.5rem;">{{ $category->name }}</h2>
            <div class="gallery-grid">
                @forelse($category->images as $image)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->alt_text ?? $image->caption ?? $category->name }}" loading="lazy">
                    <div class="gallery-overlay">
                        @if($image->caption)<h3>{{ $image->caption }}</h3>@endif
                        @if($image->alt_text)<p>{{ $image->alt_text }}</p>@endif
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        @endforeach
    @else
    {{-- Fallback placeholder gallery until images are uploaded --}}
    <div class="gallery-grid">
        <div class="gallery-item"><div class="gallery-overlay"><h3>Ocean View Suites</h3><p>Luxurious accommodations with panoramic views</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Infinity Pool</h3><p>Stunning pool overlooking the Indian Ocean</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Fine Dining</h3><p>Exquisite culinary experiences by the beach</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Spa Sanctuary</h3><p>Tranquil treatments in paradise</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Water Adventures</h3><p>Snorkeling in crystal-clear waters</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Sunset Views</h3><p>Breathtaking sunsets from your villa</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Beach Villas</h3><p>Private beachfront accommodation</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Tropical Gardens</h3><p>Lush landscaping throughout the resort</p></div></div>
        <div class="gallery-item"><div class="gallery-overlay"><h3>Water Sports</h3><p>Kayaking in the lagoon</p></div></div>
    </div>
    @endif
</div>
@endsection
