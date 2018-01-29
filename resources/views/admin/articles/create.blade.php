@extends('layouts.app')
@section('title', 'Crear Artículo')
@section('content')
<h1>Crear Artículo</h1>

<div class="row">
	<div class="col-lg-6">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE', 'class' => 'dropzone']) !!}

			<div class="form-group">
				{!! Form::label('category_id','Categoria') !!}
				{!! Form::select('category_id', $categories, null, ['class' => 'form-control select_category', 'placeholder' => 'Seleccione una categoría']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('title','Titulo') !!}
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo de la nota']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('content','Contenido') !!}
				{!! Form::textarea('content', null, ['class' => 'form-control textarea-content']) !!}
			</div>

		    <div class="form-group">
				{!! Form::label('image','Imagen') !!}
				{!! Form::file('image[]', null, ['class' => 'form-control', 'multiple']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('tags','Tag') !!}
				{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select_tags', 'multiple']) !!}
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

	$('.textarea-content').trumbowyg();

</script>	
@endsection