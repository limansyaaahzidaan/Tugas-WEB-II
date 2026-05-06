@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kostan</h1>
    <p><strong>Alamat:</strong> {{ $bangunan->alamat }}</p>
    <p><strong>Luas Kamar:</strong> {{ $bangunan->luas_kamar }}</p>
    <p><strong>Jenis Kamar:</strong> {{ $bangunan->jenis_kamar }}</p>
    <p><strong>Is Full:</strong> {{ $bangunan->is_full ? 'Ya' : 'Tidak' }}</p>
    <p><strong>Harga:</strong> {{ number_format($bangunan->harga, 0, ',', '.') }}</p>
    <a href="{{ route('bangunan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection