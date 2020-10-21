@extends('layouts.admin')

@section('title','Roles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h2 class="float-left">Lista de Roles</h2>
                  @can('haveaccess','role.create')
                    <a class="btn btn-primary float-right" href="{{ route('role.create') }}"> Create</a>
                  @endcan 
                </div>
                <div class="card-body">
                  
                    @include('custom.message')

                <table class="table table-hover">

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">slug</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">full-access</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                    <tr>
                      <th scope="row">{{ $role->id }}</th>
                      <td>{{ $role->name }}</td>
                      <td>{{ $role->slug }}</td>
                      <td>{{ $role->description }}</td>
                      <td>{{ $role['full-access'] }}</td>
                      <td>
                        @can('haveaccess','role.show')
                          <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                        @else  
                          <a class="btn btn-info disabled" href="{{ route('role.show',$role->id) }}">Show</a>
                        @endcan
                      </td>
                      <td>
                        @can('haveaccess','role.edit')
                          <a class="btn btn-success" href="{{ route('role.edit',$role->id) }}">Edit</a>
                        @else
                          <a class="btn btn-success disabled" href="{{ route('role.edit',$role->id) }}">Edit</a>
                        @endcan  

                        </td>
                      <td>
                        @can('haveaccess','role.destroy')
                        <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger">Eliminar</button>
                        </form>
                        @else
                          
                          <a href="#" class="btn btn-danger disabled">Eliminar</a>                          
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                {{ $roles->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
