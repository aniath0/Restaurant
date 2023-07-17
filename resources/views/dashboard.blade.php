<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">S'inscrire</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Deconnexion</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <ul class="list-disc pl-6">
            <li><i class="bi bi-list"><a href="{{ route('user.index') }}">Liste des personnes</a></i></li>
            <!-- Autres liens de menu -->
        </ul>

        <ul class="list-disc pl-6">
            <li><i class="bi bi-list"><a href="{{ route('posts.index') }}">Liste des articles</a></i></li>
            <!-- Autres liens de menu -->
        </ul>
    @yield('content')
</body>
</html>