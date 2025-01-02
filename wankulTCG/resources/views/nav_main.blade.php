<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('wankul_logo.png') }}" alt="Logo" style="width: 120px; height: auto;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://wankul.fr/pages/wankuldex" target="_blank" rel="noopener noreferrer">Wankul-dex</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Se Déconnecter</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Se Connecter</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-success">S'inscrire</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
