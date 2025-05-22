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
        <!-- Ajoute dans le menu de gauche -->
        <a href="{{ route('articles.index') }}">Gestion des articles</a>
        <a href="{{ route('accueil') }}">Accueil</a> |
        <a href="{{ route('article') }}">Article</a>
    </nav>
    @if(Session::get('role') === 'admin')
    <a href="{{ route('users.index') }}">Gestion des utilisateurs</a>
@endif
</body>
</html>