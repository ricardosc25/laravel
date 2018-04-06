@extends('front.template.main');
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="row">
			
		@foreach($articles as $article)
		{{-- 	<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('front.view.article', $article->slug) }}" class="thumbnail">
							@foreach($article->images as $image)
								<img style="width: 300px; height: 180px;" class="img-responsive img-article" src="{{ asset('Image/Articles/' . $image->name) }}" alt="...."> 
							@endforeach
						</a>
						<a href="{{ route('front.view.article', $article->slug) }}"><h3 class="text-center"> {{ $article->title }} </h3></a>
						<hr>
						<i class="far fa-folder"></i> <a href="">{{ $article->category->name }}</a>
						<div class="pull-right">
							<i class="far fa-clock"></i> {{ $article->created_at->diffForHumans() }}
							<i class="far fa-address-card"></i>
						</div>
		  			</div>
				</div>		
			</div>--}}
			@if($article->id == 20)
				<div class="col-md-6">
					<div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
				</div>
			@endif
			
			{{-- <div class="col-md-4" style="padding-bottom: 10px;">
				<div class="card">
					<a href="#" class="thumbnail">
						@foreach($article->images as $image)
						    <img style="width: 348px; height: 185px;" class="card-img-top img-responsive" src="{{ asset('Image/Articles/' . $image->name) }}" alt="Card image cap">
						@endforeach
					</a>
					<div class="card-body">
						<h5 class="card-title">Tres periodistas ecuatorianos secuestrados; dos visiones sobre el manejo de la información</h5>
						<p class="card-text">This card has supporting text below as a natural lead-in to additional content. This card has supporting text below as a natural lead-in to additional content.</p>
						<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					</div>
				</div>
			</div> --}}

		@endforeach
		</div>
	</div>

</div>

{!! $articles->render() !!}

{{-- <div class="col-md-4">
	@include('front.partials.aside')
</div> --}}

@endsection()