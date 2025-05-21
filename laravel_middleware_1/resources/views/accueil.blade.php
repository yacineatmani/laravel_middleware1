<!-- filepath: resources/views/accueil.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <nav>
        <a href="{{ route('article') }}">Article</a> |
        <a href="{{ route('backoffice') }}">Backoffice</a>
        <!-- Ajoute dans le <nav> -->
<a href="{{ route('login') }}">Login</a> |
<a href="{{ route('logout') }}">Logout</a>
    </nav>
</body>
</html>