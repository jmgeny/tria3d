@extends('layouts.admin')

@section('title', 'Listar Category')

@section('migas')
  <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

        <div id="confirmareliminar" class="row">
          <span style="display: none" id="urlbase">{{ route('admin.category.index') }}</span>
          @include('temp.modal_eliminar')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
              <!-- /.card-header -->
                <div class="card-tools">
                  <form action="{{ route('admin.category.index') }}">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="name" class="form-control float-right" placeholder="Search"
                    value="{{ request()->get('name') }}">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <div class="card-body table-responsive p-0" style="height: 500px;">
                @can('haveaccess','category.create');
                <a class="btn btn-primary float-right m-1" href="{{ route('admin.category.create') }}">Crear</a>
                @endcan
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripcion</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($categories as $categoria)
	                    <tr>
	                      <td>{{ $categoria->id }}</td>
	                      <td>{{ $categoria->name }}</td>
	                      <td>{{ $categoria->slug }}</td>
	                      <td>{{ $categoria->description }}</td>
	                      <td>
                          @can('haveaccess','category.show')
                          <a class="btn btn-default" href="{{ route('admin.category.show',$categoria->slug) }}"><i class="fas fa-binoculars"></i></a>
                          @else
                          <a class="btn btn-default disabled" href="#"><i class="fas fa-binoculars"></i></a>
                          @endcan
                        </td>
	                      <td>
                          @can('haveaccess','category.edit')
                          <a class="btn btn-success" href="{{ route('admin.category.edit',$categoria->slug) }}"><i class="fas fa-user-edit"></i></a>
                          @else
                          <a class="btn btn-success disabled" href="#"><i class="fas fa-user-edit"></i></a>
                          @endcan
                        </td>
                        <td>
                          @can('haveaccess','category.destroy')
                          <a class="btn btn-danger" href="{{ route('admin.category.index') }}"
                            v-on:click.prevent="desea_eliminar({{$categoria->id}})"
                            >Eliminar</a>
                          @else
                          <a class="btn btn-danger disabled" href="#">Eliminar</a>  
                          @endcan
                        </td>
	                    </tr>
                  	@endforeach
                  </tbody>
                </table>
                {{$categories->appends($_GET)->links()}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


@endsection