@extends('layouts.app')
@section('title', 'Crear Artículo')
@section('content')
<h1>Crear Artículo</h1>

<div class="row">
	<div class="col-lg-6">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE', 'id' => 'FormCreate']) !!}
			{{ csrf_field() }}
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
				{!! Form::file('image', null, ['class' => 'form-control', 'multiple', 'id' => 'image']) !!}
			</div>

			 <div id="previewImage">
				
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

{{-- Script para mostrar la imagen al seleccionar el archivo --}}

<script>
	function archivo(evt) {
		  var files = evt.target.files; // FileList object

		  // Obtenemos la imagen del campo "file".
		  for (var i = 0, f; f = files[i]; i++) {
		    //Solo admitimos imágenes.
		    if (!f.type.match('image.*')) {
		    	continue;
		    }

		    var reader = new FileReader();

		    reader.onload = (function(theFile) {
		    	return function(e) {
		          // Insertamos la imagen
		          document.getElementById("previewImage").innerHTML = ['<img src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
		          console.log()
		      };
		  })(f);

		  reader.readAsDataURL(f);
		}
		}

	document.getElementById('image').addEventListener('change', archivo, false);
</script>

@endsection