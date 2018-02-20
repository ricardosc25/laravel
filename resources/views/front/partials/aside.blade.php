<div class="panel panel-default">
  <div class="panel-heading">Categorias</div>
  <div class="panel-body">Panel Content
  	<ul class="list-group">
  			@foreach($categs as $categories)
  			<li class="list-group-item">
  			<span class="badge">{{ $categories->articles->count() }}</span>
  			<a href="{{ route('front.search.category', $categories->name) }}">{{ $categories->name }}</a>
  			</li>
  			@endforeach
  	</ul>
  </div>
</div>

<br>

<div class="panel panel-default">
  <div class="panel-heading">Tags</div>
  	<ul class="list-group">
  			@foreach($tags as $tags)
          <span class="label label-default">
            <a href="{{ route('front.search.tag', $tags->name) }}"></a> {{ $tags->name }} {{-- Enviamos el nombre del tag como parámetro --}}
            <span class="badge">{{ $tags->articles->count() }}</span>
          </span>
  			@endforeach
  	</ul>
</div>