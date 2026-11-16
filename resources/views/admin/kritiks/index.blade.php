@extends('admin.layout')

@section('title', 'Kelola Komentar')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Kelola Komentar</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>User</th>
                <th>Film</th>
                <th>Komentar</th>
                <th width="70">Rating</th>
                <th>Tanggal</th>
                <th width="100">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kritiks as $kritik)
                <tr>
                    <td>{{ $kritik->id }}</td>
                    <td>{{ $kritik->user->name ?? 'Anonim' }}</td>
                    <td>{{ $kritik->film->title ?? '-' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($kritik->comment, 60) }}</td>
                    <td>
                        <span style="color: #ffc107; font-weight: bold;">
                            ★ {{ $kritik->rating }}/5
                        </span>
                    </td>
                    <td>{{ $kritik->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('admin.kritiks.destroy', $kritik) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus komentar ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align: center;">Belum ada komentar.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Container untuk pagination --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
        <div>
            <span style="color: #6c757d; font-size: 14px;">
                Menampilkan {{ $kritiks->firstItem() }} - {{ $kritiks->lastItem() }} dari {{ $kritiks->total() }} komentar
            </span>
        </div>
        <div>
            {{ $kritiks->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection