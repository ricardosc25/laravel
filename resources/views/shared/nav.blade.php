 <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Home
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if(Auth::user())
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.articles.articulos') }}">Articulos <span class="sr-only">(current)</span></a></li>
                @if(Auth::user()->type == 'admin')
                    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                @endif
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorías<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('categories.index') }}">Ver categorías</a></li>
                    <li><a href="{{ route('categories.create') }}">crear categoría</a></li>
                </ul>
            </li>
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('tags.index') }}">Ver tags</a></li>
                    <li><a href="{{ route('tags.create') }}">Crear tag</a></li>
                </ul>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style=" position: relative; padding-left: 50px;">
                    <img src="{{ asset('Image/Profile/Avatars/' . Auth::user()->avatar) }}" style="width: 32px; height: 32px; top:10px; left:10px; position:absolute; border-radius:50%;">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('front.profile') }}"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"> Logout</i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </li>
            </ul>
        </li>
        @endguest
    </ul>
</div>
@endif
</div>
</nav>