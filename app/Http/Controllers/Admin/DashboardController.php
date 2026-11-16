<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Film, Cast, Genre, Kritik, User};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'films'   => Film::count(),
            'casts'   => Cast::count(),
            'genres'  => Genre::count(),
            'kritiks' => Kritik::count(),
            'users'   => User::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}