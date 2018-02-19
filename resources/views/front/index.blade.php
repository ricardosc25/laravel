@extends('front.template.main');
@section('content')

<div class="col-md-8">
	<div class="row">
		@foreach($articles as $article)
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="" class="thumbnail">
							@foreach($article->images as $image)
								<img style="width: 300px; height: 180px;" class="img-responsive img-article" src="{{ asset('Image/Articles/' . $image->name) }}" alt="...."> 
							@endforeach
						</a>
						<h3 class="text-center"> {{ $article->title }} </h3>
						<hr>
						<i class="far fa-folder"></i> <a href="">Category</a>
						<div class="pull-right">
							<i class="far fa-clock"></i>Hace 3 minutos
							<i class="far fa-address-card"></i>
						</div>
		  			</div>
				</div>		
			</div>
		@endforeach
	</div>
</div>

@endsection()