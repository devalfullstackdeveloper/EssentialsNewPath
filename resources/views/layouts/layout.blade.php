<!DOCTYPE html>
<html>
<head>
	<title>Csv Import</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/style.css') }}">
	@yield('stylesheetsection')
</head>
<body>
<header>
	<div class="form-group">
		<div class="col-lg-12 bg-secondary text-center p-3">
			<h3 class="text-white mb-0">Client Mapping System</h3>
		</div>
	</div>
</header>
@yield('content')

<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('scriptsection')
</body>
</html>