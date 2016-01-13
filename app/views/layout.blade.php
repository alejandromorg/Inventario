<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<!-- Bootstrap CSS served from a CDN -->
		<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/journal/bootstrap.min.css" rel="stylesheet">
		<link href="/css/layout.css" rel="stylesheet">
		@yield('js')
	</head>
	<body>  
		
	@include("header")		
	

		<div class="container-fluid">
			@yield('content')
		</div>
  </body>
</html>