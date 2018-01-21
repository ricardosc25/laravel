@extends('layouts.app')
@section('title', 'Listado de tags')
@section('content')

<div class="row">
  <div class="col-md-6">
          <a href="{{ route('tags.create') }}" class="btn btn-default">Crear tag</a>
          <div class="col-sm-12 col-md-6 col-lg-6 pull-right">
          {{-- BUSCADOR DE TAGS --}}
          {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'nabvar-form pull-right']) !!}
            <div class="input-group">
              {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tags...', 'aria-describedby' => 'search']) !!}
              <span class="input-group-addon" id="search">@</span>
           </div>
          {!! Form::close() !!}
          {{-- FIN DE BUSCADOR DE TAGS --}}  
          </div>
          <hr>
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tags as $tag)
                <tr>
                  <th scope="row">{{ $tag->id }}</th>
                  <td>{{ $tag->name }}</td>
                  <td>
                    <a href="{{ route('admin.tags.destroy', $tag->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                    <a href="{{ route('tags.edit', $tag->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                 </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      {{ $tags->render() }}
  </div>
  <div class="col-md-6">
    
  </div>
</div>


@endsection