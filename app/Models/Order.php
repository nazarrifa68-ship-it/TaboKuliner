<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'order_number',
        'subtotal',
        'shipping_cost',
        'service_fee',
        'discount',
        'total_amount',
        'status',
        'payment_status',
        'payment_method',
        'payment_proof',
        'notes',
        'cancel_reason',
        'paid_at',
        'completed_at',
        'cancelled_at'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'service_fee' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    // Relasi dengan User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Address
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    // Relasi dengan OrderItem
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi dengan OrderStatusHistory
    public function statusHistories(): HasMany
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    // Relasi dengan Payment
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    // Accessor untuk grand total
    public function getGrandTotalAttribute()
    {
        return $this->subtotal + $this->shipping_cost + $this->service_fee - $this->discount;
    }

    // Accessor untuk status badge
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge badge-warning">Menunggu Pembayaran</span>',
            'paid' => '<span class="badge badge-info">Sudah Dibayar</span>',
            'processing' => '<span class="badge badge-info">Sedang Diproses</span>',
            'ready' => '<span class="badge badge-primary">Siap Dikirim</span>',
            'shipped' => '<span class="badge badge-primary">Dalam Pengiriman</span>',
            'delivered' => '<span class="badge badge-success">Sudah Diterima</span>',
            'completed' => '<span class="badge badge-success">Selesai</span>',
            'cancelled' => '<span class="badge badge-danger">Dibatalkan</span>',
            default => '<span class="badge badge-secondary">Unknown</span>',
        };
    }

    // Accessor untuk payment status badge
    public function getPaymentStatusBadgeAttribute()
    {
        return match($this->payment_status) {
            'unpaid' => '<span class="badge badge-warning">Belum Bayar</span>',
            'paid' => '<span class="badge badge-success">Sudah Bayar</span>',
            'refunded' => '<span class="badge badge-info">Refund</span>',
            default => '<span class="badge badge-secondary">Unknown</span>',
        };
    }

    // Scope untuk filter by status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk user orders
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Generate order number
    public static function generateOrderNumber()
    {
        $prefix = 'TK';
        $date = now()->format('Ymd');
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
        
        return $prefix . $date . $random;
    }

    // Event untuk create status history
    protected static function boot()
    {
        parent::boot();

        static::created(function ($order) {
            $order->statusHistories()->create([
                'status' => $order->status,
                'notes' => 'Pesanan dibuat'
            ]);
        });

        static::updating(function ($order) {
            if ($order->isDirty('status')) {
                $order->statusHistories()->create([
                    'status' => $order->status,
                    'notes' => 'Status diubah menjadi ' . $order->status
                ]);
            }
        });
    }
    public function review()
{
    return $this->hasOne(Review::class);
}
}