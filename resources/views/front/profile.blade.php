@extends('layouts.app')
@section('title','profile')
@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<img src="{{ asset('Image/Profile/Avatars/' . $user->avatar) }}" style="width: 150px; height: 150px; float:left; border-radius:50%; margin-right: 25px;">
		<h4>{{ $user->name }}</h4>
		<form enctype="multipart/form-data" action="{{ route('front.profile') }} " method="POST">
			<label for="avatar">Update profile image</label>
			<input type="file" name="avatar">
			<input type="hidden" name="_token" value="{{ csrf_token() }} ">
			<input type="submit" class="pull-right btn btn-sm btn-primary">
		</form>
	</div>
</div>
	
@endsection
