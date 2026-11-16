<!DOCTYPE html>
<html lang="en">
<head>
    <title>ONE Movies</title>
    <!-- CSS Template -->
    @include('templates.component.head')
    @stack('style')
</head>
<body>
    <!-- Header & Navbar -->
    @include('templates.component.header')
    @include('templates.component.navbar')

    <!-- Konten Utama -->
    @yield('content')

    <!-- Footer -->
    @include('templates.component.footer')

    <!-- Javascript Template -->
    @stack('scripts')
</body>
</html>