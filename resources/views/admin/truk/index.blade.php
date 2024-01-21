@extends('admin.layout')
@section('content')
        <!-- partial -->
        <div class="container mt-5">
            <h2>Daftar Truk</h2>
    
            <a href="/admin/truk/create" class="btn btn-success mb-3">Tambah Truk</a>
    
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Jenis</th>
                        <th>Nama Unit</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($truks as $truk)
                        <tr>
                            <td>{{ $truk->id }}</td>
                            <td>{{ $truk->nama_kelompok }}</td>
                            <td>{{ $truk->nama_unit }}</td>
                            <td>{{ $truk->deskripsi }}</td>
                            <td>
                                <a href="/admin/truk/{{$truk->id}}" class="btn btn-warning">Edit</a>
                                <form action="/admin/truk/{{$truk->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus truk ini?')">Delete</button>
                                </form>
                                <a href="/admin/truk/qrcode/{{$truk->id}}" class="btn btn-primary">View Qrcode</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
            
@endsection
      