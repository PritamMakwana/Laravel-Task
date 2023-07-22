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
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title') | {{ config('app.name', 'Admin') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://quantumitinnovation.com/assets/images/logo/logo.png"  />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js')}}" ></script>

  </head>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar ">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('/dashboard')}}"  class="app-brand-link">

                <img src="https://quantumitinnovation.com/assets/images/logo/logo.png" alt="Logo" height= "50" />
              <!-- </span> -->
              <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> -->
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{Request::is('dashboard') ? 'active':''}} {{Request::is('/') ? 'active':''}}">
              <a href="{{url('/dashboard')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard </div>
              </a>
            </li>

            <li class="menu-item {{Request::is('payment*') ? 'active':''}} ">
              <a href="{{url('/payment')}}" class="menu-link">
              <i class='menu-icon tf-icons bx bx-wallet-alt'></i>
                <div>Payment</div>
              </a>
           </li>

<!-- lead management -->
            {{-- <li class="menu-item
            <?php
             echo $cpage=='lead.php'? 'active':'';
             echo $cpage=='lead-add.php'? 'active':'';
             echo $cpage=='lead-view.php'? 'active':'';
             echo $cpage=='lead-edit.php'? 'active':'';
             echo $cpage=='lead-delete.php'? 'active':'';
             ?>">
              <a href="lead.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-support"></i>
                <div >Leads</div>
              </a>
           </li>

           <li class="menu-item
            <?php
             echo $cpage=='industry.php'? 'active':'';
             echo $cpage=='industry-add.php'? 'active':'';
             echo $cpage=='industry-delete.php'? 'active':'';
             ?>">
              <a href="industry.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-collection"></i>
                <div >Industry</div>
              </a>
           </li>


           <li class="menu-item
            <?php
             echo $cpage=='list.php'? 'active':'';
             echo $cpage=='list-add.php'? 'active':'';
             echo $cpage=='list-edit.php'? 'active':'';
             echo $cpage=='list-delete.php'? 'active':'';
             ?>">
              <a href="list.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div >List</div>
              </a>
           </li>

           <li class="menu-item
            <?php
             echo $cpage=='global-var.php'? 'active':'';
             echo $cpage=='global-var-add.php'? 'active':'';
             echo $cpage=='global-var-edit.php'? 'active':'';
             echo $cpage=='global-var-delete.php'? 'active':'';
             ?>">
              <a href="global-var.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div >Global Variables</div>
              </a>
           </li>


           <li class="menu-item
            <?php
             echo $cpage=='template.php'? 'active':'';
             echo $cpage=='template-add.php'? 'active':'';
             echo $cpage=='template-edit.php'? 'active':'';
             echo $cpage=='template-delete.php'? 'active':'';
             ?>">
              <a href="template.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
                <div >Template</div>
              </a>
           </li>


           <li class="menu-item
            <?php
             echo $cpage=='campaign.php'? 'active':'';
             echo $cpage=='campaign-send.php'? 'active':'';
             echo $cpage=='campaign-view.php'? 'active':'';
             ?>">
              <a href="campaign.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-envelope'></i>
                <div >Campaign</div>
              </a>
           </li>

           <li class="menu-item
            <?php
             echo $cpage=='inbox.php'? 'active':'';
             echo $cpage=='inbox-view.php'? 'active':'';
             ?>">
              <a href="inbox.php" class="menu-link">
              <i class='menu-icon tf-icons bx bxl-dropbox'></i>
                <div >Inbox</div>
              </a>
           </li>






           <li class="menu-item
            <?php
             echo $cpage=='setting.php'? 'active':'';
             ?>">
              <a href="setting.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-cog'></i>
                <div >Settings</div>
              </a>
           </li> --}}



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

              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="https://img.icons8.com/?size=512&id=43964&format=png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="logout">
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
            @yield('content')
               <!-- Footer -->
   <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        , made with ❤️ by
        <a href="https://www.linkedin.com/in/pritam-makwana-82497423a/" target="_blank" class="footer-link fw-bolder">Pritam Makwana</a>
      </div>

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
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->

<script type="{{ asset('text/javascript')}}">


</script>

</body>
</html>


