<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'The Mureed - Perfect Getaway')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a365d;
            cursor: pointer;
            text-decoration: none;
        }

        .logo:hover { color: #3182ce; }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            color: #3182ce;
            background: rgba(49, 130, 206, 0.1);
        }

        .book-btn {
            background: #3182ce;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .book-btn:hover {
            background: #2c5aa0;
            transform: translateY(-2px);
        }

        .mobile-menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #1a365d;
        }

        /* Page Container */
        .page-container {
            min-height: 100vh;
            padding-top: 80px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Hero Section */
        .hero {
            height: 90vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-text {
            color: white;
            animation: slideInLeft 1s ease-out;
        }

        .hero-text h1 { font-size: 3.5rem; margin-bottom: 1rem; line-height: 1.2; }
        .hero-text p { font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; }

        .hero-buttons { display: flex; gap: 1rem; }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary { background: #3182ce; color: white; }

        .btn-secondary {
            background: transparent;
            color: #3182ce;
            border: 2px solid #3182ce;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .hero .btn-secondary {
            color: white;
            border-color: white;
        }

        .hero-image { position: relative; animation: slideInRight 1s ease-out; }

        .beach-scene {
            width: 100%;
            height: 400px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><rect fill="%2387CEEB" width="400" height="200"/><ellipse cx="200" cy="250" rx="200" ry="50" fill="%23F5F5DC"/><circle cx="150" cy="240" r="3" fill="%234169E1"/><circle cx="250" cy="245" r="2" fill="%234169E1"/><rect x="350" y="180" width="30" height="40" fill="%23228B22"/></svg>') no-repeat center;
            background-size: cover;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        /* Page Headers */
        .page-header {
            background: linear-gradient(135deg, #1a365d 0%, #2d3748 100%);
            color: white;
            padding: 4rem 2rem 2rem;
            text-align: center;
        }

        .page-header h1 { font-size: 3rem; margin-bottom: 1rem; }
        .page-header p { font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto; }

        /* Content Sections */
        .content-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2.5rem;
            color: #1a365d;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Room Cards */
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (min-width: 1024px) {
            .rooms-grid { grid-template-columns: 1fr 1fr; }
        }

        #home .rooms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (min-width: 1024px) {
            #home .rooms-grid { grid-template-columns: repeat(3, 1fr); }
        }

        .room-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .room-image {
            height: 250px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .room-content { padding: 2rem; }
        .room-content h3 { font-size: 1.5rem; color: #1a365d; margin-bottom: 1.5rem; }

        .room-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .room-title { font-size: 1.5rem; color: #1a365d; margin: 0; }

        .room-price {
            font-size: 1.8rem;
            color: #3182ce;
            font-weight: bold;
            margin: 0;
            text-align: right;
        }

        .room-features {
            list-style: none;
            margin-bottom: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
        }

        .room-features li {
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            text-align: center;
            background: #f8f9fa;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
        }

        .room-features li:hover {
            border-color: #3182ce;
            background: rgba(49, 130, 206, 0.05);
            transform: translateY(-2px);
        }

        .room-feature-icon { font-size: 0.75rem; color: #3182ce; }
        .room-feature-text { font-size: 0.75rem; color: #666; font-weight: 500; }

        .room-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .room-buttons .btn { width: 100%; text-align: center; padding: 0.75rem 1rem; font-size: 0.9rem; }

        .btn-secondary:hover { background: #3182ce; color: white; }

        /* Restaurant Page Styles */
        .menu-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .menu-tab {
            padding: 1rem 2rem;
            background: none;
            border: none;
            font-size: 1.1rem;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .menu-tab.active { color: #3182ce; border-bottom-color: #3182ce; }
        .menu-tab:hover { color: #3182ce; }
        .menu-content { display: none; }
        .menu-content.active { display: block; }

        .menu-items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .menu-item-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .menu-item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .menu-item-image {
            height: 150px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
        }

        .menu-item-content { padding: 1.5rem; }
        .menu-item-card h4 { color: #1a365d; font-size: 1.3rem; margin-bottom: 0.75rem; }
        .menu-item-card p { color: #666; line-height: 1.6; margin-bottom: 1rem; font-size: 0.95rem; }
        .menu-item-price { color: #3182ce; font-weight: bold; font-size: 1.2rem; }

        /* Chef's Special Section */
        .chefs-special-section { background: #f8f9fa; padding: 4rem 2rem; margin: 4rem 0; }

        .special-dishes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .special-dish-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .special-dish-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .dish-banner {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
        }

        .dish-banner::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 50px;
            background: linear-gradient(transparent, rgba(0,0,0,0.3));
        }

        .special-dish-content { padding: 2rem; }
        .special-dish-content h4 { color: #1a365d; font-size: 1.4rem; margin-bottom: 1rem; }
        .special-dish-content p { color: #666; line-height: 1.6; margin-bottom: 1.5rem; }
        .special-dish-price { color: #3182ce; font-weight: bold; font-size: 1.3rem; }

        /* CTA Section */
        .restaurant-cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            margin: 4rem 0;
        }

        .cta-content { max-width: 600px; margin: 0 auto; }
        .cta-content h3 { font-size: 2.5rem; margin-bottom: 1rem; }
        .cta-content p { font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cta-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .cta-btn-primary { background: white; color: #3182ce; }
        .cta-btn-secondary { background: transparent; color: white; border: 2px solid white; }
        .cta-btn:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.3); }

        /* Photo Gallery Section */
        .photo-gallery-section { padding: 4rem 2rem; }

        .gallery-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .gallery-category-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .gallery-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .gallery-category-image {
            height: 250px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
        }

        .gallery-category-content { padding: 2rem; text-align: center; }
        .gallery-category-content h4 { color: #1a365d; font-size: 1.3rem; margin-bottom: 0.5rem; }
        .gallery-category-content p { color: #666; font-size: 0.95rem; }

        /* Gallery Modal */
        .gallery-modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .gallery-modal-content {
            position: relative;
            max-width: 800px;
            width: 90%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .gallery-modal-header {
            padding: 2rem;
            background: #1a365d;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .gallery-modal-close { background: none; border: none; color: white; font-size: 2rem; cursor: pointer; }

        .gallery-carousel { position: relative; height: 400px; overflow: hidden; }

        .gallery-slide {
            display: none;
            height: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .gallery-slide.active { display: flex; }

        .gallery-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 50%;
            width: 50px; height: 50px;
            cursor: pointer;
            font-size: 1.5rem;
            color: #1a365d;
            transition: all 0.3s ease;
        }

        .gallery-controls:hover { background: white; }
        .gallery-prev { left: 20px; }
        .gallery-next { right: 20px; }

        .gallery-indicators {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem;
            background: #f8f9fa;
        }

        .gallery-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: #ddd;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .gallery-dot.active { background: #3182ce; }

        /* Amenities Grid */
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .amenity-card {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .amenity-card:hover { transform: translateY(-5px); }
        .amenity-icon { font-size: 3rem; margin-bottom: 1rem; color: #3182ce; }
        .amenity-card h3 { color: #1a365d; margin-bottom: 1rem; }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            margin-top: 3rem;
        }

        .gallery-item {
            height: 250px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-item:hover { transform: scale(1.05); }
        .gallery-item:nth-child(1) { background: linear-gradient(45deg, #667eea, #764ba2); }
        .gallery-item:nth-child(2) { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .gallery-item:nth-child(3) { background: linear-gradient(45deg, #4facfe, #00f2fe); }
        .gallery-item:nth-child(4) { background: linear-gradient(45deg, #43e97b, #38f9d7); }
        .gallery-item:nth-child(5) { background: linear-gradient(45deg, #fa709a, #fee140); }
        .gallery-item:nth-child(6) { background: linear-gradient(45deg, #a8edea, #fed6e3); }
        .gallery-item:nth-child(7) { background: linear-gradient(45deg, #667eea, #764ba2); }
        .gallery-item:nth-child(8) { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .gallery-item:nth-child(9) { background: linear-gradient(45deg, #4facfe, #00f2fe); }

        .gallery-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
            padding: 2rem 1rem 1rem;
            text-align: center;
        }

        /* Testimonial Carousel */
        .testimonial {
            padding: 4rem 2rem;
            background: #f8f9fa;
            text-align: center;
            position: relative;
        }

        .testimonial-content { max-width: 800px; margin: 0 auto; position: relative; }
        .testimonial-carousel { position: relative; overflow: hidden; }

        .testimonial-slide { display: none; animation: fadeIn 0.5s ease-in; }
        .testimonial-slide.active { display: block; }

        .testimonial-nav {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .nav-dot {
            width: 12px; height: 12px;
            border-radius: 50%;
            background: #ddd;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-dot.active { background: #3182ce; transform: scale(1.2); }
        .nav-dot:hover { background: #3182ce; }

        .carousel-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            width: 40px; height: 40px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #3182ce;
            transition: all 0.3s ease;
        }

        .carousel-controls:hover { background: white; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .carousel-prev { left: -60px; }
        .carousel-next { right: -60px; }

        @media (max-width: 768px) {
            .carousel-prev { left: 10px; }
            .carousel-next { right: 10px; }
        }

        .testimonial-text { font-size: 1.3rem; font-style: italic; color: #555; margin-bottom: 2rem; line-height: 1.8; }

        .testimonial-author { display: flex; align-items: center; justify-content: center; gap: 1rem; }

        .author-avatar { width: 50px; height: 50px; border-radius: 50%; background: #ddd; }

        /* Footer */
        .footer {
            background: white;
            color: #333;
            padding: 3rem 2rem 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 { margin-bottom: 1rem; color: #1a365d; }

        .footer-section a {
            color: #666;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover { color: #3182ce; }

        .newsletter { display: flex; gap: 1rem; margin-top: 1rem; }

        .newsletter input {
            flex: 1;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 5px;
            background: white;
            color: #333;
        }

        .newsletter button {
            background: #3182ce;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .social-links { display: flex; gap: 1rem; margin-top: 1rem; }

        .social-links a {
            width: 35px; height: 35px;
            background: #3182ce;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .social-links a:hover { background: #2c5aa0; }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
            color: #666;
        }

        /* Contact Form */
        .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; margin-top: 3rem; }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600; }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3182ce;
        }

        .form-group textarea { height: 120px; resize: vertical; }

        .contact-info { background: #f8f9fa; padding: 2rem; border-radius: 15px; }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .contact-icon {
            width: 50px; height: 50px;
            background: #3182ce;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .contact-details h4 { color: #1a365d; margin-bottom: 0.5rem; }
        .contact-details p { color: #666; margin: 0; }

        .map-container {
            margin-top: 3rem;
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .map-container iframe { width: 100%; height: 100%; border: none; }

        /* About Us Styles */
        .about-section { margin-bottom: 4rem; }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 3rem;
        }

        .about-text h3 { color: #1a365d; font-size: 2rem; margin-bottom: 1rem; }
        .about-text p { color: #666; line-height: 1.8; margin-bottom: 1rem; }

        .about-image {
            height: 300px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .mission-vision { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 3rem; }

        .mission-card, .vision-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .mission-card { border-top: 4px solid #3182ce; }
        .vision-card { border-top: 4px solid #38a169; }
        .mission-card h3, .vision-card h3 { color: #1a365d; margin-bottom: 1rem; font-size: 1.5rem; }

        .local-info { background: #f8f9fa; padding: 3rem; border-radius: 15px; margin-top: 3rem; }
        .local-info h3 { color: #1a365d; text-align: center; margin-bottom: 2rem; font-size: 2rem; }

        .local-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .local-feature {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        /* Team Section */
        .team-section { background: #f8f9fa; padding: 3rem; border-radius: 15px; margin-top: 3rem; }

        .founder-message {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 2rem;
            align-items: center;
        }

        .founder-image {
            width: 200px; height: 200px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .founder-content h3 { color: #1a365d; font-size: 1.8rem; margin-bottom: 0.5rem; }
        .founder-title { color: #3182ce; font-weight: 600; margin-bottom: 1rem; }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-member {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .team-member:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.15); }

        .team-photo {
            width: 120px; height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .team-member:nth-child(2n) .team-photo { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .team-member:nth-child(3n) .team-photo { background: linear-gradient(45deg, #4facfe, #00f2fe); }
        .team-member:nth-child(4n) .team-photo { background: linear-gradient(45deg, #43e97b, #38f9d7); }

        .team-member h4 { color: #1a365d; margin-bottom: 0.5rem; font-size: 1.2rem; }
        .team-role { color: #3182ce; font-weight: 600; margin-bottom: 1rem; font-size: 0.9rem; }
        .team-member p { color: #666; font-size: 0.9rem; line-height: 1.5; }

        /* Attractions Section */
        .attractions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .attraction-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .attraction-card:hover { transform: translateY(-10px); }

        .attraction-image {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .attraction-content { padding: 1.5rem; }
        .attraction-content h4 { color: #1a365d; margin-bottom: 1rem; font-size: 1.2rem; }
        .attraction-content p { color: #666; line-height: 1.6; font-size: 0.9rem; }

        /* Philosophy Section */
        .philosophy-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            border-radius: 15px;
            margin: 3rem 0;
            text-align: center;
        }

        .philosophy-content { max-width: 800px; margin: 0 auto; }
        .philosophy-section h3 { font-size: 2.5rem; margin-bottom: 2rem; }
        .philosophy-section p { font-size: 1.2rem; line-height: 1.8; opacity: 0.95; }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mobile-menu-toggle { display: block; }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%; left: 0;
                width: 100%;
                background: white;
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }

            .nav-links.active { display: flex; }
            .hero-content { grid-template-columns: 1fr; text-align: center; gap: 2rem; }
            .hero-text h1 { font-size: 2.5rem; }
            .footer-content { grid-template-columns: 1fr; gap: 2rem; }

            .contact-grid, .about-content, .mission-vision, .local-features, .attractions-grid, .team-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-content { text-align: center; }

            .founder-message {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1.5rem;
            }

            .founder-image { margin: 0 auto; }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <a href="{{ url('/') }}" class="logo">The Mureed</a>
        <div class="mobile-menu-toggle">☰</div>
        <ul class="nav-links">
            <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">About Us</a></li>
            <li><a href="{{ url('/rooms') }}" class="{{ request()->is('rooms') ? 'active' : '' }}">Rooms</a></li>
            <li><a href="{{ url('/restaurant') }}" class="{{ request()->is('restaurant') ? 'active' : '' }}">Restaurant</a></li>
            <li><a href="{{ url('/amenities') }}" class="{{ request()->is('amenities') ? 'active' : '' }}">Amenities</a></li>
            <li><a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact Us</a></li>
        </ul>
        <button class="book-btn" onclick="showBookingModal()">Book</button>
    </nav>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="gallery-modal">
        <div class="gallery-modal-content">
            <div class="gallery-modal-header">
                <h3 id="galleryTitle">Gallery</h3>
                <button class="gallery-modal-close" onclick="closeGalleryModal()">&times;</button>
            </div>
            <div class="gallery-carousel">
                <button class="gallery-controls gallery-prev" onclick="changeGallerySlide(-1)">‹</button>
                <button class="gallery-controls gallery-next" onclick="changeGallerySlide(1)">›</button>
                <div class="gallery-slide active">📸</div>
                <div class="gallery-slide">📸</div>
                <div class="gallery-slide">📸</div>
                <div class="gallery-slide">📸</div>
                <div class="gallery-slide">📸</div>
            </div>
            <div class="gallery-indicators">
                <div class="gallery-dot active" onclick="goToGallerySlide(0)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(1)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(2)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(3)"></div>
                <div class="gallery-dot" onclick="goToGallerySlide(4)"></div>
            </div>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div id="reservationModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; align-items: center; justify-content: center;">
        <div style="background: white; padding: 3rem; border-radius: 15px; max-width: 500px; width: 90%; position: relative;">
            <span onclick="closeReservationModal()" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 2rem; cursor: pointer; color: #666;">&times;</span>
            <h2 style="color: #1a365d; margin-bottom: 2rem; text-align: center;">Restaurant Reservation</h2>
            <form>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Date</label>
                        <input type="date" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Time</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>6:00 PM</option><option>6:30 PM</option><option>7:00 PM</option>
                            <option>7:30 PM</option><option>8:00 PM</option><option>8:30 PM</option><option>9:00 PM</option>
                        </select>
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Guests</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>2 Guests</option><option>3 Guests</option><option>4 Guests</option>
                            <option>5 Guests</option><option>6+ Guests</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Seating</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>Indoor</option><option>Outdoor</option><option>Beachfront</option>
                        </select>
                    </div>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Special Requests</label>
                    <textarea placeholder="Any dietary restrictions or special occasions..." style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem; height: 100px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;" onclick="submitReservation(event)">Confirm Reservation</button>
            </form>
        </div>
    </div>

    <!-- Booking Modal -->
    <div id="bookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; align-items: center; justify-content: center;">
        <div style="background: white; padding: 3rem; border-radius: 15px; max-width: 500px; width: 90%; position: relative;">
            <span onclick="closeBookingModal()" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 2rem; cursor: pointer; color: #666;">&times;</span>
            <h2 style="color: #1a365d; margin-bottom: 2rem; text-align: center;">Book Your Stay</h2>
            <form>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Check-in Date</label>
                    <input type="date" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Check-out Date</label>
                    <input type="date" style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Adults</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>1</option><option>2</option><option>3</option><option>4</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Children</label>
                        <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                            <option>0</option><option>1</option><option>2</option><option>3</option>
                        </select>
                    </div>
                </div>
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 600;">Room Type</label>
                    <select style="width: 100%; padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 5px; font-size: 1rem;">
                        <option>Garden Room - $199/night</option>
                        <option>Ocean View Suite - $299/night</option>
                        <option>Beach Villa - $499/night</option>
                        <option>Presidential Suite - $799/night</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;" onclick="submitBooking(event)">Complete Booking</button>
            </form>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>The Mureed</h4>
                <p>Subscribe to our newsletter for the latest updates and special offers.</p>
                <div class="newsletter">
                    <input type="email" placeholder="Your Email">
                    <button onclick="subscribeNewsletter()">Subscribe</button>
                </div>
                <p style="margin-top: 1rem; font-size: 0.9rem;">By subscribing, you consent to our Privacy Policy and receive updates.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/rooms') }}">Rooms</a>
                <a href="{{ url('/restaurant') }}">Restaurant</a>
                <a href="{{ url('/amenities') }}">Amenities</a>
                <a href="{{ url('/gallery') }}">Gallery</a>
                <a href="{{ url('/about') }}">About Us</a>
                <a href="{{ url('/contact') }}">Contact Us</a>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <a href="{{ url('/contact') }}">Contact Us</a>
                <a href="#">Blog</a>
                <a href="#">FAQs</a>
                <a href="#">Careers</a>
                <a href="#">Events</a>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#">f</a>
                    <a href="#">📷</a>
                    <a href="#">🐦</a>
                    <a href="#">in</a>
                    <a href="#">▶️</a>
                </div>
                <p style="margin-top: 1rem; font-size: 0.9rem;">Kaafu Atoll, Maldives<br>Phone: +960 123-4567<br>Email: info@themureed.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} The Mureed. All rights reserved. | Privacy Policy | Terms of Service | Cookie Settings</p>
        </div>
    </footer>

    <script>
        // Testimonial carousel
        let currentTestimonial = 0;
        const totalTestimonials = 5;

        function changeTestimonial(direction) {
            $('.testimonial-slide').removeClass('active');
            $('.nav-dot').removeClass('active');
            currentTestimonial += direction;
            if (currentTestimonial >= totalTestimonials) currentTestimonial = 0;
            else if (currentTestimonial < 0) currentTestimonial = totalTestimonials - 1;
            $('.testimonial-slide').eq(currentTestimonial).addClass('active');
            $('.nav-dot').eq(currentTestimonial).addClass('active');
        }

        function goToTestimonial(index) {
            $('.testimonial-slide').removeClass('active');
            $('.nav-dot').removeClass('active');
            currentTestimonial = index;
            $('.testimonial-slide').eq(currentTestimonial).addClass('active');
            $('.nav-dot').eq(currentTestimonial).addClass('active');
        }

        $(document).ready(function() {
            // Mobile menu toggle
            $('.mobile-menu-toggle').click(function() {
                $('.nav-links').toggleClass('active');
            });

            // Navbar background on scroll
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) $('.navbar').addClass('scrolled');
                else $('.navbar').removeClass('scrolled');
            });

            // Close mobile menu when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('.navbar').length) {
                    $('.nav-links').removeClass('active');
                }
            });

            // Card hover animations
            $('.room-card, .amenity-card').hover(
                function() { $(this).css('transform', 'translateY(-10px)'); },
                function() { $(this).css('transform', 'translateY(0)'); }
            );

            // Gallery item hover
            $('.gallery-item').hover(function() {
                $(this).find('.gallery-overlay').css('background', 'linear-gradient(transparent, rgba(0,0,0,0.9))');
            }, function() {
                $(this).find('.gallery-overlay').css('background', 'linear-gradient(transparent, rgba(0,0,0,0.7))');
            });

            // Date field defaults
            var today = new Date().toISOString().split('T')[0];
            $('input[type="date"]').attr('min', today);

            $('input[type="date"]').first().change(function() {
                var checkinDate = new Date($(this).val());
                checkinDate.setDate(checkinDate.getDate() + 1);
                $('input[type="date"]').last().attr('min', checkinDate.toISOString().split('T')[0]);
            });

            // Team member hover
            $('.team-member').hover(
                function() { $(this).find('.team-photo').css('transform', 'scale(1.1)'); },
                function() { $(this).find('.team-photo').css('transform', 'scale(1)'); }
            );

            // Form validation styling
            $('input[required], select[required], textarea[required]').blur(function() {
                if ($(this).val() === '') $(this).css('border-color', '#e53e3e');
                else $(this).css('border-color', '#38a169');
            });

            // Contact form
            $('#contactForm').submit(function(e) {
                e.preventDefault();
                var name = $('#name').val(), email = $('#email').val(), message = $('#message').val();
                if (name && email && message) {
                    alert('Thank you ' + name + '! Your message has been sent. We will get back to you within 4 hours during office hours.');
                    $('#contactForm')[0].reset();
                } else {
                    alert('Please fill in all required fields.');
                }
            });
        });

        // Booking modal
        function showBookingModal() { $('#bookingModal').css('display', 'flex').hide().fadeIn(300); }
        function closeBookingModal() { $('#bookingModal').fadeOut(300); }
        function submitBooking(event) {
            event.preventDefault();
            alert('Thank you for your booking request! Our team will contact you shortly to confirm your reservation.');
            closeBookingModal();
        }

        // Gallery modal
        let currentGallerySlide = 0, totalGallerySlides = 5;

        function openGalleryModal(type) {
            const titles = { 'dining': 'Dining Area Gallery', 'dishes': 'Signature Dishes Gallery', 'ambience': 'Restaurant Ambience Gallery' };
            currentGallerySlide = 0;
            $('#galleryTitle').text(titles[type]);
            $('#galleryModal').css('display', 'flex').hide().fadeIn(300);
            $('.gallery-slide').removeClass('active');
            $('.gallery-dot').removeClass('active');
            $('.gallery-slide').first().addClass('active');
            $('.gallery-dot').first().addClass('active');
        }

        function closeGalleryModal() { $('#galleryModal').fadeOut(300); }

        function changeGallerySlide(direction) {
            $('.gallery-slide').removeClass('active');
            $('.gallery-dot').removeClass('active');
            currentGallerySlide += direction;
            if (currentGallerySlide >= totalGallerySlides) currentGallerySlide = 0;
            else if (currentGallerySlide < 0) currentGallerySlide = totalGallerySlides - 1;
            $('.gallery-slide').eq(currentGallerySlide).addClass('active');
            $('.gallery-dot').eq(currentGallerySlide).addClass('active');
        }

        function goToGallerySlide(index) {
            $('.gallery-slide').removeClass('active');
            $('.gallery-dot').removeClass('active');
            currentGallerySlide = index;
            $('.gallery-slide').eq(currentGallerySlide).addClass('active');
            $('.gallery-dot').eq(currentGallerySlide).addClass('active');
        }

        // Reservation modal
        function showReservationModal() { $('#reservationModal').css('display', 'flex').hide().fadeIn(300); }
        function closeReservationModal() { $('#reservationModal').fadeOut(300); }
        function submitReservation(event) {
            event.preventDefault();
            alert('Thank you for your reservation request! Our restaurant team will contact you shortly.');
            closeReservationModal();
        }

        function callRestaurant() {
            alert('Calling The Mureed Restaurant at +960 765-4321...\n\nOur team is available daily from 6:00 AM to 10:00 PM.');
        }

        // Room gallery
        function showRoomGallery(roomType) {
            var roomNames = { 'ocean-suite': 'Ocean View Suite', 'beach-villa': 'Beach Villa', 'garden-room': 'Garden Room', 'presidential-suite': 'Presidential Suite' };
            alert('Opening ' + roomNames[roomType] + ' photo gallery!');
        }

        // Newsletter
        function subscribeNewsletter() {
            var email = $('.newsletter input').val();
            if (email && email.includes('@')) {
                alert('Thank you for subscribing! You will receive updates at ' + email);
                $('.newsletter input').val('');
            } else {
                alert('Please enter a valid email address.');
            }
        }

        // Close modals on outside click
        $('#galleryModal, #reservationModal, #bookingModal').click(function(event) {
            if (event.target === this) $(this).fadeOut(300);
        });
    </script>

    @stack('scripts')
</body>
</html>
