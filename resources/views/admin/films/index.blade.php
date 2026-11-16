@extends('admin.layout')

@section('title', 'Kelola Film')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Kelola Film</h2>
        <a href="{{ route('admin.films.create') }}" class="btn btn-primary">Tambah Film</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Judul</th>
                <th>Genre</th>
                <th width="80">Tahun</th>
                <th width="100">Poster</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($films as $film)
                <tr>
                    <td>{{ $film->id }}</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->genre->name ?? '-' }}</td>
                    <td>{{ $film->year }}</td>
                    <td>
                        <img src="{{ asset($film->poster) }}" alt="Poster" 
                             style="width: 60px; height: 90px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="{{ route('admin.films.edit', $film) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.films.destroy', $film) }}"
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('Hapus film ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align: center;">Belum ada film.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Container untuk pagination --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
        <div>
            <span style="color: #6c757d; font-size: 14px;">
                Menampilkan {{ $films->firstItem() }} - {{ $films->lastItem() }} dari {{ $films->total() }} film
            </span>
        </div>
        <div>
            {{ $films->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection