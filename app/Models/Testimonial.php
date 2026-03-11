<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'guest_name', 'guest_title', 'avatar_gradient',
        'content', 'rating', 'source_url', 'is_published', 'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];
}
