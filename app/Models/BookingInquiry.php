<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingInquiry extends Model
{
    protected $fillable = [
        'guest_name', 'email', 'phone', 'nationality',
        'room_id', 'check_in', 'check_out',
        'adults', 'children', 'special_requests',
        'status', 'admin_notes',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'adults' => 'integer',
        'children' => 'integer',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
