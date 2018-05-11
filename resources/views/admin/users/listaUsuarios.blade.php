@extends('layouts.app')
@section('title', 'Listado de usuarios')
@section('content')

<a href="{{ route('users.create') }}" class="btn btn-outline-dark">Crear Usuario</a>
<br><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Imagen</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($users as $user)
	    <tr>
	      <th scope="row">{{ $user->id }}</th>
	      <th scope="row"><img class="img-profile-user" src="{{ asset('image/profile/avatars/').'/'.$user->avatar }}"></th>
	      <td>{{ $user->name }}</td>
	      <td>{{ $user->email }}</td>
	      <td>
		      @if($user->type == "admin")
				<span class="label label-danger">{{ $user->type }}</span>
		  	  @else
				<span class="label label-primary">{{ $user->type }}</span>
			  @endif
	      </td>
	      <td>
	      	<a href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
	      	{{-- <a href="{{ route('admin.users.destroy', $user->id)}}"><i class="far fa-trash-alt"></i></a> --}}
	      	<a href="#" data-toggle="modal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-imagen="{{ $user->avatar }}" data-target="#deleteUser"><i class="far fa-trash-alt"></i></a>
	      </td>
	    </tr>
    @endforeach
  </tbody>
</table>
{{ $users->render() }}

<!-- Modal para confirmar la eliminación de un usuario -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">¿DESEAS ELIMINAR ESTE USUARIO?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route' => ['admin.users.destroy', 'id'], 'method' => 'GET' ]) !!}
        {!! csrf_field() !!}
          
          <div class="modal-body">
            <table class="table table-striped">
              <thead>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
              </thead>
              <tbody>
                <tr>
                  {{-- Con el input oculto enviamos el id por medio del formulario --}}
                  <input type="hidden" name="idUser" id="idUser">
                  {{-- Mostramos el id en la tabla del MODAL--}}
                  <td><p id="id"></p></td>
                  {{-- Mostramos la imagen en la tabla del MODAL --}}
                  <td><div id="imagen"></div></td>
                  {{-- Mostramos es texto en el MODAL --}}

                  {{-- <td><input style="background-color: red; border: none;" disabled type="text" id="nombre"></td> --}}
                  <td><p id="nombre"></p></td>
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

    $("#deleteUser").on('show.bs.modal', function(event){

      var a = $(event.relatedTarget)
      var id = a.data('id')
      var nombre = a.data('name')
      var img = a.data('imagen')

      $('.modal-body #imagen').html("")
      $('.modal-body #idUser').val(id)
      $('.modal-body #id').html(id)
      $('.modal-body #nombre').html(nombre)
      $('.modal-body #imagen').prepend('<img class="rounded img-profile-user" src="{{ asset('image/profile/avatars') }}' + "/" + img + '" />')
      });

  </script>

  
@endsection