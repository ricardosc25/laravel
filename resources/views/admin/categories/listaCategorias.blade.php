@extends('layouts.app')
@section('title', 'Listado de categorias')
@section('content')

<div class="row">
  <div class="col-md-6">
          <a href="{{ route('categories.create') }}" class="btn btn-outline-dark">Crear categoría</a>
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
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
  <div class="col-md-6">
    
  </div>
</div>


@endsection