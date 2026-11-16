@extends('admin.layout')

@section('title', 'Edit Komentar')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Edit Komentar</h2>
        <a href="{{ route('admin.kritiks.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <form action="{{ route('admin.kritiks.update', $kritik) }}" method="POST" style="max-width: 800px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; display: block; margin-bottom: 5px;">User</label>
            <input type="text" class="form-control" value="{{ $kritik->user->name ?? 'Anonim' }}" disabled style="background: #e9ecef;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Film</label>
            <input type="text" class="form-control" value="{{ $kritik->film->title ?? '-' }}" disabled style="background: #e9ecef;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Rating (1-5)</label>
            <input type="number" name="rating" class="form-control" value="{{ old('rating', $kritik->rating) }}" min="1" max="5" required>
            @error('rating') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Isi Komentar</label>
            <textarea name="comment" class="form-control" rows="5" required>{{ old('comment', $kritik->comment) }}</textarea>
            @error('comment') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.kritiks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection