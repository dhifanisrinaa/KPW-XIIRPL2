@extends('admin.layout')

@section('title', isset($genre) ? 'Edit Genre' : 'Tambah Genre')
@section('content')
    <h2>{{ isset($genre) ? 'Edit Genre' : 'Tambah Genre' }}</h2>

    <form action="{{ isset($genre)
            ? route('admin.genres.update', $genre)
            : route('admin.genres.store') }}"
          method="POST" class="mt-3">
        @csrf
        @if(isset($genre)) @method('PUT') @endif

        <div class="form-group">
            <label>Nama Genre</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $genre->name ?? '') }}" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.genres.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection