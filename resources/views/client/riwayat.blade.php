@extends('client.layout')
@section('content')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title">
                  <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                  </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="row">
                <div class="container mt-5">
                    <h2>Daftar Permintaan</h2>
                    
                    <table class="table table-bordered" id="permintaanTable">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tanggal</th>
                          <th>Kode Unit</th>
                          <th>Afdeling</th>
                          <th>KM Awal</th>
                          <th>KM Akhir</th>
                          <th>Selisih</th>
                          <th>Rasio</th>
                          <th>status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($permintaans as $permintaan)
                            <tr>
                                <td>{{ $permintaan->id }}</td>
                                <td>{{ $permintaan->tanggal }}</td>
                                <td>{{ $permintaan->kode_unit }}</td>
                                <td>{{ $permintaan->afdeling }}</td>
                                <td>{{ $permintaan->km_awal }}</td>
                                <td>{{ $permintaan->km_akhir }}</td>
                                <td>{{ $permintaan->selisih }}</td>
                                <td>{{ $permintaan->rasio }}</td>
                                <td>
                                  {{ $permintaan->status }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                  
                  <!-- Script Bootstrap JS dan jQuery --> 
                  
                  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                  
                  <!-- Script DataTables -->
                  <script src="https://cdn.datatables.net/1.11.8/js/jquery.dataTables.min.js"></script>
                  <script src="https://cdn.datatables.net/1.11.8/js/dataTables.bootstrap4.min.js"></script>
                  
                  <!-- Inisialisasi DataTables -->
                 
              </div>
             
              
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            
@endsection
      