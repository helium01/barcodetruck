@extends('admin.layout')
@section('content')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
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
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                      <h4 class="font-weight-normal mb-3">Riwayat Permintaan <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                      </h4>
                      <h2 class="mb-5">15</h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                      <h4 class="font-weight-normal mb-3">Qr Code Scanner<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                      </h4>
                      <div id="reader" width="600px"></div>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="http://localhost:8000/assets/instascan.min.js"></script> --}}
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
    <script>
    function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  var jsonData = JSON.parse(decodedText);
  console.log(`Code matched = ${decodedText}`);
  var kodeUnit = jsonData[0].id_jenis;
    var namaKelompok = jsonData[0].nama_kelompok;
    var namaUnit = jsonData[0].nama_unit;
  window.location.href = `http://localhost:8000/admin/permintaan/show/data?kodeUnit=${kodeUnit}&namaKelompok=${namaKelompok}&namaUnit=${namaUnit}`;
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
    
            
@endsection
      