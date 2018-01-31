@extends('layouts.app')
@section('title', 'Crear Artículo')
@section('content')
<h1>Crear Artículo</h1>

<div class="row">
<<<<<<< HEAD
	<div class="col-lg-12">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE']) !!}
=======
<<<<<<< HEAD
	<div class="col-lg-6">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE']) !!}
=======
	<div class="col-md-4">
		{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'TRUE', 'class' => 'dropzone']) !!}
>>>>>>> ce0aac56df40189af74d7dbdac4a83334227ddd0
>>>>>>> origin/test

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

<<<<<<< HEAD
    <div class="form-group">
        {!! Form::label('image','Imagen') !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
    </div>

	<div class="form-group">
		{!! Form::label('tags','Tag') !!}
		{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select_tags', 'multiple']) !!}
	</div> 
=======
<<<<<<< HEAD
		    <div class="form-group">
				{!! Form::label('image','Imagen') !!}
				{!! Form::file('image', null, ['class' => 'form-control', 'multiple']) !!}
			</div>
=======
	<!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files">
    	
    </div>
    <br>
>>>>>>> ce0aac56df40189af74d7dbdac4a83334227ddd0

			<div class="form-group">
				{!! Form::label('tags','Tag') !!}
				{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select_tags', 'multiple']) !!}
			</div>
>>>>>>> origin/test

			<div class="form-group">
				{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
			</div>

<<<<<<< HEAD
		{!! Form::close() !!}
=======
{!! Form::close() !!}
>>>>>>> ce0aac56df40189af74d7dbdac4a83334227ddd0
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

<<<<<<< HEAD
</script>	
=======
<<<<<<< HEAD
</script>	
=======
</script>

<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
	
>>>>>>> ce0aac56df40189af74d7dbdac4a83334227ddd0
>>>>>>> origin/test
@endsection