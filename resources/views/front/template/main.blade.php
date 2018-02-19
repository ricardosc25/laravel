<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('title','Home') | Articulos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href=" {{ asset('plugins/fontawesome/web-fonts-with-css/css/fontawesome-all.css') }} ">
</head>
<body>
	<div class="container">
		@include('flash::message')
        @include('shared.errors_flash')
        @yield('content')
	</div>



</body>
<script src="{{ asset('plugins/fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
</html>