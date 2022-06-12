<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Struk Bukti Pembayaran Vinokost | {{$detailtransaksi->nama_kamar}} - {{$detailtransaksi->nama_user}}</title>

    <meta name="description" content="" />

    <style !important>
        @page {
            size: 10cm 25cm;
            margin: 5mm 5mm 5mm 5mm; /* change the margins as you want them to be. */
        }
       
    </style>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('theme/assets/img/logo.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('theme/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('theme/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('theme/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('theme/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('theme/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('theme/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('theme/assets/js/config.js')}}"></script>
</head>
<body>
    <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-3 text-center">
                        <img src="{{asset('theme/assets/img/logo-vertical.png')}}" alt="" class="w-50 h-50">
                        <h4 class="fw-bold my-3">Struk Pembayaran Vinokost</h4>
                        <h6 class="fw-bold">Jl. Sunan Kalijaga No.16, Lowokwaru Malang</h6>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-9">
                        
                        <div class="row">
                            <dl class="row mt-2">
                                <span class="text-muted mb-3">{{$detailtransaksi->tanggal_transaksi}}</span>
                                <dt class="col-sm-3">Kode Transaksi</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->kode_transaksi}}</p></dd>

                                <dt class="col-sm-3">Tipe Pembayaran</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->tipe_pembayaran}}</p></dd>

                                <dt class="col-sm-3">Nama Kamar</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->nama_kamar}}</p></dd>

                                <dt class="col-sm-3">Waktu Penyewaan</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->mulai_sewa}} s/d {{$detailtransaksi->akhir_sewa}}</p></dd>
                                
                                <dt class="col-sm-3">Nama Penghuni</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->nama_user}}</p></dd>

                                <dt class="col-sm-3">Alamat</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->alamat}}</p></dd>

                                <dt class="col-sm-3">No. Telepon</dt>
                                <dd class="col-sm-9"><p>{{$detailtransaksi->no_telepon}}</p></dd>
<img src="{{asset('theme/assets/img/stampel-struk.png')}}" alt="" style="width: 300px; height: 150px;" class="mt-0 pt-0">
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
    </div>




    <script src="{{asset('theme/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('theme/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('theme/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('theme/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> -->
    <!-- Vendors JS -->
    <script src="{{asset('theme/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('theme/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('theme/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        window.print();

        window.onafterprint = function(){
            window.location.href = "/admin/transaksi";
        }
    </script>
</body>
</html>