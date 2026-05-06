@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kostan</h1>
    <form action="{{ route('bangunan.store') }}" method="POST">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
        </div>
        <div class="form-group">
            <label>Luas Kamar</label>
            <input type="number" step="0.01" name="luas_kamar" class="form-control" value="{{ old('luas_kamar') }}" required>
        </div>
        <div class="form-group">
            <label>Jenis Kamar</label>
            <select name="jenis_kamar" class="form-control" required>
                <option value="campuran" {{ old('jenis_kamar') == 'campuran' ? 'selected' : '' }}>Campuran</option>
                <option value="putra" {{ old('jenis_kamar') == 'putra' ? 'selected' : '' }}>Putra</option>
                <option value="putri" {{ old('jenis_kamar') == 'putri' ? 'selected' : '' }}>Putri</option>
            </select>
        </div>
        <div class="form-group">
            <label>Is Full</label>
            <input type="hidden" name="is_full" value="0">
            <input type="checkbox" name="is_full" value="1" {{ old('is_full') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection