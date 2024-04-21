<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>{{ $title }} - {{ config('app.name') }}</title>
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets') }}/images/app_favicon.png" type="image/png" />
	<!-- Vector CSS -->
	<link href="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    {{-- Fancy file upload  --}}
    <link href="{{asset('assets')}}/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet" />

	<!--plugins-->
	<link href="{{ asset('assets') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ asset('assets') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ asset('assets') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
	<!-- loader-->
	<link href="{{ asset('assets') }}/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('assets') }}/js/pace.min.js"></script>

	<!-- Select 2 -->
	<link href="{{ asset('assets') }}/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="{{ asset('assets') }}/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />

		<!-- Datatable -->
	<link href="{{ asset('assets') }}/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets') }}/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/mycss.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.css" />
	<link rel="stylesheet" href="{{ asset('assets') }}/css/dark-sidebar.css" />
	<link rel="stylesheet" href="{{ asset('assets') }}/css/dark-theme.css" />
    <style>
        .logo-icon-2{
            width: 178px !important;
            height: 50px !important;
        }
    </style>

    @yield('css')
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
            @include('components.admin_sidebar')
		<!--end sidebar-wrapper-->
		<!--header-->
            @include('components.admin_navbar')
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->

                @yield('content')

			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>

		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
			<p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent" target="_blank">codervent</a>
			</p>
		</div>
		<!-- end footer -->
	</div>

	<!-- Bootstrap JS -->
	<script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>

	<!--plugins-->
	<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Vector map JavaScript -->
	<script src="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
	<script src="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
	<script src="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
	<script src="{{ asset('assets') }}/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
	{{-- <script src="{{ asset('assets') }}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> --}}
	<script src="{{ asset('assets') }}/js/index.js"></script>
	<script src="{{ asset('assets') }}/plugins/select2/js/select2.min.js"></script>

    {{-- fancy file upload --}}
    <script src="{{asset('assets')}}/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="{{asset('assets')}}/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="{{asset('assets')}}/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="{{asset('assets')}}/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>


	<!--Data Tables js-->
    <script src="{{ asset('assets') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>

	<!-- App JS -->
	<script src="{{ asset('assets') }}/js/app.js"></script>
	<script>
		new PerfectScrollbar('.dashboard-social-list');
		new PerfectScrollbar('.dashboard-top-countries');
	</script> --}}
 {{-- danidev js --}}
    <script src="{{ asset('assets') }}/js/danidev.js"></script>








    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('.loader-container').hide();
            }, 300);
        });
    </script>
    @yield('script')
</body>

</html>
