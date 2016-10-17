<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name') }}
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
            @endif
        </ul>

        @if (Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form id="logout" method="post" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                    </form>

                    <a href="#" onclick="document.getElementById('logout').submit();">Saír</a>
                </li>
            </ul>

            <p class="navbar-text navbar-right">Olá, <a href="{{ route('users.show', auth()->id()) }}" class="navbar-link">{{ auth()->user()->name }}</a></p>
        @endif
    </div>
</nav>
