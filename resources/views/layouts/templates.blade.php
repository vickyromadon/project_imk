<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- Bagian Css dan JS di Header -->
	@include('layouts.partials.head')
</head>
<body>
	<!-- Bagian Header -->
	@include('layouts.partials.header')
	
	<!-- Bagian Alert Info -->
	@include('layouts.partials.info')
	
	<!-- Bagian Alert Danger -->	
	@include('layouts.partials.danger')

	<!-- Bagian Content -->
	@yield('content')
	
	<!-- Bagian Footer -->
	@include('layouts.partials.footer')

	<!-- JavaScript -->
	@yield('javascript')
</body>
</html>