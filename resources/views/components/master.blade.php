<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DemensWallet</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  {{--
      <link href="{{asset('vendor/fontawesome-free/css/fontawesome-4.2.0.min.css')}}" rel="stylesheet" type="text/css">
      <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/v4-shims.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  --}}
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
  <!-- Custom style for select-picker -->
  <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <x-sidebar.main/>     {{-- sidebar --}}

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <x-topbar.main></x-topbar.main>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!--<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>-->
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; demenskan 2021<span>
            <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.js')}}"></script>

  @yield('page-level-scripts')
</body>

</html>
