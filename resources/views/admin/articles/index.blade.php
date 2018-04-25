@extends('layouts.app')
@section('title', 'Listado de articulos')
@section('content')
<a href="{{ route('articles.create') }}"><button type="button" class="btn btn-outline-dark">Crear artículo</button></a>
<br><br>
<table class="table table-striped">
    <thead>
            <th>ID</th>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Autor</th>
            <th>Accion</th>
            <th>Estado</th>
    </thead>
    <tbody>

	    	@foreach($article as $art)
	    	<tr>
	    		<td>{{ $art->id }}</td>
            @foreach($art->images as $image)
                <td><img style="max-width: 100px;" src="{{ asset($image->name) }}"></td>
                @endforeach
	    		<td>{!! substr($art->title,0,50) !!} {!! strlen($art->title) > 50 ? "..." : "" !!}</td>
	    		<td>{{ $art->category->name }}</td>
	    		<td>{{ $art->user->name }}</td>
	    		<td>
                    <a href="{{ route('articles.edit', $art->id) }}"><i class="fas fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-id="{{ $art->id }}" data-title="{{ $art->title }}" data-imagen="{{ $image->name }}" data-target="#delete"><i class="far fa-trash-alt"></i></a>
                 </td>
                 <td>{!! $art->status_public ? '<span class="badge badge-success">Publicado</span>' : '<span class="badge badge-warning">No publicado</span>' !!}</td>
	    	</tr>
	    	@endforeach

 	</tbody>
</table>
<!-- Modal para confirmar la eliminación de un artículo -->
<div class="modal fade confirmarEliminarArticulo" id="delete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">¿DESEAS ELIMINAR ESTE ARTÍCULO?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route' => ['admin.articles.destroy', 'id'], 'method' => 'GET' ]) !!}
        {!! csrf_field() !!}
          
          <div class="modal-body">
            <table class="table table-striped">
              <thead>
                <th>ID</th>
                <th>Imagen</th>
              </thead>
              <tbody>
                <tr>
                  {{-- Con el input oculto enviamos el id por medio del formulario --}}
                  <input type="hidden" name="idArticulo" id="id">
                  {{-- Mostramos el id en la tabla del MODAL--}}
                  <td><input style="width: 20px; border: none;" disabled type="text" id="id"></td>
                  {{-- Mostramos la imagen en la tabla del MODAL --}}
                  <td><div id="imagen"></div></td>
                  {{-- Mostramos es texto en el MODAL --}}
                </tr>
              </tbody>
            </table>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, salir</button>
            {{-- <a href="{{ route('articles.destroy', 'id') }}"><i class="fas fa-edit"></i>Eliminar</a> --}}
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </div>
      {!! Form::close() !!}
    </div>
  </div>
</div> 
@endsection

@section('js')    
  
  <script type="text/javascript">

    $("#delete").on('show.bs.modal', function(event){

      var a = $(event.relatedTarget)
      var id = a.data('id')
      var img = a.data('imagen')
      var title = a.data('title')
      
      var modal = $(this)

      $(".modal-body #imagen").html("");
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #title').val(title)
      modal.find('.modal-body #imagen').prepend('<img class="rounded" style="max-width: 100px;" src="{{ asset('') }}' + img + '" />')
      });

  </script>

  
@endsection