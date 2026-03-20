/* ========================================
   The Mureed - Frontend JavaScript
   ======================================== */

// Testimonial carousel
let currentTestimonial = 0;

function getTestimonialCount() {
    return document.querySelectorAll('.testimonial-slide').length;
}

function changeTestimonial(direction) {
    var total = getTestimonialCount();
    if (total === 0) return;
    $('.testimonial-slide').removeClass('active');
    $('.nav-dot').removeClass('active');
    currentTestimonial += direction;
    if (currentTestimonial >= total) currentTestimonial = 0;
    else if (currentTestimonial < 0) currentTestimonial = total - 1;
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

    // Set minimum date for check-in/checkout
    $('#checkin_date').attr('min', today);
    $('#checkin_date').on('change', function() {
        var nextDay = new Date($(this).val());
        nextDay.setDate(nextDay.getDate() + 1);
        $('#checkout_date').attr('min', nextDay.toISOString().split('T')[0]);
    });
});

// Booking modal
function showBookingModal(roomId, roomName) {
    if (roomId) $('#booking_room_id').val(roomId);
    $('#bookingModal').css('display', 'flex').hide().fadeIn(300);
}
function closeBookingModal() { $('#bookingModal').fadeOut(300); }

// Gallery modal
let currentGallerySlide = 0, totalGallerySlides = 5;

function openGalleryModal(type) {
    var titles = { 'dining': 'Dining Area Gallery', 'dishes': 'Signature Dishes Gallery', 'ambience': 'Restaurant Ambience Gallery' };
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
