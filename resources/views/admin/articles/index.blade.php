@extends('layouts.app')
@section('title', 'Listado de tags')
@section('content')
@if($article)
	@foreach($article as $art)
<div class="card" style="width: 20rem;">
	<div class="card-body">
		<h4 class="card-title">{{ $art->title }}</h4>
		<h6 class="card-subtitle mb-2 text-muted">{{ $art->category->name }} : {{ $art->user->name }}</h6>
		<p class="card-text">{{ $art->content }}</p>
		
		@foreach ($art->tags as $tag)
			<a href="#" class="card-link">{{ $tag->name}}</a>
		@endforeach

	</div>
</div>
	@endforeach
@else
<p>NO</p>	
@endif

{{ $article->render() }}


@endsection