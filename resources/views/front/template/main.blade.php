<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('title','Home') | Articulos</title>
	  <!-- Bootstrap CSS-->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href=" {{ asset('plugins/fontawesome/web-fonts-with-css/css/fontawesome-all.css') }} ">
	  <style type="text/css">
	  	.card-title{
	  		height: 100px !important;
	  	}
	  	.card-deck{
	  		margin-bottom: 10px !important;
	  	}
	  </style>
 
</head>
<body>
	<div class="container">
		@include('flash::message')
        @include('shared.errors_flash')
        @yield('content')
	</div>



</body>
	 <!-- JavaScript files-->
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 <script src="{{ asset('plugins/fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>	
   
</html>