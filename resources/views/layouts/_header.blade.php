<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                Japensouse
            </a>
        </div>

        <ul class="nav navbar-nav">
            @if (Auth::check())
                <li class="{{ Route::is('home*') ? 'active' : null }}">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="{{ Route::is('ideas*') ? 'active' : null }}">
                    <a href="{{ route('ideas') }}">Idéias</a>
                </li>
                <li class="{{ Route::is('users*') ? 'active' : null }}">
                    <a href="{{ route('users') }}">Usuários</a>
                </li>
                {{--<li class="{{ Route::is('reports*') ? 'active' : null }}">--}}
                    {{--<a href="{{ route('reports') }}">Relatórios</a>--}}
                {{--</li>--}}
            @endif
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Entrar</a></li>
            @else
                <li><a href="{{ route('logout') }}">Saír</a></li>
            @endif
        </ul>

        @if (Auth::check())
            <p class="navbar-text navbar-right">Olá, <a href="{{ route('users.show', auth()->id()) }}" class="navbar-link">{{ auth()->user()->name }}</a></p>
        @endif
    </div>
</nav>
