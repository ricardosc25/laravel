@extends('layouts.app')
@section('title', 'Listado de articulos')
@section('content')

<a href="{{ route('articles.create') }}" class="btn btn-default">Crear artículo</a>
<table class="table table-striped">
    <thead>
            <th>ID</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Autor</th>
            <th>Accion</th>
    </thead>
    <tbody>

	    	@foreach($article as $art)
	    	<tr>
	    		<td>{{ $art->id }}</td>
	    		<td>{{ $art->title }}</td>
	    		<td>{{ $art->category->name }}</td>
	    		<td>{{ $art->user->name }}</td>
	    		<td>
                    <a href="{{ route('admin.articles.destroy', $art->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                    <a href="{{ route('articles.edit', $art->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                 </td>
	    	</tr>
	    	@endforeach

 	</tbody>
</table>


@endsection