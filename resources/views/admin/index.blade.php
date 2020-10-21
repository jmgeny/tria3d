@extends('layouts.admin')

@section('title', 'Administrador BS7')

@section('content')
<div class="text-center">
	<div class="row text-center">
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-header">
					Categorias
				</div>
				@can('haveaccess','category.index')
				<div class="card-body">
					<p class="card-text"></p>
					<a href="{{ route('admin.category.index') }}" class="btn btn-primary">Categoria</a>
				</div>
				@endcan
			</div>			
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-header">
					Productos
				</div>
				@can('haveaccess','product.index')
				<div class="card-body">
					<p class="card-text"></p>
					<a href="{{ route('admin.product.index') }}" class="btn btn-primary">Productos</a>
				</div>
				@endcan
			</div>

		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-header">
					Usuarios
				</div>
				@can('haveaccess','user.index')
				<div class="card-body">
					<p class="card-text"></p>
					<a href="{{ route('user.index') }}" class="btn btn-primary">Usuarios</a>
				</div>
				@endcan
			</div>

		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-header">
					Roles
				</div>
				@can('haveaccess','role.index')
				<div class="card-body">
					<p class="card-text"></p>
					<a href="{{ route('role.index') }}" class="btn btn-primary">Roles</a>
				</div>
				@endcan
			</div>

		</div>
		
	</div>
</div>
@endsection