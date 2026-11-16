@extends('admin.layout')

@section('title', 'Kelola Genre')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Kelola Genre</h2>
        <a href="{{ route('admin.genres.create') }}" class="btn btn-primary">Tambah Genre</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nama Genre</th>
                <th>Jumlah Film</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <span class="badge badge-info" style="background-color: #17a2b8; color: white; padding: 5px 10px; border-radius: 4px;">
                            {{ $genre->films_count }} Film
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.genres.edit', $genre) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.genres.destroy', $genre) }}"
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('Hapus genre ini? Film terkait akan kehilangan genre.')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align: center;">Belum ada data genre.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Container untuk pagination --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
        <div>
            <span style="color: #6c757d; font-size: 14px;">
                Menampilkan {{ $genres->firstItem() }} - {{ $genres->lastItem() }} dari {{ $genres->total() }} genre
            </span>
        </div>
        <div>
            {{ $genres->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection