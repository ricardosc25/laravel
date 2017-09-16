@extends('layouts.app')

@section('title', 'MAC')

@section('sidebar')
@parent

@endsection

@section('content')

<div class="card" style="width: 20rem;">
	<div class="card-body">
		<h4 class="card-title">{{ $prueba->title }}</h4>
		<h6 class="card-subtitle mb-2 text-muted">{{ $prueba->category->name }} : {{ $prueba->user->name }}</h6>
		<p class="card-text">{{ $prueba->content }}</p>
		
		@foreach ($prueba->tags as $tag)
			<a href="#" class="card-link">{{ $tag->name}}</a>
		@endforeach
	</div>
</div>

@endsection