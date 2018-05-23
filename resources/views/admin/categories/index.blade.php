@extends('layouts.app')
@section('title', 'Categorias')
@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-6">
        <a href="{{ route('categories.create') }}" class="btn btn-outline-dark">Crear categoría</a>
      </div>
      <br><br>
      <div class="col-md-6 col-sm-12 pull-right">
        {{-- BUSCADOR DE CATEGORIAS --}}
          {!! Form::open(['route' => 'categories.index', 'method' => 'GET']) !!}
          
            <div class="input-group">            
              {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar categoria...', 'aria-describedby' => 'search']) !!}
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
              @foreach ($categList as $categ)
                <tr>
                  <th scope="row">{{ $categ->id }}</th>
                  <td>{{ $categ->name }}</td>
                  <td>
                    <a href="{{ route('admin.categories.destroy', $categ->id)}}"><i class="far fa-trash-alt"></i></a>
                    <a href="{{ route('categories.edit', $categ->id) }}"><i class="fas fa-edit"></i></a>
                 </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      {{ $categList->render() }}
  </div>
</div>
  <div class="col-md-6">
    
  </div>
</div>


@endsection