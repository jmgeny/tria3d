@extends('layouts.admin')

@section('title', 'Crear Producto')

@section('migas')
<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Listar Producto</a></li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('estilos')
<!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"> --}}
    <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection

@section('scripts')

<script src="{{ asset('adminlte/ckeditor/ckeditor.js') }}"></script>
  <!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" ></script> --}}

<script>

	window.data = {
		editar: 'si',
		datos: {
			"name" : "{{ $product->name }}",
			"precio_anterior" : "{{ $product->precio_anterior }}",
			"porcentaje_descuento": "{{ $product->porcentaje_descuento }}"
		}
	}

	$(function () {
    //Initialize Select2 Elements
    $('#category_id').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

 });   
</script>

@endsection


@section('content')
<div id="apiproduct">
	<form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" >
		@csrf
		@method('PUT')

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- SELECT2 EXAMPLE -->
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Datos generados automáticamente</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Visitas</label>
									<input readonly class="form-control" type="number" id="visitas" name="visitas" value="{{ $product->visitas }}">
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Ventas</label>
									<input readonly class="form-control" type="number" id="ventas" name="ventas" value="{{ $product->ventas }}">
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
					</div>
				</div>
				<!-- /.card -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Datos del producto</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nombre</label>
									<input v-model='name'

										@blur = "getproduct"
										@focus = "div_aparecer = false"
										
										class="form-control" type="text" id="name" name="name">

									<label>Slug</label>
									<input readonly v-model="generarSlug"
									class="form-control" type="text" id="slug" name="slug" >
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Categoria</label>
									
									<select id="category_id" name="category_id" class="form-control" style="width: 100%;">
										
										@foreach ($categories as $categoria)
											@if ($categoria->id == $product->category_id)
												<option value="{{ $categoria->id }}" selected="selected">{{ $categoria->name }}</option>
											@else
												<option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
											@endif
										@endforeach
									</select>

									<label>Cantidad</label>
									<input class="form-control" type="number" id="cantidad" name="cantidad" value="{{ $product->cantidad }}">
								</div>
								<!-- /.form-group -->
							</div>
			<div v-if="div_aparecer" v-bind:class="div_clase_slug">
				@{{ div_mensage_slug }}
			</div>
			<br v-if="div_aparecer">
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
					</div>
				</div>
				<!-- /.card Precios-->
<div class="container">
				<!-- /.card Precios-->
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Sección de Precios</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Precio anterior</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input v-model="precio_anterior"
										class="form-control" type="number" id="precio_anterior" name="precio_anterior" min="0" value="{{ $product->precio_anterior }}" step=".01">                 
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-3">
								<div class="form-group">
									<label>Precio actual</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input readonly v-model="precio_actual"
										class="form-control" type="number" id="precio_actual" name="precio_actual" min="0" value="{{ $product->precio_actual }}" step=".01">                 
									</div>
									<br>
									<span id="descuento">
										<!-- funcion computada -->
										@{{ generarDescuento }}
									</span>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-md-6">
								<div class="form-group">

									<label>Porcentaje de descuento</label>
									<div class="input-group">                  
										<input v-model="porcentaje_descuento"
										class="form-control" type="number" id="porcentaje_descuento" name="porcentaje_descuento" step="any" min="0" max="100" value="{{ $product->porcentaje_descuento }}" >    <div class="input-group-prepend">
											<span class="input-group-text">%</span>
										</div>  

									</div>

									<br>
									<div class="progress">
										<div class="progress-bar" role="progressbar" 
										v-bind:style="{width: porcentaje_descuento+'%'}" 
										aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">@{{ porcentaje_descuento }}</div>
									</div>
								</div>
								<!-- /.form-group -->
								
							</div>
							<!-- /.col -->


						</div>
						<!-- /.row -->


					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						
					</div>
				</div>
	</div>
				<!-- /.card -->
				<div class="row">
					<div class="col-md-6">

						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Descripciones del producto</h3>
							</div>
							<div class="card-body">
								<!-- Date dd/mm/yyyy -->
								<div class="form-group">
									<label>Descripción corta:</label>

									<textarea class="form-control ckeditor" name="descripcion_corta" id="descripcion_corta" rows="3">{!!$product->descripcion_corta!!}</textarea>
									
									
								</div>
								<!-- /.form group -->

								<div class="form-group">
									<label>Descripción larga:</label>

									<textarea class="form-control ckeditor" name="descripcion_larga" id="descripcion_larga" rows="5">{!!$product->descripcion_larga!!}</textarea>
									
								</div>                

							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->

					</div>
					<!-- /.col-md-6 -->

					<div class="col-md-6">

						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Especificaciones y otros datos</h3>
							</div>
							<div class="card-body">
								<!-- Date dd/mm/yyyy -->
								<div class="form-group">
									<label>Especificaciones:</label>

									<textarea class="form-control ckeditor" name="especificaciones" id="especificaciones" rows="3">{!!$product->especificaciones!!}</textarea>
									
								</div>
								<!-- /.form group -->

								<div class="form-group">
									<label>Datos de interes:</label>

									<textarea class="form-control ckeditor" name="datos_de_interes" id="datos_de_interes" rows="5">{!!$product->datos_de_interes!!}</textarea>
									
								</div>                

							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col-md-6 -->
				</div>
				<!-- /.row -->

				<div class="card card-warning">
					<div class="card-header">
						<h3 class="card-title">Imágenes</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="form-group">
							<label for="imagenes">Agregar Imágenes</label> 
							<input type="file" class="form-control-file" name="imagenes[]" id="imagenes[]" multiple
							accept="image/*" >
							<div class="desciption">
								<br>
								Ingresar archivos solo de imagenes jpeg, jpg, gif, svg, png
								<br>
								El tamaño no debe superar los 2048 MB
								<br>
								Puede ingresar multiples archivos
							</div>
						</div>
					</div>
					<!-- /.card-body -->
{{-- 					<div class="card-footer">
						Footer de imagenes
					</div> --}}
				</div>
				<!-- /.card -->

				<div class="card card-primary">
					<div class="card-header">
						<div class="card-title">
							Listado de Imágenes
						</div>
					</div>
					<div class="card-body">
						<div class="row">

						@foreach ($product->images as $imagen)
							<div id="idimagen-{{$imagen->id}}" class="col-sm-2">
								<a href="{{ $imagen->url }}" data-toggle="lightbox" data-gallery="gallery" data-title="Imágen {{ $imagen->id }}">
									<img src="{{ $imagen->url }}" class="img-fluid mb-2"/>
								</a>
								<br>
								<a href="{{ $imagen->id }}"
									v-on:click.prevent="eliminarImagen({{ $imagen }})"
								><i class="far fa-trash-alt"></i> id: {{ $imagen->id }}</a>
							</div>
						@endforeach	

						</div>
					</div>
				</div>				

				<div class="card card-danger">
					<div class="card-header">
						<h3 class="card-title">Administración</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Estado</label>
									<select id="estado" name="estado" class="form-control" style="width: 100%;">
										@foreach ($estados as $estado)
											@if ($estado == $product->estado)
												<option value="{{ $estado }}" selected="selected">{{ $estado }}</option>
											@else
												<option value="{{ $estado }}">{{ $estado }}</option>
											@endif
										@endforeach
									</select>								

								</div>
								<!-- /.form-group -->
								
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<!-- checkbox -->
								<div class="form-group clearfix">
									<div class="custom-control custom-checkbox">
										@if ($product->activo == 'si')
											<input type="checkbox" class="custom-control-input" id="activo" name="activo" checked>
										@else
											<input type="checkbox" class="custom-control-input" id="activo" name="activo"> 										
										@endif
										<label class="custom-control-label" for="activo">Activo</label>
									</div>

								</div>

								<div class="form-group">
									<div class="custom-control custom-switch">
										@if ($product->sliderprincipal == 'si')
											<input type="checkbox"  class="custom-control-input" id="sliderprincipal" name="sliderprincipal" checked>
										@else
											<input type="checkbox"  class="custom-control-input" id="sliderprincipal" name="sliderprincipal" checked>
										@endif
										<label class="custom-control-label" for="sliderprincipal">Aparece en el Slider principal</label>
									</div>
								</div>

							</div>

						</div>
						<!-- /.row -->

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">

									<a class="btn btn-danger" href="{{ route('cancelar','admin.product.index') }}">Cancelar</a>
									@can('haveaccess','product.edit')
									<input
									:disabled= "deshabilitar_boton==1"                  
									type="submit" value="Guardar" class="btn btn-primary">
									@endcan
									
								</div>
								<!-- /.form-group -->
								
							</div>
							<!-- /.col -->

						</div>
						<!-- /.row -->

					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						
					</div>
				</div>
				<!-- /.card -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</form>
</div>
@endsection

