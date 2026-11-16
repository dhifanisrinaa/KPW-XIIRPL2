@extends('templates.index')

@section('content')
<div class="container" style="margin-top: 50px; margin-bottom: 50px; min-height: 500px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="background: #fff; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            
            {{-- Form Login --}}
            <h3 style="margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px;">Login to your account</h3>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <hr style="margin: 30px 0;">
            <p class="text-center">
                Belum punya akun? 
                <a href="#" data-toggle="modal" data-target="#myModal" style="font-weight: bold;">
                    Daftar / Register di sini
                </a>
            </p>
        </div>
    </div>
</div>
@endsection