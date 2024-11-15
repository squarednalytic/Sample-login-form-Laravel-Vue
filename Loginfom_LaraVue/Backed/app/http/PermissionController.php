<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // Mendapatkan semua permissions
    public function index()
    {
        return response()->json(Permission::all());
    }

    // Menambahkan permission baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
        ]);

        $permission = Permission::create($request->all());
        return response()->json(['message' => 'Permission created successfully', 'permission' => $permission], 201);
    }

    // Menghapus permission
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['message' => 'Permission deleted successfully']);
    }
}
