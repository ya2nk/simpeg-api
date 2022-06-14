<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">


  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

<body>
	@include('layouts.header')
	@include('layouts.sidebar')
	<main id="main" class="main" x-data="main">
		@yield('content')
	</main>
	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
		<div class="copyright">
		  &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
		</div>
		<div class="credits">

		  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		</div>
	</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatable/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootbox/bootbox.all.min.js') }}"></script>
  <script src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
  <script src="{{ asset('assets/js/js-loading-overlay.min.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
		if (jqxhr.status == 419) {
			bootbox.alert("Session telah berakhir");
			setTimeout(() => {
				location.reload();
			},1500);
		}
		
		if (jqxhr.status == 404) {
			bootbox.alert("URL Tidak diketemukan");
		}
		
		if (jqxhr.status == 405) {
			bootbox.alert("Method tidak diijinkan");
		}
	});
	
  </script>
  <script type="text/javascript">
    document.addEventListener("alpine:init",() => {
      Alpine.data("main",() => ({
          table:null
      }));
    });
  </script>
  @stack('scripts')

</body>

</html>
