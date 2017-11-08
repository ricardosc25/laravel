@extends('layouts.app')
@section('title', 'Crear Usuario')
@section('content')
<h1>Crear Usuario</h1>

{!! Form::open(['route' => 'users.store']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email','Correo') !!}
		{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmai', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password','Contrasena') !!}
		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('type','Tipo') !!}
		{!! Form::select('type', ['' => 'Seleccione un nivel', 'member' => 'Miembro', 'admin' => 'Administrador'], null,['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection