@extends('admin.layout')
@section('content')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            
              <div class="row">
                <div class="container mt-5">
                    <h2>Daftar Jenis</h2>
            
                    <a href="/admin/jenis/create" class="btn btn-success mb-3">Tambah Jenis</a>
            
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kelompok</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jeniss as $jenis)
                                <tr>
                                    <td>{{ $jenis->id }}</td>
                                    <td>{{ $jenis->nama_kelompok }}</td>
                                    <td>{{ $jenis->deskripsi }}</td>
                                    <td>
                                        <a href="/admin/jenis/{{$jenis->id}}" class="btn btn-warning">Edit</a>
                                        <form action="/admin/jenis/{{$jenis->id}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jenis ini?')">Delete</button>
                                        </form>
                                        <a href="/admin/jenis/qrcode/{{$jenis->id}}" class="btn btn-primary">View Qrcode</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
              </div>
             
              
            </div>
            
@endsection
      