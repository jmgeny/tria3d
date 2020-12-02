<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>BS7 @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Bragado Shop 7">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/bootstrap-4.1.2/bootstrap.min.css') }}"> --}}

	<link rel="stylesheet" type="text/css" href="{{ asset('asset/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">


	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

@yield('styles')


</head>
<body>
<div id="app">	
	<!-- Menu -->
	@include('tienda.menu')
	@include('tienda.header')

	<!-- Menu -->

	@yield('content')

	<!-- Footer -->

	@include('tienda.footer')
</div>

{{-- </div>

</div> --}}


{{-- <script src="{{ asset('asset/styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('asset/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script> --}}
	<script src="{{ asset('asset/js/jquery-3.2.1.min.js') }}"></script>
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.js') }}" defer></script>
</body>

</html>