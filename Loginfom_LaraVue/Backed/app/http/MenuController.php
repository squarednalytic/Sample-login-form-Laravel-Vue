<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Mendapatkan semua menu dengan struktur nested
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->with('children')->get();
        return response()->json($menus);
    }

    // Menambahkan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'route' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        $menu = Menu::create($request->all());
        return response()->json(['message' => 'Menu created successfully', 'menu' => $menu], 201);
    }

    // Menghapus menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return response()->json(['message' => 'Menu deleted successfully']);
    }
}
