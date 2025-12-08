<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'menu_id',
        'menu_name',
        'menu_image',
        'quantity',
        'price',
        'subtotal',
        'notes'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // Relasi dengan Order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi dengan Menu
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    // Accessor untuk subtotal (jika tidak di-set)
    public function getSubtotalAttribute($value)
    {
        return $value ?? ($this->quantity * $this->price);
    }

    // Event untuk calculate subtotal
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderItem) {
            if (!$orderItem->subtotal) {
                $orderItem->subtotal = $orderItem->quantity * $orderItem->price;
            }
        });

        static::updating(function ($orderItem) {
            if ($orderItem->isDirty(['quantity', 'price'])) {
                $orderItem->subtotal = $orderItem->quantity * $orderItem->price;
            }
        });
    }
}