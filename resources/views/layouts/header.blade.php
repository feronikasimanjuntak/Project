<nav class="navbar navbar-expand-md navbar" style="background-color: #ffffff;">
    <div class="container">
        <h1><a class="navbar-brand text-uppercase" href="{{ url('/') }}">
            Fashion
        </a></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-dark mr-2" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-dark" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                        </li>
                    @endif
                @else
                    @role('admin')
                        <h3><li><a class="nav-link" href="{{ route('beranda.index') }}">Home</a></li></h3>
                        <h3><li><a class="nav-link" href="{{ route('users.index') }}">Users</a></li></h3>
                        <h3><li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li></h3>
                        <h3><li><a class="nav-link" href="{{ route('outfits.index') }}">Outfit</a></li></h3>
                        <h3><li><a class="nav-link" href="{{ route('shop.index') }}">Shop</a></li></h3>
                        <!-- <h3><li><a class="nav-link" href="{{ route('outfits.index') }}">Cart</a></li></h3> -->
                    @endrole
                    @role('user')
                        <h3><li><a class="nav-link" href="{{ route('beranda.index') }}">Home</a></li></h3>
                        <h3><li><a class="nav-link" href="{{ route('outfits.index') }}">Outfit</a></li></h3>
                        <h3><li><a class="nav-link" href="{{ route('shop.index') }}">Shop</a></li></h3>
                        <!-- <h3><li><a class="nav-link" href="{{ route('outfits.index') }}">Cart</a></li></h3> -->
                    @endrole
                    <h3><li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li></h3>
                @endguest
            </ul>
        </div>
    </div>
</nav>
