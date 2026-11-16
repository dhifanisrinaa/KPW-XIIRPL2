<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kritik;

class KritikController extends Controller
{
    public function index()
    {
        $kritiks = Kritik::with(['user', 'film'])->latest()->paginate(15);
        return view('admin.kritiks.index', compact('kritiks'));
    }

    public function destroy(Kritik $kritik)
    {
        $kritik->delete();
        return redirect()->route('admin.kritiks.index')
            ->with('success', 'Komentar berhasil dihapus.');
    }
}