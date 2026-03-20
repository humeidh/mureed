@extends('layouts.app')

@section('title', 'Restaurant Menu - The Mureed')
@section('meta_description', 'Savor culinary delights at The Mureed restaurant. Fresh Maldivian cuisine, international dishes, and chef specials crafted with the finest local ingredients.')
@section('og_title', 'Restaurant Menu - The Mureed')
@section('og_description', 'Fresh Maldivian cuisine and international dishes at The Mureed resort restaurant.')

@section('content')
<div class="page-header">
    <h1>Restaurant Menu</h1>
    <p>Savor culinary delights crafted by our world-class chefs using the finest local ingredients</p>
</div>

<div class="content-section">
    <!-- Menu Tabs -->
    <div class="menu-tabs">
        <button class="menu-tab active" onclick="showMenuCategory('breakfast')">Breakfast</button>
        <button class="menu-tab" onclick="showMenuCategory('lunch')">Lunch</button>
        <button class="menu-tab" onclick="showMenuCategory('dinner')">Dinner</button>
    </div>

    <!-- Breakfast Menu -->
    <div id="breakfast" class="menu-content active">
        <div class="menu-items-grid">
            @forelse($breakfast as $item)
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: {{ $item->gradient_style ?? 'linear-gradient(45deg, #fa709a, #fee140)' }};">
                    {{ $item->icon ?? '🍽️' }}
                </div>
                <div class="menu-item-content">
                    <h4>{{ $item->name }}</h4>
                    @if($item->description)<p>{{ $item->description }}</p>@endif
                    <div class="menu-item-price">${{ number_format($item->price) }}</div>
                </div>
            </div>
            @empty
            <p style="color:#666; grid-column:1/-1; text-align:center;">Breakfast menu coming soon.</p>
            @endforelse
        </div>
    </div>

    <!-- Lunch Menu -->
    <div id="lunch" class="menu-content">
        <div class="menu-items-grid">
            @forelse($lunch as $item)
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: {{ $item->gradient_style ?? 'linear-gradient(45deg, #4facfe, #00f2fe)' }};">
                    {{ $item->icon ?? '🍽️' }}
                </div>
                <div class="menu-item-content">
                    <h4>{{ $item->name }}</h4>
                    @if($item->description)<p>{{ $item->description }}</p>@endif
                    <div class="menu-item-price">${{ number_format($item->price) }}</div>
                </div>
            </div>
            @empty
            <p style="color:#666; grid-column:1/-1; text-align:center;">Lunch menu coming soon.</p>
            @endforelse
        </div>
    </div>

    <!-- Dinner Menu -->
    <div id="dinner" class="menu-content">
        <div class="menu-items-grid">
            @forelse($dinner as $item)
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: {{ $item->gradient_style ?? 'linear-gradient(45deg, #667eea, #764ba2)' }};">
                    {{ $item->icon ?? '🍽️' }}
                </div>
                <div class="menu-item-content">
                    <h4>{{ $item->name }}</h4>
                    @if($item->description)<p>{{ $item->description }}</p>@endif
                    <div class="menu-item-price">${{ number_format($item->price) }}</div>
                </div>
            </div>
            @empty
            <p style="color:#666; grid-column:1/-1; text-align:center;">Dinner menu coming soon.</p>
            @endforelse
        </div>
    </div>
</div>

@if($specials->count())
<!-- Chef's Specials -->
<div class="chefs-special-section">
    <div class="content-section">
        <h2 class="section-title">Chef's Special & Seasonal Dishes</h2>
        <div class="special-dishes-grid">
            @foreach($specials as $item)
            <div class="special-dish-card">
                <div class="dish-banner" style="background: {{ $item->gradient_style ?? 'linear-gradient(45deg, #f093fb, #f5576c)' }};">
                    {{ $item->icon ?? '⭐' }}
                </div>
                <div class="special-dish-content">
                    <h4>{{ $item->name }}</h4>
                    @if($item->description)<p>{{ $item->description }}</p>@endif
                    <div class="special-dish-price">${{ number_format($item->price) }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Restaurant CTA -->
<div class="restaurant-cta">
    <div class="cta-content">
        <h3>Reserve Your Table</h3>
        <p>Experience culinary excellence in our beautiful oceanfront restaurant. Book your table now for an unforgettable dining experience.</p>
        <div class="cta-buttons">
            <button class="cta-btn cta-btn-primary" onclick="showReservationModal()">Make Reservation</button>
            <button class="cta-btn cta-btn-secondary" onclick="callRestaurant()">Call to Book: +960 765-4321</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function showMenuCategory(category) {
        $('.menu-content').removeClass('active');
        $('.menu-tab').removeClass('active');
        $('#' + category).addClass('active');
        $('[onclick="showMenuCategory(\'' + category + '\')"]').addClass('active');
    }
</script>
@endpush
