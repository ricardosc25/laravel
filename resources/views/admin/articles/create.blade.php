@extends('layouts.app')
@section('title', 'Crear Artículo')
@section('content')
<h1>Crear Artículo</h1>

<div class="row">
	<div class="col-md-4">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE']) !!}
	<div class="form-group">
		{!! Form::label('title','Titulo') !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'required', 'placeholder' => 'Titulo de la nota']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Categoria') !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione una categoria']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tag_id','Tag') !!}
		{!! Form::select('tag_id', $tags, null, ['class' => 'form-control', 'required', 'placeholder' => 'Asignar tag']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}	
	</div>

</div>

@endsection