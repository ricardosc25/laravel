@extends('layouts.app')
@section('title', 'Creación de Categorias')
@section('content')
<h1>Crear Categorias</h1>

{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection