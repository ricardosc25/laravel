@extends('layouts.app')
@section('title', 'Listado de tags')
@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-6">
        <a href="{{ route('tags.create') }}" class="btn btn-outline-dark">Crear tag</a>
      </div>
      <br><br>
      <div class="col-md-6 col-sm-12 pull-right">
        {{-- BUSCADOR DE TAGS --}}
          {!! Form::open(['route' => 'tags.index', 'method' => 'GET']) !!}
          
            <div class="input-group">            
              {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tags...', 'aria-describedby' => 'search']) !!}
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
              </div>
           </div>
          
          {!! Form::close() !!}
        {{-- FIN DE BUSCADOR DE TAGS --}} 
      </div>  
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-6">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Accion</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td>{{ $tag->name }}</td>
            <td>
              <a href="{{ route('admin.tags.destroy', $tag->id)}}"><i class="far fa-trash-alt"></i></a>
              <a href="{{ route('tags.edit', $tag->id) }}"><i class="fas fa-edit"></i></a>
           </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  {{ $tags->render() }}   
  </div>
</div>



@endsection