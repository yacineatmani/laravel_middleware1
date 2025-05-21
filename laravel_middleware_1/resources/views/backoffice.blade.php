<!-- filepath: resources/views/backoffice.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Backoffice</title>
</head>
<body>
    <h1>Backoffice</h1>
    <nav>
        <a href="{{ route('accueil') }}">Accueil</a> |
        <a href="{{ route('article') }}">Article</a>
    </nav>
</body>
</html>