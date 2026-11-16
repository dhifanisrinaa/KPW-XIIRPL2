@extends('admin.layout')

@section('title', 'Kelola Cast')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Kelola Cast</h2>
        <a href="{{ route('admin.casts.create') }}" class="btn btn-primary">Tambah Cast</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nama Aktor</th>
                <th width="80">Umur</th>
                <th>Bio</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($casts as $cast)
                <tr>
                    <td>{{ $cast->id }}</td>
                    <td>{{ $cast->name }}</td>
                    <td>{{ $cast->age }} thn</td>
                    <td>{{ \Illuminate\Support\Str::limit($cast->bio, 80) }}</td>
                    <td>
                        <a href="{{ route('admin.casts.edit', $cast) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.casts.destroy', $cast) }}"
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('Hapus cast ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="text-align: center;">Belum ada data cast.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Container untuk pagination --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
        <div>
            <span style="color: #6c757d; font-size: 14px;">
                Menampilkan {{ $casts->firstItem() }} - {{ $casts->lastItem() }} dari {{ $casts->total() }} cast
            </span>
        </div>
        <div>
            {{ $casts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection