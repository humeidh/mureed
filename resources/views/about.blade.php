@extends('layouts.app')

@section('title', 'About Us - The Mureed')

@section('content')
<div class="page-header">
    <h1>About The Mureed</h1>
    <p>Discover our story, philosophy, and the beautiful destination that makes us unique</p>
</div>

<div class="content-section">
    <!-- Story -->
    <div class="about-section">
        <h2 class="section-title">The Story of The Mureed</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>From Dream to Paradise</h3>
                <p>The Mureed's journey began in 2015 when Ahmed Mureed, a passionate local entrepreneur and marine biologist, returned to his ancestral home of Fulidhoo Island after years of working in luxury resorts across the Maldives.</p>
                <p>What started as a small family-run guesthouse with just three rooms has blossomed into an award-winning boutique resort. Ahmed's vision was simple yet profound: to share the authentic Maldivian experience while preserving the pristine environment and supporting the local community that raised him.</p>
                <p>In 2018, The Mureed opened its doors to the world, and since then, we have welcomed guests from over 50 countries, each leaving with unforgettable memories and a deep appreciation for Maldivian culture and natural beauty.</p>
            </div>
            <div class="about-image">🏝️</div>
        </div>
    </div>

    <!-- Philosophy -->
    <div class="philosophy-section">
        <div class="philosophy-content">
            <h3>Our Philosophy of Hospitality</h3>
            <p>"At The Mureed, we believe that true hospitality comes from the heart. It's not just about providing a service, but about creating genuine connections, sharing our culture, and making every guest feel like family. We practice 'Meedhu Raajje' - the spirit of generosity that defines Maldivian hospitality."</p>
            <p style="margin-top: 2rem; font-style: italic; opacity: 0.9;">- Ahmed Mureed, Founder</p>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="mission-vision">
        <div class="mission-card">
            <h3>Our Mission</h3>
            <p><strong>To create transformative travel experiences</strong> that celebrate authentic Maldivian culture while pioneering sustainable tourism practices. We are committed to preserving our pristine environment, empowering our local community, and providing guests with genuine connections to our island paradise.</p>
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
            <p><strong>To be the leading sustainable luxury resort</strong> in the Maldives, setting the gold standard for responsible tourism while showcasing the unparalleled beauty and culture of Vaavu Atoll.</p>
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

    <!-- Location & Attractions -->
    <div class="local-info">
        <h3>Fulidhoo Island & Vaavu Atoll</h3>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Nestled in the heart of Vaavu Atoll, Fulidhoo Island is a hidden gem offering authentic Maldivian experiences just 40 minutes by speedboat from Malé International Airport.</p>
        <div class="attractions-grid">
            <div class="attraction-card">
                <div class="attraction-image" style="background: linear-gradient(45deg, #4facfe, #00f2fe);">🐠</div>
                <div class="attraction-content">
                    <h4>Fotteyo Kandu</h4>
                    <p>One of the Maldives' premier diving sites, just 15 minutes away. Famous for manta ray encounters, grey reef sharks, and vibrant coral formations.</p>
                </div>
            </div>
            <div class="attraction-card">
                <div class="attraction-image" style="background: linear-gradient(45deg, #43e97b, #38f9d7);">🏄‍♂️</div>
                <div class="attraction-content">
                    <h4>Muli Channel</h4>
                    <p>World-class surfing spot with consistent breaks perfect for intermediate surfers. Experience the thrill of riding waves in crystal-clear tropical waters.</p>
                </div>
            </div>
            <div class="attraction-card">
                <div class="attraction-image" style="background: linear-gradient(45deg, #fa709a, #fee140);">🏖️</div>
                <div class="attraction-content">
                    <h4>Sandbank Excursions</h4>
                    <p>Private sandbank picnics on uninhabited islands. Enjoy pristine white sand beaches, snorkeling in lagoons, and sunset dolphin watching.</p>
                </div>
            </div>
            <div class="attraction-card">
                <div class="attraction-image" style="background: linear-gradient(45deg, #a8edea, #fed6e3);">🐢</div>
                <div class="attraction-content">
                    <h4>Turtle Conservation</h4>
                    <p>Visit our local turtle rehabilitation center and participate in conservation activities. Witness nesting seasons and learn about marine protection efforts.</p>
                </div>
            </div>
            <div class="attraction-card">
                <div class="attraction-image" style="background: linear-gradient(45deg, #667eea, #764ba2);">🎣</div>
                <div class="attraction-content">
                    <h4>Traditional Fishing</h4>
                    <p>Join local fishermen on traditional dhoni boats for sunset fishing trips. Learn ancient techniques and enjoy your catch prepared by our chefs.</p>
                </div>
            </div>
            <div class="attraction-card">
                <div class="attraction-image" style="background: linear-gradient(45deg, #f093fb, #f5576c);">🌺</div>
                <div class="attraction-content">
                    <h4>Cultural Village Tour</h4>
                    <p>Explore Fulidhoo village, meet local artisans, visit the mosque, and experience traditional Maldivian crafts, music, and cuisine.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <h3 style="color: #1a365d; text-align: center; margin-bottom: 3rem; font-size: 2rem;">Meet Our Team</h3>

        <div class="founder-message">
            <div class="founder-image">👨‍💼</div>
            <div class="founder-content">
                <h3>Ahmed Mureed</h3>
                <p class="founder-title">Founder & Managing Director</p>
                <p style="color: #666; line-height: 1.7; font-style: italic;">"Welcome to The Mureed, where every sunrise brings new possibilities for connection, discovery, and wonder. Our team and I are dedicated to sharing the magic of Fulidhoo Island with you, creating memories that will last a lifetime while preserving this paradise for future generations."</p>
            </div>
        </div>

        <h4 style="color: #1a365d; text-align: center; margin-bottom: 2rem; font-size: 1.5rem;">Our Dedicated Team</h4>
        <div class="team-grid">
            <div class="team-member">
                <div class="team-photo">👩‍💼</div>
                <h4>Aisha Ibrahim</h4>
                <p class="team-role">Resort Manager</p>
                <p>With 12 years in hospitality, Aisha ensures every guest experience exceeds expectations. Her attention to detail and genuine care make every stay memorable.</p>
            </div>
            <div class="team-member">
                <div class="team-photo">👨‍🍳</div>
                <h4>Hassan Ali</h4>
                <p class="team-role">Executive Chef</p>
                <p>A master of both Maldivian and international cuisine, Hassan creates culinary magic using fresh local ingredients and traditional recipes passed down through generations.</p>
            </div>
            <div class="team-member">
                <div class="team-photo">👨‍⚕️</div>
                <h4>Dr. Mohamed Waheed</h4>
                <p class="team-role">Marine Biologist & Dive Instructor</p>
                <p>Our resident marine expert leads diving expeditions and conservation efforts, sharing his deep knowledge of Vaavu Atoll's incredible underwater ecosystem.</p>
            </div>
            <div class="team-member">
                <div class="team-photo">👩‍🎨</div>
                <h4>Mariyam Naseer</h4>
                <p class="team-role">Guest Experience Manager</p>
                <p>Mariyam curates personalized experiences for each guest, from cultural tours to romantic dining setups, ensuring every moment is perfectly tailored to your desires.</p>
            </div>
            <div class="team-member">
                <div class="team-photo">👨‍🔧</div>
                <h4>Ibrahim Shareef</h4>
                <p class="team-role">Facilities & Sustainability Manager</p>
                <p>Ibrahim maintains our resort's eco-friendly operations and leads our sustainability initiatives, ensuring we protect the environment we call home.</p>
            </div>
            <div class="team-member">
                <div class="team-photo">👩‍💆</div>
                <h4>Fathimath Zulaikha</h4>
                <p class="team-role">Spa & Wellness Director</p>
                <p>A certified therapist trained in traditional Maldivian healing practices, Fathimath creates rejuvenating wellness experiences using natural island remedies.</p>
            </div>
        </div>
    </div>
</div>
@endsection