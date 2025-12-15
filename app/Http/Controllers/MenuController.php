<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Get MAKANAN (menu unggulan)
        $specialMenus = Menu::with('category')
            ->where('is_special', true)
            ->where('is_available', true)
            ->get();

        // Get regular menus (menu reguler)
        $regularMenus = Menu::with('category')
            ->where('is_special', false)
            ->where('is_available', true)
            ->get();

        // Get all categories
        $categories = Category::active()->get();

        return view('Pages.Menu', compact('specialMenus', 'regularMenus', 'categories'));
    }

    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)
            ->where('is_available', true)
            ->firstOrFail();

        return view('menu.show', compact('menu'));
    }

    public function byCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->active()
            ->firstOrFail();

        $menus = Menu::where('category_id', $category->id)
            ->where('is_available', true)
            ->paginate(12);

        return view('menu.category', compact('category', 'menus'));
    }
}