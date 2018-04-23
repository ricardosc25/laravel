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
                    <a href="#" data-toggle="modal" data-target=".confirmarEliminarArticulo"><i class="far fa-trash-alt"></i></a>
                 </td>
                 <td>{!! $art->status_public ? '<span class="badge badge-success">Publicado</span>' : '<span class="badge badge-warning">No publicado</span>' !!}</td>
	    	</tr>
	    	@endforeach

 	</tbody>
</table>
<!-- Modal para confirmar la eliminación de un artículo -->
<div class="modal confirmarEliminarArticulo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CONFIRMAR LA ELIMINACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger"href="{{ route('admin.articles.destroy', $art->id)}}">Eliminar</a>
      </div>
    </div>
  </div>
</div> 
@endsection