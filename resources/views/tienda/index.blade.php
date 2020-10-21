@extends('layouts.tienda')

@section('title','Tiendo ONLINE')

@section('styles')

	<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css') }}">	

@endsection

@section('content')

{{-- header, home, producto, lo mas vendido --}}
@include('tienda.super_container')
	
	<br>
	<br>
	<br>

	<!-- En oferta -->
{{-- @include('tienda.oferta') --}}

	{{-- </div>  --}}
	{{-- ¿? --}}

<br>
<br>
<br>

<!-- Boxes -->
{{-- @include('tienda.boxes') --}}

<!-- Features -->
{{-- @include('tienda.features') --}}

@endsection