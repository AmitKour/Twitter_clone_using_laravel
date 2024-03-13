<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                @guest()


                <li class="nav-item">
                    <a class="nav-link{{ Route::is('login') ? ' active' : '' }}" aria-current="page" href="{{ route('login') }}" onclick="event.target.classList.add('active')">Login</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Route::is('register') ? ' active' : '' }}" aria-current="page" href="{{ route('register') }}" onclick="event.target.classList.add('active')">Register</a>

                </li>
                @endguest
                @auth()
                @if(Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link{{ Route::is('admin.dashboard') ? ' active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}" onclick="event.target.classList.add('active')">Admin Dashboard</a>

                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link{{ Route::is('profile') ? ' active' : '' }}" aria-current="page" href="{{ route('profile') }}" onclick="event.target.classList.add('active')">Profile</a>

                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit"> Logout</button>

                </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
