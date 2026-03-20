@extends('layouts.app')

@section('title', 'About Us - The Mureed')
@section('meta_description', 'Discover the story of The Mureed resort on Fulidhoo Island, Maldives. Learn about our philosophy, mission, team, and commitment to sustainable luxury tourism.')
@section('og_title', 'About Us - The Mureed')
@section('og_description', 'Discover the story, philosophy, and team behind The Mureed resort in the Maldives.')

@section('content')
<div class="page-header">
    <h1>About The Mureed</h1>
    <p>Discover our story, philosophy, and the beautiful destination that makes us unique</p>
</div>

<div class="content-section">
    <!-- Story (from about_sections with key='story') -->
    @if(isset($sections['story']))
    <div class="about-section">
        <h2 class="section-title">{{ $sections['story']->title }}</h2>
        <div class="about-content">
            <div class="about-text">
                {!! $sections['story']->content !!}
            </div>
            <div class="about-image">🏝️</div>
        </div>
    </div>
    @else
    <div class="about-section">
        <h2 class="section-title">The Story of The Mureed</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>From Dream to Paradise</h3>
                <p>The Mureed's journey began in 2015 when Ahmed Mureed, a passionate local entrepreneur and marine biologist, returned to his ancestral home of Fulidhoo Island after years of working in luxury resorts across the Maldives.</p>
                <p>What started as a small family-run guesthouse with just three rooms has blossomed into an award-winning boutique resort, welcoming guests from over 50 countries.</p>
            </div>
            <div class="about-image">🏝️</div>
        </div>
    </div>
    @endif

    <!-- Philosophy -->
    <div class="philosophy-section">
        <div class="philosophy-content">
            <h3>Our Philosophy of Hospitality</h3>
            <p>{{ $philosophy ?? '"At The Mureed, we believe that true hospitality comes from the heart. It\'s not just about providing a service, but about creating genuine connections, sharing our culture, and making every guest feel like family."' }}</p>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="mission-vision">
        <div class="mission-card">
            <h3>Our Mission</h3>
            <p>{{ $mission ?? 'To create transformative travel experiences that celebrate authentic Maldivian culture while pioneering sustainable tourism practices.' }}</p>
            <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 2px solid #e2e8f0;">
                <h4 style="color: #3182ce; margin-bottom: 1rem;">Core Values</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.25rem 0;">🌊 Environmental Stewardship</li>
                    <li style="padding: 0.25rem 0;">🤝 Community Empowerment</li>
                    <li style="padding: 0.25rem 0;">❤️ Authentic Hospitality</li>
                    <li style="padding: 0.25rem 0;">🌟 Cultural Preservation</li>
                </ul>
            </div>
        </div>
        <div class="vision-card">
            <h3>Our Vision</h3>
            <p>{{ $vision ?? 'To be the most loved boutique resort in the Maldives, celebrated for our genuine warmth, sustainable practices, and the transformative experiences we create.' }}</p>
            <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 2px solid #e2e8f0;">
                <h4 style="color: #38a169; margin-bottom: 1rem;">Our Impact</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.25rem 0;">🏪 100% Local Staff Employment</li>
                    <li style="padding: 0.25rem 0;">♻️ Zero Single-Use Plastics</li>
                    <li style="padding: 0.25rem 0;">🐠 Marine Conservation Projects</li>
                    <li style="padding: 0.25rem 0;">🌱 Organic Garden Initiative</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Attractions -->
    @if($attractions->count())
    <div class="local-info">
        <h3>Fulidhoo Island & Vaavu Atoll</h3>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Nestled in the heart of Vaavu Atoll, Fulidhoo Island is a hidden gem offering authentic Maldivian experiences just 40 minutes by speedboat from Malé International Airport.</p>
        <div class="attractions-grid">
            @foreach($attractions as $attraction)
            <div class="attraction-card">
                <div class="attraction-image" style="background: {{ $attraction->gradient_style ?? 'linear-gradient(45deg, #4facfe, #00f2fe)' }};">
                    {{ $attraction->icon ?? '🌊' }}
                </div>
                <div class="attraction-content">
                    <h4>{{ $attraction->name }}</h4>
                    @if($attraction->description)<p>{{ $attraction->description }}</p>@endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Team -->
    @if($team->count())
    <div class="team-section">
        <h3 style="color: #1a365d; text-align: center; margin-bottom: 3rem; font-size: 2rem;">Meet Our Team</h3>
        <div class="team-grid">
            @foreach($team as $member)
            <div class="team-member">
                @if($member->photo_path)
                <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="team-photo" style="object-fit: cover;" loading="lazy">
                @else
                <div class="team-photo" style="background: {{ $member->gradient_style ?? 'linear-gradient(45deg, #667eea, #764ba2)' }}; display:flex; align-items:center; justify-content:center; font-size: 2rem;">👤</div>
                @endif
                <h4>{{ $member->name }}</h4>
                <p class="team-role">{{ $member->position }}</p>
                @if($member->bio)<p>{{ $member->bio }}</p>@endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
