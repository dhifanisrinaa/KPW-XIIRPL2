<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Film, Genre};
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->latest()->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.films.form', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string',
            'sinopsis' => 'required|string',
            'year'     => 'required|integer|min:1900|max:2100',
            'poster'   => 'required|string',
            'genre_id' => 'nullable|exists:genres,id',
        ]);

        Film::create($validated);

        return redirect()->route('admin.films.index')
            ->with('success', 'Film berhasil ditambahkan.');
    }

    public function edit(Film $film)
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.films.form', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'title'    => 'required|string',
            'sinopsis' => 'required|string',
            'year'     => 'required|integer|min:1900|max:2100',
            'poster'   => 'required|string',
            'genre_id' => 'nullable|exists:genres,id',
        ]);

        $film->update($validated);

        return redirect()->route('admin.films.index')
            ->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('admin.films.index')
            ->with('success', 'Film berhasil dihapus.');
    }
}