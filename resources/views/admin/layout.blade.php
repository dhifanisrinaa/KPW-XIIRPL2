<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <!-- Gunakan Bootstrap Murni -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* Paksa tabel kembali normal */
        table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
        th, td { padding: 12px; border: 1px solid #dee2e6; vertical-align: middle !important; text-align: left; }
        thead th { background-color: #343a40; color: white; }
        
        /* Paksa pagination agar rapi di tengah dan ikon panah kecil */
        nav[role="navigation"] { display: flex; justify-content: center; margin-top: 20px; }
        nav[role="navigation"] svg { width: 16px !important; height: 16px !important; display: inline-block; }
        nav[role="navigation"] span, nav[role="navigation"] a { padding: 8px 12px; border: 1px solid #ddd; margin: 0 2px; display: inline-block; }

         /* Memperbaiki desain Pagination agar rapi dan modern */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
            gap: 5px;
            margin-top: 20px;
        }
        .pagination li {
            display: inline;
        }
        .pagination li a, 
        .pagination li span {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .pagination li.active span {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination li.disabled span {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
        .pagination li a:hover {
            color: #0056b3;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        /* Menghilangkan tulisan "Showing 1 to 10 of..." yang berantakan */
        .pagination + div, 
        .pagination-container p {
            display: none !important;
        }
    </style>
</head>
<body style="background:#f4f6f9; font-family: Arial, sans-serif;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.films.index') }}">Film</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.casts.index') }}">Cast</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.genres.index') }}">Genre</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.kritiks.index') }}">Komentar</a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" target="_blank">Lihat Situs</a></li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="border:none;background:none;">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top:30px; background: white; padding: 20px; border-radius: 5px;">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>