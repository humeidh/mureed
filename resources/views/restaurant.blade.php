@extends('layouts.app')

@section('title', 'Restaurant Menu - The Mureed')

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
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #fa709a, #fee140);">🍓</div>
                <div class="menu-item-content">
                    <h4>Tropical Fruit Bowl</h4>
                    <p>Fresh seasonal fruits including mango, papaya, pineapple, and dragon fruit served with coconut yogurt and local honey</p>
                    <div class="menu-item-price">$18</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #667eea, #764ba2);">🍛</div>
                <div class="menu-item-content">
                    <h4>Maldivian Fish Curry</h4>
                    <p>Traditional breakfast curry with fresh tuna, coconut milk, and local spices served with flatbread and rice</p>
                    <div class="menu-item-price">$24</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🥞</div>
                <div class="menu-item-content">
                    <h4>Coconut Pancakes</h4>
                    <p>Fluffy pancakes made with fresh coconut milk, served with tropical fruit compote and palm sugar syrup</p>
                    <div class="menu-item-price">$16</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">🥣</div>
                <div class="menu-item-content">
                    <h4>Sunrise Smoothie Bowl</h4>
                    <p>Acai and mango smoothie bowl topped with granola, fresh berries, and toasted coconut flakes</p>
                    <div class="menu-item-price">$14</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🍳</div>
                <div class="menu-item-content">
                    <h4>Continental Breakfast</h4>
                    <p>Selection of pastries, cereals, fresh fruit, yogurt, and choice of eggs prepared to your liking</p>
                    <div class="menu-item-price">$22</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #a8edea, #fed6e3);">🍞</div>
                <div class="menu-item-content">
                    <h4>Island Benedict</h4>
                    <p>Poached eggs on toasted coconut bread with smoked fish, hollandaise sauce, and fresh herbs</p>
                    <div class="menu-item-price">$26</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lunch Menu -->
    <div id="lunch" class="menu-content">
        <div class="menu-items-grid">
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #667eea, #764ba2);">🥪</div>
                <div class="menu-item-content">
                    <h4>Grilled Fish Sandwich</h4>
                    <p>Fresh catch of the day with lettuce, tomato, and mango chutney on artisan bread, served with sweet potato fries</p>
                    <div class="menu-item-price">$28</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">🥗</div>
                <div class="menu-item-content">
                    <h4>Coconut Chicken Salad</h4>
                    <p>Grilled coconut-crusted chicken breast over mixed greens with tropical fruits and lime vinaigrette</p>
                    <div class="menu-item-price">$26</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🍝</div>
                <div class="menu-item-content">
                    <h4>Seafood Pasta</h4>
                    <p>Fresh linguine with lobster, prawns, and scallops in a light coconut cream sauce with herbs</p>
                    <div class="menu-item-price">$34</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🍣</div>
                <div class="menu-item-content">
                    <h4>Island Poke Bowl</h4>
                    <p>Sushi-grade tuna poke with jasmine rice, avocado, cucumber, and wasabi mayo</p>
                    <div class="menu-item-price">$32</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #fa709a, #fee140);">🌱</div>
                <div class="menu-item-content">
                    <h4>Vegetarian Buddha Bowl</h4>
                    <p>Quinoa, roasted vegetables, chickpeas, and tahini dressing with fresh herbs and seeds</p>
                    <div class="menu-item-price">$24</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #a8edea, #fed6e3);">🍛</div>
                <div class="menu-item-content">
                    <h4>Maldivian Fish Curry</h4>
                    <p>Traditional curry with fresh tuna, coconut milk, curry leaves, and jasmine rice</p>
                    <div class="menu-item-price">$30</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dinner Menu -->
    <div id="dinner" class="menu-content">
        <div class="menu-items-grid">
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🦞</div>
                <div class="menu-item-content">
                    <h4>Grilled Lobster Thermidor</h4>
                    <p>Half lobster grilled to perfection with herb butter, cognac cream sauce, and seasonal vegetables</p>
                    <div class="menu-item-price">$65</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #667eea, #764ba2);">🥩</div>
                <div class="menu-item-content">
                    <h4>Wagyu Beef Tenderloin</h4>
                    <p>Premium beef tenderloin with truffle mashed potatoes, grilled asparagus, and red wine reduction</p>
                    <div class="menu-item-price">$78</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🐟</div>
                <div class="menu-item-content">
                    <h4>Whole Grilled Fish</h4>
                    <p>Daily catch prepared Maldivian style with coconut rice, curry sauce, and pickled vegetables</p>
                    <div class="menu-item-price">$48</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">🍤</div>
                <div class="menu-item-content">
                    <h4>Seafood Platter for Two</h4>
                    <p>Grilled lobster, prawns, fish, and scallops with three signature sauces and sides</p>
                    <div class="menu-item-price">$120</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #fa709a, #fee140);">🦆</div>
                <div class="menu-item-content">
                    <h4>Duck Breast à l'Orange</h4>
                    <p>Pan-seared duck breast with orange glaze, wild rice pilaf, and roasted root vegetables</p>
                    <div class="menu-item-price">$42</div>
                </div>
            </div>
            <div class="menu-item-card">
                <div class="menu-item-image" style="background: linear-gradient(45deg, #a8edea, #fed6e3);">🌿</div>
                <div class="menu-item-content">
                    <h4>Vegetarian Tasting Menu</h4>
                    <p>Five-course plant-based menu featuring seasonal vegetables and innovative preparations</p>
                    <div class="menu-item-price">$55</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chef's Special & Seasonal Dishes -->
<div class="chefs-special-section">
    <div class="content-section">
        <h2 class="section-title">Chef's Special & Seasonal Dishes</h2>
        <div class="special-dishes-grid">
            <div class="special-dish-card">
                <div class="dish-banner" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🦞</div>
                <div class="special-dish-content">
                    <h4>Chef Hassan's Signature Lobster</h4>
                    <p>Our executive chef's masterpiece featuring locally caught lobster prepared with traditional Maldivian spices, coconut cream, and curry leaves. A perfect fusion of local flavors and fine dining techniques.</p>
                    <div class="special-dish-price">$85</div>
                </div>
            </div>
            <div class="special-dish-card">
                <div class="dish-banner" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🐟</div>
                <div class="special-dish-content">
                    <h4>Seasonal Maldivian Tuna Sashimi</h4>
                    <p>Ultra-fresh yellowfin tuna caught daily by local fishermen, served sashimi-style with wasabi, pickled ginger, and our special ponzu sauce infused with local lime.</p>
                    <div class="special-dish-price">$38</div>
                </div>
            </div>
            <div class="special-dish-card">
                <div class="dish-banner" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">🥭</div>
                <div class="special-dish-content">
                    <h4>Tropical Mango Tart (Seasonal)</h4>
                    <p>Available only during mango season, this exquisite dessert features locally grown mangoes in a delicate pastry shell with coconut cream and lime zest. A true taste of paradise.</p>
                    <div class="special-dish-price">$18</div>
                </div>
            </div>
            <div class="special-dish-card">
                <div class="dish-banner" style="background: linear-gradient(45deg, #fa709a, #fee140);">🍛</div>
                <div class="special-dish-content">
                    <h4>Traditional Garudhiya</h4>
                    <p>Authentic Maldivian fish soup made with tuna, curry leaves, and traditional spices. Served with rice, lime, chili, and onions. A cultural experience in every spoonful.</p>
                    <div class="special-dish-price">$28</div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<!-- Photo Gallery Section -->
<div class="photo-gallery-section">
    <div class="content-section">
        <h2 class="section-title">Restaurant Photo Gallery</h2>
        <div class="gallery-categories">
            <div class="gallery-category-card" onclick="openGalleryModal('dining')">
                <div class="gallery-category-image" style="background: linear-gradient(45deg, #667eea, #764ba2);">🍽️</div>
                <div class="gallery-category-content">
                    <h4>Dining Area</h4>
                    <p>Explore our elegant dining spaces with stunning ocean views</p>
                </div>
            </div>
            <div class="gallery-category-card" onclick="openGalleryModal('dishes')">
                <div class="gallery-category-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🍲</div>
                <div class="gallery-category-content">
                    <h4>Signature Dishes</h4>
                    <p>Discover our chef's culinary masterpieces and artistic presentations</p>
                </div>
            </div>
            <div class="gallery-category-card" onclick="openGalleryModal('ambience')">
                <div class="gallery-category-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🌅</div>
                <div class="gallery-category-content">
                    <h4>Ambience</h4>
                    <p>Experience the romantic atmosphere and breathtaking sunset views</p>
                </div>
            </div>
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