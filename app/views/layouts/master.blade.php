<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Pic Gallery</title>
	{{ HTML::style('assets/css/bootstrap.min.css')}}
	{{ HTML::style('assets/css/main.css')}}
</head>
<body>
	
	@include('layouts.partials.navbar')

	<div class="container">
		@yield('content')
	</div>
</body>
</html>