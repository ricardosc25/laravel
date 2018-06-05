@extends('front.template.main')
@section('content')
	
<div class="row">
	@foreach($article as $article)
	<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
		<div class="card-deck">
			<div class="card">
				@foreach($article->images as $image)
				<img class="card-img-top" src="{{ asset($image->name) }}" alt="Card image cap">
				@endforeach
				<div class="card-body">
					<small class="text-mute">{{ strtoupper($article->category->name) }} </small>
					<h6 class="card-title">{{ $article->title }}</h6>
				</div>
				<div class="card-footer">
					<small class="text-muted pull-left">Por {{ strtoupper($article->user->name) }} </small>
					<small class="text-muted pull-right">
						<small class="text-muted"><i class="fas fa-clock"></i></small>
						{{ $article->created_at->diffForHumans() }}
					</small>
				</div>
			</div>
		</div>
	</div> 
	@endforeach  

@endsection()