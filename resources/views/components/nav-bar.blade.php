<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo.png')}}" style="max-width: 120px;" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <span class=""></span>
                        <a class="nav-link active" href="#" onclick="function(e){ e.preventDefault(); }"><b>{{ Str::upper('Welcome '.auth()->user()->name) }}</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/listings/manage"><i class="fa-solid fa-gear"></i>&nbsp;Manage Listings</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-link text-dark" style="text-decoration:none;"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/register"><i class="fa-solid fa-user-plus"></i>&nbsp;Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/login"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>