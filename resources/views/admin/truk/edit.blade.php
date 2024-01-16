<!-- resources/views/admin/jenis/create.blade.php -->

@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Truk</h2>

    <form action="/admin/truk/{{$truk->id }}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="id_jenis">ID Jenis:</label>
            <input type="text" class="form-control" id="id_jenis" name="id_jenis" value="{{ $truk->id_jenis }}" required>
        </div>

        <div class="form-group">
            <label for="nama_unit">Nama Unit:</label>
            <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="{{ $truk->nama_unit }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $truk->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
</div>
@endsection
