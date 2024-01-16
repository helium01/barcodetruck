<!-- resources/views/admin/jenis/create.blade.php -->

@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Jenis</h2>

    <form action="/admin/jenis/{{$jenis->id}}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="nama_kelompok">Nama Kelompok:</label>
            <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" value="{{ $jenis->nama_kelompok }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $jenis->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
</div>
@endsection
