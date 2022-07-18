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
            <li class="menu-item">
              <a href="/penghuni/kamar" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-door-open"></i>
                <div data-i18n="Basic">Semua Kamar</div>
              </a>
            </li>
            <li class="menu-item">
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
            <li class="menu-item active">
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
              <h4 class="fw-bold py-3 mb-4">Riwayat Penyewaan Indekos</h4>

              <!-- Hoverable Table rows -->
              <div class="card">
                  <div class="row">
                      <div class="col-6 col-md-6 col-sm-12">
                          <h5 class="card-header">Riwayat Penyewaan</h5>
                      </div>
                  </div>
                <div class="table-responsive text-nowrap p-3">
                  <table class="table table-hover table-borderless" id="datatabel">
                    <thead>
                      <tr>
                        <th>Nama Kamar</th>
                        <th>Mulai Sewa</th>
                        <th>Tipe Pembayaran</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($datatransaksi as $transaksi)
                        <tr>
                          <td><strong>{{$transaksi->nama_kamar}}</strong></td>
                          <td>{{$transaksi->mulai_sewa}}</td>
                          <td>{{$transaksi->tipe_pembayaran}}</td>
                          <td class="text-wrap">{{$transaksi->kode_transaksi}}</td>
                          <td>{{$transaksi->tanggal_transaksi}}</td>
                          <td>
                            @if ($transaksi->statustransaksi == 'settlement')
                              <span class="badge bg-label-primary me-1">{{$transaksi->statustransaksi}}</span>
                            @else
                              <span class="badge bg-label-warning me-1">{{$transaksi->statustransaksi}}</span>
                            @endif
                          </td>
                        </tr>
                      @endforeach                   
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
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
        $(document).ready(function() {
            $('#datatabel').DataTable( {
                // "paging":   false,
                "ordering": false,
                // "info":     false
            } );
        } );
    </script>
  </body>
</html>
