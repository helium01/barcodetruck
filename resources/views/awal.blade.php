<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Solarin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets')}}/assets/images/favicon.ico" />
    <style>
        body {
        margin: 0;
        padding: 0;
        background: url('http://localhost:8000/assets/assets/images/sawit.jpg') no-repeat center center fixed;
        background-size: cover;
        height: 100vh; /* Set tinggi body agar kontainer memenuhi tinggi layar */
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      
        <div class="d-flex align-items-center justify-content-center" ">
            <h1 class="text-center btn btn-primary" onclick="login()">Pengisian Bahan Bakar</h1>
          </div>
    </div>
    <h1>QR Code Scanner</h1>
    <video id="preview"></video>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://localhost:8000/assets/instascan.min.js"></script>
    {{-- <video id="preview"></video> --}}
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
    
    <script>
        function login(){
            window.location.href="/login";
        }
    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{asset('assets')}}/assets/vendors/js/vendor.bundle.base.js"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets')}}/assets/vendors/chart.js/Chart.min.js"></script>
    {{-- <script src="{{asset('assets')}}/assets/js/jquery.cookie.js" type="text/javascript"></script> --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('assets')}}/assets/js/hoverable-collapse.js"></script>
    {{-- <script src="{{asset('assets')}}/assets/js/misc.js"></script> --}}
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets')}}/assets/js/dashboard.js"></script>
    <script src="{{asset('assets')}}/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>