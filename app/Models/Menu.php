<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'calories',
        'is_available',
        'is_special',
        'stock'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
        'is_special' => 'boolean',
    ];

    // Relasi dengan Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi dengan OrderItem
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scope untuk menu yang tersedia
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    // Scope untuk special menu
    public function scopeSpecial($query)
    {
        return $query->where('is_special', true);
    }

    // Accessor untuk format harga
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}