@extends('layouts.app')
@section('title', 'Listado de usuarios')
@section('content')

<a href="{{ route('users.create') }}" class="btn btn-default">Crear Usuario</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
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
	      	<a href="{{ route('admin.users.destroy', $user->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
	      	<a href="{{ route('users.edit', $user->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
	      </td>
	    </tr>
    @endforeach
  </tbody>
</table>
{{ $users->render() }}
@endsection