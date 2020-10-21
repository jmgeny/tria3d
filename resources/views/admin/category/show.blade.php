@extends('layouts.admin')

@section('title', 'Ver Categoria')

@section('migas')
  <li class="breadcrumb-item">
    <a href="{{ route('admin.category.index') }}">Listar Categoría</a>
  </li>
  <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

<div class="container" id="apicategory">
	<form>
		@csrf

	<span id="nombretemp" >{{ $cat->name }}</span>
	<span style="display: none" id="editar">{{ $editar }}</span>

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
				<label for="name">Nombre</label>
				<input v-model='name'
					@focus="div_aparecer = false"
					@blur="getCategory"
				 	type="text" class="form-control" name="name" id="name" placeholder="name" readonly>
			</div>
			<div class="form-group">
				<label for="slug">Slug</label>
				<input v-model=generarSlug type="text" class="form-control" 
				name="slug" id="slug" 
				placeholder="slug" readonly>
			</div>
			<div class="form-group">
				<label for="description">Descripción</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Descripción" readonly> {{ $cat->description }} </textarea>
			</div>
        </div>
        <div class="card-footer">
          <a class="btn btn-success" href="{{ route('cancelar','admin.category.index') }}">Cancelar</a>
          @can('haveaccess','category.edit')
          <a class="btn btn-primary float-right" href="{{ route('admin.category.edit',$cat->slug) }}">Editar</a>
          @endcan
        </div>
      </div>
    </form>
</div>
@endsection