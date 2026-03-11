<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Attraction;
use App\Models\FooterSetting;
use App\Models\MenuItem;
use App\Models\Room;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin users
        User::updateOrCreate(['email' => 'admin@themureed.com'], [
            'name'     => 'Super Admin',
            'password' => Hash::make('password'),
            'role'     => 'super_admin',
        ]);

        User::updateOrCreate(['email' => 'content@themureed.com'], [
            'name'     => 'Content Manager',
            'password' => Hash::make('password'),
            'role'     => 'content_manager',
        ]);

        // Rooms
        $rooms = [
            ['name' => 'Ocean View Suite',    'price_per_night' => 299, 'icon' => '🌊', 'gradient_style' => 'linear-gradient(45deg, #667eea, #764ba2)', 'sort_order' => 1,
             'description' => 'Wake up to breathtaking ocean panoramas in our luxurious Ocean View Suite. Featuring floor-to-ceiling windows, a private balcony, and premium amenities.'],
            ['name' => 'Beach Villa',          'price_per_night' => 499, 'icon' => '🏖️', 'gradient_style' => 'linear-gradient(45deg, #f093fb, #f5576c)', 'sort_order' => 2,
             'description' => 'Your own private slice of paradise. Step directly from your villa onto pristine white sand beach with direct lagoon access.'],
            ['name' => 'Garden Room',          'price_per_night' => 199, 'icon' => '🌿', 'gradient_style' => 'linear-gradient(45deg, #43e97b, #38f9d7)', 'sort_order' => 3,
             'description' => 'Nestled among lush tropical gardens, our Garden Rooms offer a peaceful retreat with beautiful natural surroundings.'],
            ['name' => 'Presidential Suite',  'price_per_night' => 799, 'icon' => '👑', 'gradient_style' => 'linear-gradient(45deg, #fa709a, #fee140)', 'sort_order' => 4,
             'description' => 'The ultimate luxury experience. Our Presidential Suite spans two floors with panoramic ocean views, private pool, butler service, and world-class amenities.'],
        ];
        foreach ($rooms as $room) {
            Room::updateOrCreate(['name' => $room['name']], $room);
        }

        // Amenities (global)
        $globalAmenities = [
            ['name' => 'Infinity Pool',       'icon' => '🏊',  'type' => 'global', 'sort_order' => 1, 'description' => 'Stunning infinity pool overlooking the Indian Ocean.'],
            ['name' => 'Luxury Spa',          'icon' => '💆',  'type' => 'global', 'sort_order' => 2, 'description' => 'Full-service spa with traditional Maldivian treatments.'],
            ['name' => 'Water Sports',        'icon' => '🤿',  'type' => 'global', 'sort_order' => 3, 'description' => 'Diving, snorkeling, kayaking, and windsurfing.'],
            ['name' => 'Fitness Center',      'icon' => '💪',  'type' => 'global', 'sort_order' => 4, 'description' => 'Fully-equipped gym open 24/7.'],
            ['name' => 'Beach Bar',           'icon' => '🍹',  'type' => 'global', 'sort_order' => 5, 'description' => 'Sunset cocktails on the beach.'],
            ['name' => 'Yoga Pavilion',       'icon' => '🧘',  'type' => 'global', 'sort_order' => 6, 'description' => 'Daily yoga and meditation sessions over the lagoon.'],
            ['name' => 'Kids Club',           'icon' => '🎪',  'type' => 'global', 'sort_order' => 7, 'description' => 'Supervised activities for children aged 4-12.'],
            ['name' => 'Sunset Cruises',      'icon' => '⛵',  'type' => 'global', 'sort_order' => 8, 'description' => 'Private and group dhoni cruises at sunset.'],
            ['name' => '24/7 Concierge',     'icon' => '🛎️', 'type' => 'global', 'sort_order' => 9, 'description' => 'Round-the-clock personal concierge service.'],
        ];
        foreach ($globalAmenities as $a) {
            Amenity::updateOrCreate(['name' => $a['name']], $a + ['is_active' => true]);
        }

        // Room amenities
        $roomAmenities = [
            ['name' => 'Ocean View',         'icon' => '🌊', 'type' => 'room', 'sort_order' => 1],
            ['name' => 'Private Balcony',    'icon' => '🌅', 'type' => 'room', 'sort_order' => 2],
            ['name' => 'King Bed',           'icon' => '🛏️', 'type' => 'room', 'sort_order' => 3],
            ['name' => 'Free WiFi',          'icon' => '📶', 'type' => 'room', 'sort_order' => 4],
            ['name' => 'Mini Bar',           'icon' => '🍾', 'type' => 'room', 'sort_order' => 5],
            ['name' => 'Air Conditioning',   'icon' => '❄️', 'type' => 'room', 'sort_order' => 6],
            ['name' => 'Private Pool',       'icon' => '🏊', 'type' => 'room', 'sort_order' => 7],
            ['name' => 'Beach Access',       'icon' => '🏖️', 'type' => 'room', 'sort_order' => 8],
            ['name' => 'Butler Service',     'icon' => '🤵', 'type' => 'room', 'sort_order' => 9],
            ['name' => 'Garden View',        'icon' => '🌿', 'type' => 'room', 'sort_order' => 10],
        ];
        foreach ($roomAmenities as $a) {
            Amenity::updateOrCreate(['name' => $a['name']], $a + ['is_active' => true]);
        }

        // Menu items
        $menuItems = [
            ['name' => 'Maldivian Mashuni',    'category' => 'breakfast', 'price' => 18, 'icon' => '🥗', 'gradient_style' => 'linear-gradient(45deg, #f093fb, #f5576c)', 'is_special' => false, 'description' => 'Traditional tuna and coconut salad.'],
            ['name' => 'Tropical Fruit Platter','category' => 'breakfast', 'price' => 22, 'icon' => '🍍', 'gradient_style' => 'linear-gradient(45deg, #43e97b, #38f9d7)', 'is_special' => false, 'description' => 'Seasonal tropical fruits from local farms.'],
            ['name' => 'Eggs Benedict',         'category' => 'breakfast', 'price' => 28, 'icon' => '🍳', 'gradient_style' => 'linear-gradient(45deg, #fa709a, #fee140)', 'is_special' => false, 'description' => 'Classic Eggs Benedict with smoked salmon.'],
            ['name' => 'Grilled Mahi-Mahi',     'category' => 'lunch',     'price' => 45, 'icon' => '🐟', 'gradient_style' => 'linear-gradient(45deg, #4facfe, #00f2fe)', 'is_special' => false, 'description' => 'Fresh catch of the day with mango salsa.'],
            ['name' => 'Coconut Curry',         'category' => 'lunch',     'price' => 35, 'icon' => '🍛', 'gradient_style' => 'linear-gradient(45deg, #f093fb, #f5576c)', 'is_special' => false, 'description' => 'Aromatic Maldivian coconut curry.'],
            ['name' => 'Lobster Thermidor',     'category' => 'dinner',    'price' => 95, 'icon' => '🦞', 'gradient_style' => 'linear-gradient(45deg, #fa709a, #fee140)', 'is_special' => true,  'description' => "Chef Hassan's signature lobster with butter sauce."],
            ['name' => 'Seared Tuna Steak',     'category' => 'dinner',    'price' => 68, 'icon' => '🐡', 'gradient_style' => 'linear-gradient(45deg, #43e97b, #38f9d7)', 'is_special' => false, 'description' => 'Line-caught yellowfin tuna with wasabi mash.'],
            ['name' => 'Sunset Grill Platter',  'category' => 'dinner',    'price' => 85, 'icon' => '🍖', 'gradient_style' => 'linear-gradient(45deg, #667eea, #764ba2)', 'is_special' => true,  'description' => 'Mixed grill platter served on the beach.'],
        ];
        $i = 1;
        foreach ($menuItems as $item) {
            MenuItem::updateOrCreate(['name' => $item['name']], $item + ['is_active' => true, 'sort_order' => $i++]);
        }

        // Testimonials
        $testimonials = [
            ['guest_name' => 'John Doe',             'guest_title' => 'Travel Blogger',    'avatar_gradient' => 'linear-gradient(45deg, #667eea, #764ba2)', 'rating' => 5, 'is_published' => true, 'sort_order' => 1,
             'content' => '"The Mureed was a hidden gem! The hospitality and attention to detail made our stay unforgettable. The staff went above and beyond to ensure our comfort."'],
            ['guest_name' => 'Sarah & Michael Johnson','guest_title' => 'Honeymooners',    'avatar_gradient' => 'linear-gradient(45deg, #f093fb, #f5576c)', 'rating' => 5, 'is_published' => true, 'sort_order' => 2,
             'content' => '"Absolutely stunning location with pristine beaches and crystal-clear waters. The Ocean View Suite exceeded all our expectations. Perfect for our honeymoon!"'],
            ['guest_name' => 'David Chen',            'guest_title' => 'Marine Photographer','avatar_gradient' => 'linear-gradient(45deg, #4facfe, #00f2fe)', 'rating' => 5, 'is_published' => true, 'sort_order' => 3,
             'content' => '"The diving experiences at Fotteyo Kandu were incredible! The knowledge of marine life made every dive an educational adventure. Truly a diver\'s paradise."'],
            ['guest_name' => 'Isabella Rodriguez',    'guest_title' => 'Food Critic',       'avatar_gradient' => 'linear-gradient(45deg, #43e97b, #38f9d7)', 'rating' => 5, 'is_published' => true, 'sort_order' => 4,
             'content' => '"Chef Hassan\'s culinary creations were outstanding! Every meal was a perfect blend of traditional Maldivian flavors and international cuisine. The sunset dinner was magical."'],
            ['guest_name' => 'The Williams Family',   'guest_title' => 'Family Travelers',  'avatar_gradient' => 'linear-gradient(45deg, #fa709a, #fee140)', 'rating' => 5, 'is_published' => true, 'sort_order' => 5,
             'content' => '"As a family, we were amazed by how The Mureed catered to everyone\'s needs. The kids loved the snorkeling, while we adults enjoyed the spa. Perfect family getaway!"'],
        ];
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['guest_name' => $t['guest_name']], $t);
        }

        // Attractions
        $attractions = [
            ['name' => 'Fotteyo Kandu',        'icon' => '🤿', 'gradient_style' => 'linear-gradient(45deg, #4facfe, #00f2fe)', 'sort_order' => 1, 'description' => 'World-renowned dive site teeming with manta rays, sharks, and vibrant coral formations.'],
            ['name' => 'Coral Garden',         'icon' => '🐠', 'gradient_style' => 'linear-gradient(45deg, #43e97b, #38f9d7)', 'sort_order' => 2, 'description' => 'Pristine shallow reef perfect for snorkeling, accessible directly from our beach.'],
            ['name' => 'Dolphin Safari',       'icon' => '🐬', 'gradient_style' => 'linear-gradient(45deg, #667eea, #764ba2)', 'sort_order' => 3, 'description' => 'Daily excursions to spot spinner dolphins in the open Indian Ocean.'],
            ['name' => 'Fulidhoo Village',     'icon' => '🏘️', 'gradient_style' => 'linear-gradient(45deg, #f093fb, #f5576c)', 'sort_order' => 4, 'description' => 'Explore the authentic Maldivian village, local culture, and traditional crafts.'],
            ['name' => 'Sandbank Picnic',      'icon' => '🏝️', 'gradient_style' => 'linear-gradient(45deg, #fa709a, #fee140)', 'sort_order' => 5, 'description' => 'Exclusive private sandbank picnics with champagne and fresh seafood.'],
            ['name' => 'Night Fishing',        'icon' => '🎣', 'gradient_style' => 'linear-gradient(45deg, #f7971e, #ffd200)', 'sort_order' => 6, 'description' => 'Traditional Maldivian night fishing on a traditional wooden dhoni.'],
        ];
        foreach ($attractions as $a) {
            Attraction::updateOrCreate(['name' => $a['name']], $a + ['is_active' => true]);
        }

        // Team members
        $team = [
            ['name' => 'Ahmed Hassan',    'position' => 'General Manager',      'gradient_style' => 'linear-gradient(45deg, #667eea, #764ba2)', 'sort_order' => 1,
             'bio' => 'With over 15 years of hospitality experience across the Maldives, Ahmed brings passion and excellence to every aspect of The Mureed.'],
            ['name' => 'Fatima Ali',      'position' => 'Head Chef',            'gradient_style' => 'linear-gradient(45deg, #f093fb, #f5576c)', 'sort_order' => 2,
             'bio' => 'Trained in Paris and Mumbai, Chef Fatima blends international techniques with authentic Maldivian flavors to create unforgettable culinary experiences.'],
            ['name' => 'Dr. Ibrahim Waheed','position' => 'Marine Biologist & Dive Master','gradient_style' => 'linear-gradient(45deg, #4facfe, #00f2fe)', 'sort_order' => 3,
             'bio' => 'A PhD in Marine Biology from the University of Auckland, Dr. Waheed turns every dive into an educational adventure through the underwater world.'],
            ['name' => 'Mariyam Noor',   'position' => 'Spa Director',         'gradient_style' => 'linear-gradient(45deg, #43e97b, #38f9d7)', 'sort_order' => 4,
             'bio' => 'Certified in Ayurvedic therapy and Swedish massage, Mariyam curates rejuvenating spa journeys rooted in traditional island wellness.'],
        ];
        foreach ($team as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member + ['is_active' => true]);
        }

        // Site settings
        $siteSettings = [
            ['key' => 'hero_title',       'value' => 'Reserve Your Perfect Getaway',     'type' => 'text'],
            ['key' => 'hero_subtitle',    'value' => 'Experience unparalleled comfort and hospitality at The Mureed - your home away from home.', 'type' => 'textarea'],
            ['key' => 'philosophy_title', 'value' => 'Our Philosophy',                    'type' => 'text'],
            ['key' => 'philosophy_text',  'value' => 'At The Mureed, we believe luxury is not just about opulence — it is about authentic connection, environmental harmony, and creating moments that last a lifetime.', 'type' => 'textarea'],
            ['key' => 'mission',          'value' => 'To provide an extraordinary island escape that seamlessly blends Maldivian culture with world-class hospitality, creating memories that inspire guests to return time and again.', 'type' => 'textarea'],
            ['key' => 'vision',           'value' => 'To be the most loved boutique resort in the Maldives, celebrated for our genuine warmth, sustainable practices, and the transformative experiences we create.', 'type' => 'textarea'],
        ];
        foreach ($siteSettings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // Footer settings
        $footerSettings = [
            ['key' => 'phone_1',         'value' => '+960 765-4321',              'type' => 'text'],
            ['key' => 'phone_2',         'value' => '+960 987-6543',              'type' => 'text'],
            ['key' => 'email_info',      'value' => 'info@themureed.com',         'type' => 'text'],
            ['key' => 'email_bookings',  'value' => 'reservations@themureed.com', 'type' => 'text'],
            ['key' => 'address',         'value' => "Fulidhoo Island\nVaavu Atoll\nRepublic of Maldives", 'type' => 'textarea'],
            ['key' => 'facebook_url',    'value' => '#',                           'type' => 'url'],
            ['key' => 'instagram_url',   'value' => '#',                           'type' => 'url'],
            ['key' => 'tripadvisor_url', 'value' => '#',                           'type' => 'url'],
            ['key' => 'office_hours',    'value' => 'Daily: 6:00 AM - 10:00 PM MVT', 'type' => 'text'],
        ];
        foreach ($footerSettings as $s) {
            FooterSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
