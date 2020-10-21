@extends('layouts.admin')

@section('title', 'Listar Productos')

@section('migas')
  <li class="breadcrumb-item active">@yield('title')</li>
@endsection

<style type="text/css">
.table1 {
  width: 100%;
  margin-bottom: 1rem;
  color: #5e0808;
  text-align: center
}

.table1 th, .table1 td {
  padding: 0.75rem;
  vertical-align: center;
  border-top: 1px solid #edc500;
}
</style>
@section('content')

        <div id="confirmareliminar" class="row">
          <span style="display: none" id="urlbase">{{ route('admin.product.index') }}</span>
          @include('temp.modal_eliminar')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
              <!-- /.card-header -->
                <div class="card-tools">
                  <form action="{{ route('admin.product.index') }}">
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
                @can('haveaccess','product.create')
                <a class="btn btn-primary float-right m-1" href="{{ route('admin.product.create') }}">Crear</a>
                @endcan
                <table class="table1 table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Activo</th>
                      <th>SliderPrincipal</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($products as $producto)
	                    <tr>
	                      <td>{{ $producto->id }}</td>
                        <td>
                          {{ $producto->images_count }}
                          @if ($producto->images_count <= 0 )
                            <img style="width: 100px" class="img-circle" src="/img/avatar.png" alt="avatar">
                          @else
                            <img style="width: 100px" class="img-circle" src="{{ $producto->images->random()->url }}" alt="">  
                          @endif
                        </td>
	                      <td>{{ $producto->name }}</td>
	                      <td>{{ $producto->estado }}</td>
	                      <td>{{ $producto->activo }}</td>
                        <td>{{ $producto->sliderprincipal }}</td>
	                      <td>
                          @can('haveaccess','product.show')
                          <a class="btn btn-default" href="{{ route('admin.product.show',$producto->slug) }}"><i class="fas fa-binoculars"></i></a>
                          @else
                          <a class="btn btn-default disabled" href="#"><i class="fas fa-binoculars"></i></a>
                          @endcan
                        </td>
	                      <td>
                          @can('haveaccess','product.edit')
                          <a class="btn btn-success" href="{{ route('admin.product.edit',$producto->slug) }}"><i class="fas fa-user-edit"></i></a>
                          @else
                          <a class="btn btn-success disabled" href="#"><i class="fas fa-user-edit"></i></a>
                          @endcan
                        </td>
                        <td>
                          @can('haveaccess','product.destroy')
                          <a class="btn btn-danger" href="{{ route('admin.product.index') }}"
                            v-on:click.prevent="desea_eliminar({{$producto->id}})"
                            >Eliminar</a>
                            @else
                            <a class="btn btn-danger disabled" href="#">Eliminar</a>
                            @endcan
                        </td>

                        
	                    </tr>
                  	@endforeach
                  </tbody>
                </table>
                {{$products->appends($_GET)->links()}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


@endsection