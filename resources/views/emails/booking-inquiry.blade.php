<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; }
        .header { background: #1a365d; color: white; padding: 24px; text-align: center; }
        .body { padding: 24px; }
        table { width: 100%; border-collapse: collapse; margin: 16px 0; }
        td { padding: 10px 12px; border-bottom: 1px solid #eee; }
        td:first-child { font-weight: bold; color: #555; width: 40%; }
        .footer { background: #f4f4f4; padding: 16px 24px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin:0;">New Booking Inquiry</h2>
        <p style="margin:4px 0 0;">The Mureed Resort — Fulidhoo, Maldives</p>
    </div>

    <div class="body">
        <p>A new booking inquiry has been submitted. Please review and follow up within 4 hours.</p>

        <table>
            <tr><td>Guest Name</td><td>{{ $inquiry->guest_name }}</td></tr>
            <tr><td>Email</td><td>{{ $inquiry->email }}</td></tr>
            <tr><td>Phone</td><td>{{ $inquiry->phone ?? 'Not provided' }}</td></tr>
            <tr><td>Nationality</td><td>{{ $inquiry->nationality ?? 'Not provided' }}</td></tr>
            <tr><td>Room Requested</td><td>{{ $inquiry->room?->name ?? 'No preference' }}</td></tr>
            <tr><td>Check-In</td><td>{{ $inquiry->check_in->format('d M Y') }}</td></tr>
            <tr><td>Check-Out</td><td>{{ $inquiry->check_out->format('d M Y') }}</td></tr>
            <tr><td>Duration</td><td>{{ $inquiry->check_in->diffInDays($inquiry->check_out) }} nights</td></tr>
            <tr><td>Guests</td><td>{{ $inquiry->adults }} adult(s), {{ $inquiry->children }} child(ren)</td></tr>
            @if($inquiry->special_requests)
            <tr><td>Special Requests</td><td>{{ $inquiry->special_requests }}</td></tr>
            @endif
            <tr><td>Submitted</td><td>{{ $inquiry->created_at->format('d M Y, H:i') }} MVT</td></tr>
        </table>

        <p>
            <a href="{{ config('app.url') }}/admin/booking-inquiries/{{ $inquiry->id }}/edit"
               style="background:#1a365d;color:white;padding:12px 24px;text-decoration:none;border-radius:6px;display:inline-block;">
                View &amp; Update in Admin Panel
            </a>
        </p>
    </div>

    <div class="footer">
        <p>This email was generated automatically by The Mureed website. Do not reply to this email directly — contact the guest at {{ $inquiry->email }}.</p>
    </div>
</body>
</html>
