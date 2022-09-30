<header>
    <nav class="navbar navbar-light navbar-expand-lg bg-white border-bottom border-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 64 64" width="64px" height="64px"><path d="M 18.998047 15 A 17.002 17.002 0 0 0 18.998047 49.003906 A 17.002 17.002 0 0 0 18.998047 15 z M 45.498047 16 A 8.502 16.002 0 0 0 45.498047 48.003906 A 8.502 16.002 0 0 0 45.498047 16 z M 58.5 17 A 3.5 15.002 0 1 0 58.5 47.003906 A 3.5 15.002 0 1 0 58.5 17 z"/></svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('articles/manage') }}">Manage Articles</a>
                        </li>
                    @endauth
                </ul>
                <form class="d-flex">
                    @guest
                        <a class="btn btn-dark me-2" href="{{ url('login') }}">login</a>
                        <a class="btn btn-outline-dark" href="{{ url('register') }}">Register</a>
                    @endguest
                </form>

                @auth
                    <form class="d-flex" role="search" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>
</header>
