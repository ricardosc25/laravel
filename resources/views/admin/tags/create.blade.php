@extends('layouts.app')
@section('title', 'Creación de tag')
@section('content')
<h1>Crear Tag</h1>

<div class="row">
	<div class="col-md-4">
		{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}	
	</div>

</div>

@endsection