<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logoImg" src="{{ asset('logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">My Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">My Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">My Music</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{ route('post.add') }}">New Post</a>
                    </li>
                @endauth

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}

            </ul>
            <ul class="navbar-nav d-flex m-3">
                @auth
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('user.profile', Auth::user()->id) }}">{{ Auth::user()->email }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('user.loggingout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>
