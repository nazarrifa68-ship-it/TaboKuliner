<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'phone',
        'full_address',
        'province',
        'city',
        'district',
        'postal_code',
        'notes',
        'is_default'
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    // Relasi dengan User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Order
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Scope untuk alamat default
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    // Accessor untuk alamat lengkap
    public function getFullAddressTextAttribute()
    {
        $parts = [
            $this->full_address,
            $this->district,
            $this->city,
            $this->province,
            $this->postal_code
        ];

        return implode(', ', array_filter($parts));
    }

    // Event untuk set default address
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($address) {
            if ($address->is_default) {
                self::where('user_id', $address->user_id)
                    ->where('is_default', true)
                    ->update(['is_default' => false]);
            }
        });

        static::updating(function ($address) {
            if ($address->is_default && $address->isDirty('is_default')) {
                self::where('user_id', $address->user_id)
                    ->where('id', '!=', $address->id)
                    ->where('is_default', true)
                    ->update(['is_default' => false]);
            }
        });
    }
}