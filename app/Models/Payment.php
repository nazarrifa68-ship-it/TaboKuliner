<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_number',
        'payment_method',
        'amount',
        'status',
        'payment_proof',
        'payment_details',
        'paid_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_details' => 'array',
        'paid_at' => 'datetime',
    ];

    // Relasi dengan Order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Generate payment number
    public static function generatePaymentNumber()
    {
        $prefix = 'PAY';
        $date = now()->format('Ymd');
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));
        
        return $prefix . $date . $random;
    }

    // Accessor untuk status badge
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge badge-warning">Pending</span>',
            'success' => '<span class="badge badge-success">Berhasil</span>',
            'failed' => '<span class="badge badge-danger">Gagal</span>',
            'expired' => '<span class="badge badge-secondary">Expired</span>',
            default => '<span class="badge badge-secondary">Unknown</span>',
        };
    }
}