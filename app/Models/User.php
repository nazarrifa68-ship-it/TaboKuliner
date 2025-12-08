<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi dengan Address
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    // Relasi dengan Order
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Get default address
    public function defaultAddress()
    {
        return $this->addresses()->where('is_default', true)->first();
    }

    // Check if user is admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check if user is customer
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }
}