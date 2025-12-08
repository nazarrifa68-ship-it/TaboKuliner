<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            // Makanan Utama
            ['category_id' => 1, 'name' => 'Soto Medan', 'price' => 25000, 'calories' => 280, 'is_special' => true, 'image' => 'image/img_menu/Soto_medan.png'],
            ['category_id' => 1, 'name' => 'Saksang', 'price' => 35000, 'calories' => 320, 'is_special' => true, 'image' => 'image/img_menu/Saksang.jpg'],
            ['category_id' => 1, 'name' => 'Arsik Ikan Mas', 'price' => 45000, 'calories' => 350, 'is_special' => true, 'image' => 'image/img_menu/Arsik_Ikan_Mas.png'],
            ['category_id' => 1, 'name' => 'Soto Bebek Medan', 'price' => 30000, 'calories' => 300, 'is_special' => true, 'image' => 'image/img_menu/Soto_Bebek_Medan.png'],
            ['category_id' => 1, 'name' => 'Naniura', 'price' => 40000, 'calories' => 250, 'is_special' => true, 'image' => 'image/img_menu/Naniura.png'],
            
            // Dessert
            ['category_id' => 4, 'name' => 'Bika Ambon', 'price' => 20000, 'calories' => 180, 'is_special' => true, 'image' => 'image/img_menu/Bika_Ambon.png'],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert([
                'category_id' => $menu['category_id'],
                'name' => $menu['name'],
                'slug' => Str::slug($menu['name']),
                'description' => 'Hidangan khas Sumatera Utara dengan cita rasa autentik',
                'price' => $menu['price'],
                'calories' => $menu['calories'],
                'image' => $menu['image'],
                'is_available' => true,
                'is_special' => $menu['is_special'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}