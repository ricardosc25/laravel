@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <img class="mb-4" src="{{ asset('Image/Profile/Avatars/1521132035.jpg') }}" alt="" width="72" height="72">
            <h1 class="h4 mb-3 font-weight-normal">Please sign in</h1>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">Email address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Usuario">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
          
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="sr-only">Password</label>
              <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
               @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    </label>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>               
            </div>

            <div class="form-group">              
                
            </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>    
    </div>
    
</div>
@endsection
