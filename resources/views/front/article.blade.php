@extends('front.template.main')
@section('title',$article->title)
@section('content')
	<div class="page-header">
  		<h1>{{$article->title}} <small>Subtext for header</small></h1>
  		{!! $article->content !!}
	</div>
@endsection