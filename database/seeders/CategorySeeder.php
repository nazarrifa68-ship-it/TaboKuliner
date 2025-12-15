<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Makanan Utama',
                'slug' => 'makanan-utama',
                'description' => 'Hidangan utama khas Sumatera Utara',
                'is_active' => true
            ],
            [
                'name' => 'Makanan Ringan',
                'slug' => 'makanan-ringan',
                'description' => 'Camilan dan makanan ringan tradisional',
                'is_active' => true
            ],
            
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'description' => $category['description'],
                'is_active' => $category['is_active'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}