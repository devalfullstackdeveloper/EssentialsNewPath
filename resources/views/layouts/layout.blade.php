<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{csrf_token()}}">
  	<meta name="base-url" content="{{URL('/')}}">
	<title>Client Mapping System</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
	<link href="{{ URL::asset('/css/datatables.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/style.css') }}">
	@yield('stylesheetsection')
	
</head>
<body>
<header>
	<!-- <div class="form-group">
		<div class="col-lg-12 bg-secondary text-center p-3">
			<h3 class="text-white mb-0">Client Mapping System</h3>
		</div>
	</div> -->
	<div class="header-main">
		<div class="inner-header-main bg-secondary">
			<div class="container-xl">
				<div class="row ">
					<div class="col-lg-5 col-md-4">
						<div class="main-logo">
						<h3 class="text-white mb-0">Client Mapping System</h3>
						</div>
					</div>
					<div class="col-lg-7 col-md-8">
					<nav class="navbar sticky-top navbar-expand-lg mynav">
						
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">
							<i class="fa fa-bars"></i>
							</button>

						<div class="collapse navbar-collapse navbar-custome" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto w-100 justify-content-end">
							<li class="nav-item active">
								<a class="nav-link" href="{{ URL('/home') }}">Upload Initial Data <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ URL('/bos1') }}">BOS1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ URL('/bos2') }}">BOS2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ URL('/rcs') }}">RCS</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ URL('/mim') }}">MIM</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="{{ URL('/matchresult') }}">Match Result</a>
							</li>
							</ul>
						</div>
					</nav>
					</div>
				</div>
			</div>	
		</div>
	</div>
</header>
<!-- sidebar -->
						<div id="mySidenav" class="sidenav">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
							<ul class="navbar-nav mr-auto w-100 justify-content-end">
							<li class="nav-item active">
								<a class="nav-link" href="#">Upload Initial Data <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Manage Client</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="#">Contact</a>
							</li>
							</ul>
						</div>
@yield('content')

<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ URL::asset('/js/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/main.js') }}" type="text/javascript"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script> --}}
<script>


function openNav() {
  document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
@yield('scriptsection')

</body>
</html>