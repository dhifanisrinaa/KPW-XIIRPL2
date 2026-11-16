<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::latest()->paginate(10);
        return view('admin.casts.index', compact('casts'));
    }

    public function create()
    {
        return view('admin.casts.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:45',
            'age'  => 'required|integer|min:1|max:150',
            'bio'  => 'required|string',
        ]);

        Cast::create($validated);

        return redirect()->route('admin.casts.index')
            ->with('success', 'Cast berhasil ditambahkan.');
    }

    public function edit(Cast $cast)
    {
        return view('admin.casts.form', compact('cast'));
    }

    public function update(Request $request, Cast $cast)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:45',
            'age'  => 'required|integer|min:1|max:150',
            'bio'  => 'required|string',
        ]);

        $cast->update($validated);

        return redirect()->route('admin.casts.index')
            ->with('success', 'Cast berhasil diperbarui.');
    }

    public function destroy(Cast $cast)
    {
        $cast->delete();
        return redirect()->route('admin.casts.index')
            ->with('success', 'Cast berhasil dihapus.');
    }
}