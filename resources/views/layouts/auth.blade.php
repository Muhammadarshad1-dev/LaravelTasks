<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>{{ config('app.name') }} - {{ $title ?? 'Login' }}</title>
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets') }}/images/app_favicon.png" type="image/png" />
	<!-- loader-->
	<link href="{{ asset('assets') }}/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('assets') }}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
			<div class="row">
				<div class="col-12 col-lg-8 mx-auto">
					<div class="card radius-15 overflow-hidden">
						<div class="row g-0">
							<div class="col-xl-12">
								<div class="card-body p-5">
									<div class="text-center">
										<img src="{{ asset('assets') }}/images/app_logo.png" width="200" alt="">
									</div>
									<div class="">
										@yield('content')
									</div>
								</div>
							 </div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

<!--plugins-->
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<!--Password show & hide js -->
<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});
</script>

</html>
