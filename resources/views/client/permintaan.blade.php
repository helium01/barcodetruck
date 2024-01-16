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
              <div class="container mt-5">
                <h2>Form Permintaan</h2>
                
                <!-- Formulir dengan Bootstrap -->
                <form method="post" action="/admin/permintaan">
                  @csrf <!-- Token CSRF Laravel -->
                  
                  <!-- Input Tanggal -->
                  <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                  </div>
                  
                  <!-- Input Kode Unit -->
                  <div class="form-group">
                    <label for="kode_unit">Kode Unit:</label>
                <select class="form-control" id="id_jenis" name="kode_unit" required>
                    @foreach($unit as $j)
                        <option value="{{ $j->id }}">{{ $j->nama_unit }}</option>
                    @endforeach
                </select>
                  </div>
              
                  <!-- Input Afdeling -->
                  <div class="form-group">
                    <label for="afdeling">Afdeling:</label>
                    <input type="text" class="form-control" id="afdeling" name="afdeling" required>
                  </div>
              
                  <!-- Input KM Awal -->
                  <div class="form-group">
                    <label for="km_awal">KM Awal:</label>
                    <input type="number" class="form-control" id="km_awal" name="km_awal" required>
                  </div>
              
                  <!-- Input KM Akhir -->
                  <div class="form-group">
                    <label for="km_akhir">KM Akhir:</label>
                    <input type="number" class="form-control" id="km_akhir" name="km_akhir" required>
                  </div>
              
                  <!-- Input Selisih -->
                  <div class="form-group">
                    <label for="selisih">Selisih:</label>
                    <input type="number" class="form-control" id="selisih" name="selisih" required>
                  </div>
              
                  <!-- Input Rasio -->
                  <div class="form-group">
                    <label for="rasio">Rasio:</label>
                    <input type="number" class="form-control" id="rasio" name="rasio" required>
                    <input type="hidden" class="form-control" id="rasio" name="status" required value="pending">
                  </div>
              
                  <!-- Tombol Submit -->
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
             
              
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
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
            
@endsection
      