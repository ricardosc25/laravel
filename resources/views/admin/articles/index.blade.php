@extends('layouts.app')
@section('title', 'Listado de tags')
@section('content')
<h1>Recorte de imagen</h1>
<figure>
	<img id="" src="{{ asset('Image/Articles/laravel_1516831146.jpg') }}"><br>
	<button id="boton_recorte" class="btn btn-primary">Recortar</button>
	X1:
	<input type="text" id="x1" size="4">
	Y1:
	<input type="text" id="y1" size="4">
	X2:
	<input type="text" id="x2" size="4">
	Y2:
	<input type="text" id="y2" size="4">
	Anchura:
	<input type="text" id="ancho" size="4">
	Altura:
	<input type="text" id="alto" size="4">
</figure>

<figure id="zona_recorte" style="width: 100px; height: 100px; overflow: hidden;"></figure>
{!! Form::open(['method' => 'POST', 'files' => 'TRUE']) !!}
    {!! Form::label('image','Imagen') !!}
    {!! Form::file('image', null, ['class' => 'form-control', 'id' => 'foto' ]) !!}
    <br>
    <button id="boton_recorte" class="btn btn-primary">Recortar</button>
{!! Form::close() !!}

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
	var x1 = 0; y1 = 0; x2 = 0; y2 = 0; anchura = 0; altura	 = 0;
    $('input#foto').imgAreaSelect({
    	fadeSpeed:300,
        handles: true,
        onSelectEnd: function(img, sel){
        	x1 = sel.x1;
        	y1 = sel.y1;
        	x2 = sel.x2;
        	y2 = sel.y2;
        	anchura = sel.width;
        	altura = sel.height;
        }
    });

    $('#boton_recorte').on('click', function(e){

        e.preventDefault();

    	if(anchura == 0 || altura == 0) return;
        var url = form.attr('action');
    	$.ajax({
    		url: '{{ asset('recorteImagen.php') }}',
    		type: 'POST',
    		data:{
    			'x1':x1,
    			'y2':y2,
    			'x2':x2,
    			'y2':y2,
    			'anchura':anchura,
    			'altura':altura,
    			'imagen':'Image/Articles/laravel_1516831146.jpg'
    		},
    		success:function(){
    			$('#zona_recorte').html('');
    			var r = Math.random();
    			var recorte = '<img src="{{ asset('Image/Articles/recorte.jpg?') }}' + r + '" alt="" border="0">';
    			$('#zona_recorte').html(recorte);
    		}
    	})
    })

});
</script>
{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('.delete').click(function(){
            alert('Presionaste el boton para eliminar')
        })
    });
</script> --}}
@endsection