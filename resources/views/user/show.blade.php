@extends('layouts.admin')

@section('title','Usuarios')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Ver Usuario</h2>
                    <a class="btn btn-danger float-right" href="{{ route('user.index') }}">Inicio</a>
                </div>
                <div class="card-body">

                    @include('custom.message')

                    <form>
                        <div class="container">

                            <div class="form-group">
                                <input disabled="none" type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                value="{{ old('name',$user->name) }}">
                            </div>

                            <div class="form-group">
                                <input disabled="none" type="text" class="form-control" name="slug" id="slug" placeholder="e-mail"
                                value="{{ old('email',$user->email) }}">
                            </div>
                            <div class="form-group">
                                <input disabled="none" type="text" class="form-control" name="slug" id="slug" placeholder="Slug"
                                value="{{ $user->roles[0]->name }}">
                            </div>

                            <hr>
                            <a class="btn btn-success float-right" href="{{ route('user.edit',$user->id) }}">Edit</a>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
