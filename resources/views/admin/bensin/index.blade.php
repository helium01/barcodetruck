@extends('admin.layout')
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
                        <div class="form-group">
                          <label for="kodeUnit">Kode Unit:</label>
                          <input type="text" class="form-control" id="kodeUnit" placeholder="Masukkan Kode Unit" value="{{$data[0]->kode_unit}}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="namaUnit">Nama Unit:</label>
                          <input type="text" class="form-control" id="namaUnit" placeholder="Masukkan Nama Unit" value="{{$data[0]->nama_unit}}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="namaKelompok">Nama Kelompok:</label>
                          <input type="text" class="form-control" id="namaKelompok" placeholder="Masukkan Nama Kelompok" value="{{$data[0]->nama_kelompok}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namaUnit">km awal:</label>
                            <input type="text" class="form-control" id="namaUnit" placeholder="Masukkan Nama Unit" value="{{$data[0]->km_awal}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="namaUnit">km akhir:</label>
                            <input type="text" class="form-control" id="namaUnit" placeholder="Masukkan Nama Unit" value="{{$data[0]->km_akhir}}" readonly>
                          </div>
                        <form action="/admin/permintaan/acc/{{$data[0]->id}}" method="get">
                            <div class="form-group">
                                <label for="namaUnit">Km Awal Gudang:</label>
                                <input type="text" class="form-control" name="km_awal" id="km_awal" placeholder="Masukkan Nama Unit" value="{{$data[0]->km_awal}}">
                              </div>
                              <div class="form-group">
                                <label for="namaUnit">Km Akhir Gudang:</label>
                                <input type="text" class="form-control" name="km_akhir" id="km_akhir" placeholder="Masukkan Nama Unit">
                              </div>
                              <div class="form-group">
                                <label for="namaUnit">Selisih Gudang:</label>
                                <input type="text" class="form-control" name="selisih" id="selisih" placeholder="Masukkan Nama Unit" readonly>
                              </div>
                              <div class="form-group">
                                <label for="jumlahBensin">Jumlah Bensin yang Diinginkan:</label>
                                <input type="text" class="form-control" id="jumlahBensin" placeholder="Masukkan Jumlah Bensin" value="{{$data[0]->selisih-$data[0]->rasio}} liter" readonly>
                              </div>
                              <div class="form-group">
                                <label for="jumlahBensin">Jumlah Bensin yang Diterima:</label>
                                <input type="text" class="form-control" id="jumlahBensin" placeholder="Masukkan Jumlah Bensin" value="{{$data[0]->selisih-$data[0]->rasio}} liter" readonly>
                              </div>
                              <button class="btn btn-primary" type="submit">Acc</button>
                        </form>
                  </div>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
              $(document).ready(function() {
                  // Fungsi untuk menghitung selisih
                  function hitungSelisih() {
                      var kmAwal = parseFloat($('#km_awal').val()) || 0;
                      var kmAkhir = parseFloat($('#km_akhir').val()) || 0;
  
                      // Hitung selisih dan atur nilai ke input Selisih
                      var selisih = kmAkhir - kmAwal;
                      if (selisih<=0){
                        selisih=0;
                      }
                      $('#selisih').val(selisih);
                  }
  
                  // Panggil fungsi hitungSelisih saat nilai KM Awal atau KM Akhir berubah
                  $('#km_awal, #km_akhir').on('input', function() {
                      hitungSelisih();
                  });
              });
          </script>
            
                  
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
      