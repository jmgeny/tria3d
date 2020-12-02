@extends('layouts.tienda')

@section('title','Tiendo ONLINE')

@section('styles')

	<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css') }}">	

@endsection

@section('content')

{{-- header, home, producto, lo mas vendido --}}
@include('tienda.super_container')
	

	<!-- En oferta -->
{{-- @include('tienda.oferta') --}}

	{{-- </div>  --}}
	{{-- ¿? --}}



<!-- Boxes -->
{{-- @include('tienda.boxes') --}}

<!-- Features -->
{{-- @include('tienda.features') --}}



@endsection