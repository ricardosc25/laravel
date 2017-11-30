@extends('layouts.app')
@section('title', 'Editar categoria')
@section('content')
<h1>Editar categoria</h1>

<!-- La variable $categ es la que obtenemos del arreglo de la función edit del controlador CategoriesController-->
{!! Form::model($categ, ['route' => ['categories.update', $categ->id], 'method' => 'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', $categ->name, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection