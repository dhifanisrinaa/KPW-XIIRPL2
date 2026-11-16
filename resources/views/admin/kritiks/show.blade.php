@extends('admin.layout')

@section('title', 'Detail Komentar')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Detail Komentar</h2>
        <a href="{{ route('admin.kritiks.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <table style="width: 100%; max-width: 800px;">
        <tr>
            <th width="200">ID Komentar</th>
            <td>{{ $kritik->id }}</td>
        </tr>
        <tr>
            <th>User</th>
            <td>
                <strong>{{ $kritik->user->name ?? 'Anonim' }}</strong> <br>
                <small style="color: #6c757d;">{{ $kritik->user->email ?? '-' }}</small>
            </td>
        </tr>
        <tr>
            <th>Film</th>
            <td>{{ $kritik->film->title ?? '-' }}</td>
        </tr>
        <tr>
            <th>Rating</th>
            <td>
                <span style="color: #ffc107; font-weight: bold; font-size: 18px;">
                    ★ {{ $kritik->rating }}/5
                </span>
            </td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $kritik->created_at->format('d F Y, H:i') }} WIB</td>
        </tr>
        <tr>
            <th>Isi Komentar</th>
            <td>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; border: 1px solid #dee2e6;">
                    {{ $kritik->comment }}
                </div>
            </td>
        </tr>
    </table>

    <div style="margin-top: 30px;">
        <form action="{{ route('admin.kritiks.destroy', $kritik) }}" method="POST" onsubmit="return confirm('Hapus komentar ini?')">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Hapus Komentar Ini</button>
        </form>
    </div>
@endsection