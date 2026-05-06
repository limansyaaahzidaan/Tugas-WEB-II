@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kostan</h1>
    <form action="{{ route('bangunan.update', $bangunan) }}" method="POST">
        @csrf
        @method('PUT')
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
            <input type="text" name="alamat" value="{{ old('alamat', $bangunan->alamat) }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Luas Kamar</label>
            <input type="number" step="0.01" name="luas_kamar" value="{{ $bangunan->luas_kamar }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Kamar</label>
            <select name="jenis_kamar" class="form-control" required>
                <option value="campuran" {{ old('jenis_kamar', $bangunan->jenis_kamar) == 'campuran' ? 'selected' : '' }}>Campuran</option>
                <option value="putra" {{ old('jenis_kamar', $bangunan->jenis_kamar) == 'putra' ? 'selected' : '' }}>Putra</option>
                <option value="putri" {{ old('jenis_kamar', $bangunan->jenis_kamar) == 'putri' ? 'selected' : '' }}>Putri</option>
            </select>
        </div>
        <div class="form-group">
            <label>Is Full</label>
            <input type="hidden" name="is_full" value="0">
            <input type="checkbox" name="is_full" value="1" {{ old('is_full', $bangunan->is_full) ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $bangunan->harga }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection