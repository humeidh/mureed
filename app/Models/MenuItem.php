<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'category',
        'image_path', 'gradient_style', 'icon',
        'is_special', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_special' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
