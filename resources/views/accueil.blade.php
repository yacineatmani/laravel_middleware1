<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Ceci est la page d'accueil de notre application.</p>
    <nav>
        <ul>
            <li><a href="{{ route('article') }}">Articles</a></li>
            @if(Auth::check())
                <li><a href="{{ route('backoffice') }}">Backoffice</a></li>
            @endif
        </ul>
    </nav>
</body>
</html>