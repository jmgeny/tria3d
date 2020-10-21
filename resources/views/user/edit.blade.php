@extends('layouts.admin')

@section('title','Usuarios')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Editar Usuario</h2>
                    <a class="btn btn-danger float-right" href="{{ route('user.index') }}">Inicio</a>
                </div>
                <div class="card-body">

                    @include('custom.message')

                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                value="{{ old('name',$user->name) }}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="e-mail"
                                value="{{ old('email',$user->email) }}">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="roles" id="roles">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            @isset($user->roles[0]->name)
                                                @if ($user->roles[0]->name == $role->name)
                                                 selected
                                                @endif
                                            @endisset    
                                            >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                             
                            <hr>
                            <input type="submit" class="btn btn-primary float-right" value="Guardar">
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
