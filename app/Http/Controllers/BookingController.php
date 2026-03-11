<?php
namespace App\Http\Controllers;

use App\Mail\BookingInquiryMail;
use App\Models\BookingInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name'      => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255'],
            'phone'           => ['nullable', 'string', 'max:50'],
            'nationality'     => ['nullable', 'string', 'max:100'],
            'room_id'         => ['nullable', 'integer', 'exists:rooms,id'],
            'check_in'        => ['required', 'date', 'after_or_equal:today'],
            'check_out'       => ['required', 'date', 'after:check_in'],
            'adults'          => ['required', 'integer', 'min:1', 'max:20'],
            'children'        => ['required', 'integer', 'min:0', 'max:20'],
            'special_requests'=> ['nullable', 'string', 'max:2000'],
        ]);

        $inquiry = BookingInquiry::create($validated);

        Mail::to('bookings@themureed.com')->queue(new BookingInquiryMail($inquiry));

        return redirect()->back()->with(
            'booking_success',
            'Thank you, ' . $validated['guest_name'] . '! Your booking inquiry has been received. Our team will get back to you within 4 hours.'
        );
    }
}
