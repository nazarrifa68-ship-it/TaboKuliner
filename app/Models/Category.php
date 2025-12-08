<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi dengan Menu
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    // Scope untuk category yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}