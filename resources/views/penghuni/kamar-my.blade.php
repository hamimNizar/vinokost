<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Vinokost | Sistem Pengelolaan Indekos ~ Kota Malang</title>

    <meta name="description" content="" />

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

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('theme/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('theme/assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/penghuni" class="app-brand-link">
              <img src="{{asset('theme/assets/img/logo-horizontal.png')}}" alt="" style="width: 200px; height: 100px;">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item ">
              <a href="/penghuni" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menus</span>
            </li>
            <li class="menu-item ">
              <a href="/penghuni/kamar" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-door-open"></i>
                <div data-i18n="Basic">Semua Kamar</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="/penghuni/kamar-saya" class="menu-link">
                <i class="menu-icon tf-icons bx bx-door-open"></i>
                <div data-i18n="Basic">Kamar Saya</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="/penghuni/tagihan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Basic">Tagihan</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="/penghuni/riwayat" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Basic">Riwayat Sewa</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <span class="mb-0 text-capitalize fw-bold">Sistem Pengelolaan Indekos Vinokost</span>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ session()->get('nama_penghuni') }}</span>
                        <small class="text-muted">Penghuni</small>
                    </div>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('theme/assets/img/avatars/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset('theme/assets/img/avatars/user.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ session()->get('nama_penghuni') }}</span>
                            <small class="text-muted">Penghuni</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/penghuni/profil">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/penghuni/logout">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penyewaan</span> Kamar Saya</h4>
                <div class="row">
                  @if ($datasewa)
                    <div class="col-lg-6 col-sm-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Data Penyewaan Kamar</h5>
                            <div class="card-body">
                                <small class="text-light fw-semibold">{{$datasewa->tanggal_sewa}}</small>
                                <dl class="row mt-2">
                                    <dt class="col-sm-3">Nama Kamar</dt>
                                    <dd class="col-sm-9"><p>{{$datasewa->nama_kamar}}</p></dd>

                                    <dt class="col-sm-3">Mulai Sewa</dt>
                                    <dd class="col-sm-9"><p>{{$datasewa->mulai_sewa}}</p></dd>

                                    <dt class="col-sm-3">Akhir Sewa</dt>
                                    <dd class="col-sm-9"><p>{{$datasewa->akhir_sewa}}</p></dd>

                                    <dt class="col-sm-3">Sisa Hari Penyewaan</dt>
                                    <dd class="col-sm-9">
                                        <?php
                                            $datetime1 = date_create(date('Y-m-d'));
                                            $datetime2 = date_create($datasewa->akhir_sewa);
                                            //hitung jarak tanggal sewa
                                            $interval = date_diff($datetime2, $datetime1);
                                        ?>
                                        <p><span class="badge bg-label-dark">{{ $interval->format('%R %m bulan %d hari') }}</span></p>
                                    </dd>
                                    <!-- <dt class="col-sm-3 text-truncate">Status</dt>
                                    <dd class="col-sm-9">
                                        <p><span class="badge bg-primary">{{$datasewa->keterangan}}</span></p>
                                    </dd> -->
                                    <hr class="my-3">
                                    <!-- Disini dilakukan pengecekan jika value keterangan diingatkan 
                                    maka muncul select option untuk penghuni memilih apakah sewa diperpanjang atau berhenti
                                    form akan mengarah ke patch /kamar-saya/konfirmasi/{id} -->
                                    @if ($datasewa->keterangan == 'Diingatkan')
                                    <span class="text-light fw-semibold">Silakan konfirmasi apakah ingin melanjutkan sewa atau berhenti</span>
                                    <form method="POST" action="{{ url('/penghuni/kamar-saya/konfirmasi/' . $datasewa->id_penyewaan) }}" method="post" class="d-inline">
                                    @method('patch')
                                    @csrf
                                        <dt class="col-sm-3 mt-3">Kelanjutan Sewa</dt>
                                        <dd class="col-sm-9 mt-3">
                                            <select id="keterangan" name="keterangan" class="form-select">
                                                <option value="Lanjut Sewa">Lanjut Sewa</option>
                                                <option value="Berhenti Sewa">Berhenti Sewa</option>
                                            </select>
                                        </dd>
                                        <dt class="col-sm-12 mt-3">
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" name="akunvalidasi" id="akunvalidasi" required="">
                                              <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi keterangan sewa tersebut</label>
                                            </div>
                                        </dt>
                                        <dd class="col-sm-12 mt-3"><button class="btn btn-primary float-start" type="submit">Konfirmasi</button></dd>
                                    </form>
                                    @else
                                        <h6 class="mt-3"><span>Masa Sewa Masih lama. Terus pantau untuk mengkonfirmasi kelanjutan penyewaan indekos !</span></h6>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                    Foto Kamar
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <img src="/gambar/kamar/202205060241603c48b820169f70641963ba_wp2001489.jpg" alt="" class="img-fluid" style="object-fit: fill;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @else
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <h5 class="card-header">Kamar yang anda Sewa</h5>
                            <div class="card-body">
                              <p><span class="text-bold">Belum ada kamar yang anda sewa. Tunggu pengelola indekos untuk input penyewaan kamar anda!</span></p>
                            </div>
                        </div>
                    </div>
                  @endif
                    
                </div>
              
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ??
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ?????? by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">AdminVinokost</a>
                </div>
                <!-- <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div> -->
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

    
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @if (session()->has('pesanlogin'))
    <div class="bs-toast toast fade show bg-secondary" style="position: absolute; top: 30px; right: 30px;" id="autotoast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Vinokost</div>
            <!-- <small>11 mins ago</small> -->
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('pesanlogin') }}
        </div>
    </div>
    @endif

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('theme/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('theme/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('theme/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('theme/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('theme/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('theme/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('theme/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        $("#autotoast").fadeTo(2000, 500).slideUp(500, function(){
        $("#autotoast").slideUp(500);
        })
    </script>
  </body>
</html>
