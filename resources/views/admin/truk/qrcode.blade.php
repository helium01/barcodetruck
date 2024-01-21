@extends('admin.layout')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            
              <div class="row">
                <div class="container mt-5">
                    <h2>Daftar Truk</h2>
            
                    <div id="qrcode" class="mx-auto d-block mt-5" align="center"></div>
                </div>
                
              </div>
             
              
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var qrCodeValue = {!!json_encode($jeniss)!!}
                    var jsonString = JSON.stringify(qrCodeValue);
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: jsonString,
                        width: 300,
                        height: 300
                    });
            
                    // Tambahkan ikon setelah QR code dibuat
                    qrcode.makeCode(jsonString);
            
                    // Tunggu sebentar agar QR code dapat dirender dengan baik
                    setTimeout(function() {
                        // Dapatkan data URL dari elemen canvas QR code
                        var canvasDataUrl = document.getElementById("qrcode").getElementsByTagName("canvas")[0].toDataURL();
            
                        // Buat elemen img untuk ikon
                        var iconImg = new Image();
                        iconImg.src = "localhost:8000/assets/assets/images/tukang.png"; // Ganti dengan path ikon Anda
                        iconImg.width = 40; // Sesuaikan ukuran ikon
                            iconImg.height = 40;
                        iconImg.onload = function() {
                            // Gunakan html2canvas untuk menggabungkan QR code dan ikon
                            html2canvas(document.getElementById("qrcode")).then(function(canvas) {
                                var ctx = canvas.getContext("2d");
            
                                // Tentukan posisi ikon (di tengah)
                                var iconX = (canvas.width - iconImg.width) / 2;
                                var iconY = (canvas.height - iconImg.height) / 2;
            
                                // Gambar QR code ke canvas
                                ctx.drawImage(iconImg, iconX, iconY);
                                
                                // Tampilkan hasilnya
                                document.body.appendChild(canvas);
                            });
                        };
                    }, 100);
                });
            </script>
            
@endsection
      