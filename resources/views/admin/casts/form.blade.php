@extends('admin.layout')

@section('title', isset($cast) ? 'Edit Cast' : 'Tambah Cast')
@section('content')
    <h2>{{ isset($cast) ? 'Edit Cast' : 'Tambah Cast' }}</h2>

    <form action="{{ isset($cast)
            ? route('admin.casts.update', $cast)
            : route('admin.casts.store') }}"
          method="POST" class="mt-3">
        @csrf
        @if(isset($cast)) @method('PUT') @endif

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $cast->name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Umur</label>
            <input type="number" name="age" class="form-control"
                   value="{{ old('age', $cast->age ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control" rows="4" required>{{ old('bio', $cast->bio ?? '') }}</textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.casts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection