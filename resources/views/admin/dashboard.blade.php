@extends('admin.layout')

@section('title', 'Dashboard')
@section('content')
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>

    <div class="row" style="margin-top:20px;">
        @foreach([
            'films' => ['Film', 'primary'],
            'casts' => ['Cast', 'success'],
            'genres' => ['Genre', 'warning'],
            'kritiks' => ['Komentar', 'info'],
            'users' => ['User', 'secondary'],
        ] as $key => $item)
            <div class="col-md-2 mb-3">
                <div class="card text-white bg-{{ $item[1] }}">
                    <div class="card-body text-center">
                        <h1 class="mb-0">{{ $stats[$key] }}</h1>
                        <small>{{ $item[0] }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection