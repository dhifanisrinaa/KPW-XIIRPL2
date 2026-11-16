@extends('admin.layout')

@section('title', isset($film) ? 'Edit Film' : 'Tambah Film')
@section('content')
    <h2>{{ isset($film) ? 'Edit Film' : 'Tambah Film' }}</h2>

    <form action="{{ isset($film)
            ? route('admin.films.update', $film)
            : route('admin.films.store') }}"
          method="POST" class="mt-3">
        @csrf
        @if(isset($film)) @method('PUT') @endif

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $film->title ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="4" required>{{ old('sinopsis', $film->sinopsis ?? '') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tahun</label>
                <input type="number" name="year" class="form-control"
                       value="{{ old('year', $film->year ?? date('Y')) }}" required>
            </div>
            <div class="form-group col-md-6">
                <label>Genre</label>
                <select name="genre_id" class="form-control">
                    <option value="">- Pilih Genre -</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}"
                            {{ old('genre_id', $film->genre_id ?? '') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Poster (path, contoh: images/poster1.jpg)</label>
            <input type="text" name="poster" class="form-control"
                   value="{{ old('poster', $film->poster ?? '') }}" required>
            <small class="text-muted">
                Setelah Batch 4, path akan berubah jadi <code>storage/posters/...</code>.
            </small>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.films.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection