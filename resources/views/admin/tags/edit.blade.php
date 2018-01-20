@extends('layouts.app')
@section('title', 'Editar Tags')
@section('content')
<h1>Editar Tags</h1>

<!-- La variable $tags es la que obtenemos del arreglo de la función edit del controlador TagsController-->
{!! Form::model($tags, ['route' => ['tags.update', $tags->id], 'method' => 'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', $tags->name, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection