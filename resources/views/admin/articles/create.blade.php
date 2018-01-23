@extends('layouts.app')
@section('title', 'Crear Artículo')
@section('content')
<h1>Crear Artículo</h1>

<div class="row">
	<div class="col-md-4">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE']) !!}

	<div class="form-group">
		{!! Form::label('category_id','Categoria') !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control select_category', 'required', 'placeholder' => 'Seleccione una categoría']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('title','Titulo') !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'required', 'placeholder' => 'Titulo de la nota']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image','Imagen') !!}
		{!! Form::file('image', null, ['class' => 'form-control', 'required']) !!}
	</div>	

	<div class="form-group">
		{!! Form::label('tags','Tag') !!}
		{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select_tags', 'required', 'multiple']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}	
	</div>

</div>

@endsection

@section('js')
<script>
	$(".select_category").chosen({
		disable_search: false,
		no_results_text: "Oops, nothing found!",
		disable_search_threshold: 5
	});

	$(".select_tags").chosen({
		placeholder_text_multiple: "Agregar tags"
	});	

</script>
	
@endsection