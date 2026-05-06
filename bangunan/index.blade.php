@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Kostan</h1>
    <a href="{{ route('bangunan.create') }}" class="btn btn-primary">Tambah Kostan</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alamat</th>
                <th>Luas Kamar</th>
                <th>Jenis Kamar</th>
                <th>Is Full</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bangunan as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->alamat }}</td>
                <td>{{ $b->luas_kamar }}</td>
                <td>{{ $b->jenis_kamar }}</td>
                <td>{{ $b->is_full ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $b->harga }}</td>
                <td>
                    <a href="{{ route('bangunan.show', $b) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('bangunan.edit', $b) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bangunan.destroy', $b) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection