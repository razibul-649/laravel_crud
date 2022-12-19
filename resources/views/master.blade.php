<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>@yield('page-name')</title>
		<link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('/') }}assets/css/fontawesome-all.css">
		<link rel="stylesheet" href="{{ asset('/') }}assets/css/my-styles.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="{{ route('home') }}">Laravel CRUD</a>
				<ul class="navbar-nav">
					<li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="{{ route('product.add') }}" class="nav-link">Add Product</a></li>
					<li class="nav-item"><a href="{{ route('product.manage') }}" class="nav-link">Manage Product</a></li>
					<li class="nav-item"><a href="{{ route('javascript') }}" class="nav-link">Javascript</a></li>
				</ul>
			</div>
		</nav>

		@yield('main-content')

		<script src="{{ asset('/') }}assets/js/jquery-3.6.1.js"></script>
		<script src="{{ asset('/') }}assets/js/bootstrap.bundle.js"></script>
		<script src="{{ asset('/') }}assets/js/fontawesome-all.js"></script>
		<script src="{{ asset('/') }}assets/js/my-scripts.js"></script>
	</body>
</html>