@extends('layouts.app')
@section('title', 'Editar categoria')
@section('content')
<div class="row">
	<div class="col-lg-6">
		{!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT', 'enctype' => "multipart/form-data"]) !!}

			<div class="form-group">
				{!! Form::label('category_id','Categoria') !!}
				{!! Form::select('category_id', $categories, null, ['class' => 'form-control select_category', 'placeholder' => 'Seleccione una categoría']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('title','Titulo') !!}
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo de la nota', 'maxlength' => '100']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('content','Contenido') !!}
				{!! Form::textarea('content', null, ['class' => 'form-control textarea-content']) !!}
			</div>

			<div class="form-group">
					{!! Form::label('image','Imagen') !!}
					{!! Form::file('image', null, ['class' => 'form-control', 'multiple']) !!}
			</div>


			@if($imagen)			
				<label>Imagen actual</label>
				<img src="{{ asset($imagen->name) }}">				    
			@endif

			<div class="form-group">
				{!! Form::label('tags','Tag') !!}
				{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select_tags', 'multiple']) !!}
			</div>

			<div class="form-group" >
				{{ Form::label('status_public', 'Publicar') }}
				{!! Form::checkbox('status_public', 1, $article->status_public, ['class' => 'field']) !!}
					@if($article->status_public == 1)
						<span class="label label-success">Publicado</span>
					@else
						<span class="label label-warning">No publicado</span>
					@endif
			</div>

			<div class="form-group">

				{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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