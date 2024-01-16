<!-- resources/views/admin/jenis/create.blade.php -->

@extends('admin.layout')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Jenis</h2>

        <form action="/admin/jenis" method="post">
            @csrf

            <div class="form-group">
                <label for="nama_kelompok">Nama Kelompok:</label>
                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" required>
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
