@extends('layouts.tienda')

@section('title','Tiendo ONLINE')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css') }}">	

@endsection

@section('content')
<!-- Home -->
<div class="principal">
	<div class="container">

		<div class="row justify-content-md-center">
			<div class="col-md-10">
				<div class="card">

					@foreach($producto->images as $image)
						<img src="{{ $image->url }}" class="card-img-top img_producto" alt="...">
					@endforeach
					<div class="card-body">
						{!! $producto->descripcion_corta !!} 						
					</div>
					<div class="card-footer">
						<a href="{{ route('tienda') }}" class="btn btn-primary">Regresar</a>
					</div>
				</div> <!--Card -->
			</div>
		</div>
	</div>	

</div>
@endsection

