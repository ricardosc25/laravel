<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="{{ asset('Image/Profile/Avatars/1521132035.jpg') }}" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    @if(Auth::user())
    <ul class="navbar-nav w-100">
       <li class="nav-item active">
        <a class="nav-link" href="{{ route('front.index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">Articulos <span class="sr-only">(current)</span></a>
        </li>
        @if(Auth::user()->type == 'admin')
        <li><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
        @endif
        <li><a class="nav-link" href="{{ route('categories.index') }}">Categorías</a></li>
        <li><a class="nav-link" href="{{ route('tags.index') }}">Tags</a></li>
        <li class="nav-item dropdown ml-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" position: relative; padding-left: 50px;">
                <img class="img-profile" src="{{ asset('Image/Profile/Avatars/' . Auth::user()->avatar) }}">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('front.profile_update_avatar') }}"> <i class="fas fa-user-circle"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
@endif
</div>
</nav>
<br>
