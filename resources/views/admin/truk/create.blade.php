<!-- resources/views/admin/jenis/create.blade.php -->

@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Tambah Truk</h2>

    <form action="/admin/truk" method="post">
        @csrf

        <div class="form-group">
            <label for="id_jenis">ID Jenis:</label>
                <select class="form-control" id="id_jenis" name="id_jenis" required>
                    @foreach($jenis as $j)
                        <option value="{{ $j->id }}">{{ $j->nama_kelompok }}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="nama_unit">Nama Unit:</label>
            <input type="text" class="form-control" id="nama_unit" name="nama_unit" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
@endsection
