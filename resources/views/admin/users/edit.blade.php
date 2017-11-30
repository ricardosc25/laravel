@extends('layouts.app')
@section('title', 'Editar usuario')
@section('content')
<h1>Editar usuario</h1>

<!-- La variable $User hace llamado al modelo User. para poder utilizar los datos del usuario en este FORM -->
{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email','Correo') !!}
		{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmai', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('type','Tipo') !!}
		{!! Form::select('type', ['' => 'Seleccione un nivel', 'member' => 'Miembro', 'admin' => 'Administrador'], null,['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection