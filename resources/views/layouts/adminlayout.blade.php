<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/StarAdmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/StarAdmin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/StarAdmin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/StarAdmin/vendors/iconfonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/StarAdmin/vendors/icheck/skins/all.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/StarAdmin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/StarAdmin/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('navbaradmin.topbar')
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('navbaradmin.sidebar')
        <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/StarAdmin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/StarAdmin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/StarAdmin/js/off-canvas.js"></script>
  <script src="/StarAdmin/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/StarAdmin/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>