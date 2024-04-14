<nav class="navbar navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">conduit</a>
        <ul class="nav navbar-nav pull-xs-right">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/post/create">Create</a>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    {{ __('Profile') }}
                </a>
            </li>
            <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="/login">Sign in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Sign up</a>
            </li>
        @endauth
        </ul>
    </div>
</nav>
