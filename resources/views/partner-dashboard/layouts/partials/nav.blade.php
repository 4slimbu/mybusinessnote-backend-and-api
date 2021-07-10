<div class="navbar navbar-dark bg-dark sticky-top">
    <div class="container-fluid d-flex justify-content-between">
        <a href="/" class="navbar-brand"><img src="{{ asset('images/logo-white.png')}}"/></a>


        <nav class="nav user-nav">

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        My Account <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            @endif

        </nav>

    </div>

    @if($flash = session('message'))
        <div class="alert alert-success" role="alert">
            {{ $flash }}
        </div>
    @endif
</div>