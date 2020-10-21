@extends('layouts.admin')

@section('title', 'Create Category')

@section('migas')
  <li class="breadcrumb-item">
    <a href="{{ route('admin.category.index') }}">Listar Categoría</a>
  </li>
  <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

<div class="container" id="apicategory">
	<form action="{{ route('admin.category.store') }}" method="POST">
		@csrf
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administrador de categoria</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">


	
			<div class="form-group">
				<label for="name">name</label>
				<input 
				v-model='name'

				@blur = "getCategory"
				@focus = "div_aparecer = false"

				 type="text" class="form-control" name="name" id="name" placeholder="name">
			</div>
			<div class="form-group">
				<label for="slug">Slug</label>
				<input readonly v-model="generarSlug" type="text" class="form-control" 
				name="slug" id="slug" 
				placeholder="slug">
			</div>
			<div v-if="div_aparecer" v-bind:class="div_clase_slug">
				@{{ div_mensage_slug }}
			</div>
			<br v-if="div_aparecer">
			<div class="form-group">
				<label for="description">Descripción</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Descripción"></textarea>
			</div>
		
	
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        	<a class="btn btn-success" href="{{ route('cancelar','admin.category.index') }}">Cancelar</a>
        	@can('haveaccess','category.create')
			<input :disabled= "deshabilitar_boton==1" type="submit" value="Guardar" class="btn btn-primary float-right">
			@endcan
        </div>
        <!-- /.card-footer-->
      </div>
    </form>
</div>
@endsection