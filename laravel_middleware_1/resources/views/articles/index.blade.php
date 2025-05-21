<!-- filepath: resources/views/articles/index.blade.php -->
<h1>Liste des articles</h1>
<a href="{{ route('articles.create') }}">Créer un article</a>
@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Texte</th>
        <th>User ID</th>
        <th>Actions</th>
    </tr>
    @foreach($articles as $article)
    <tr>
        <td>{{ $article->id }}</td>
        <td>{{ $article->titre }}</td>
        <td>{{ $article->texte }}</td>
        <td>{{ $article->user_id }}</td>
        <td>
            <a href="{{ route('articles.show', $article) }}">Voir</a> |
            <a href="{{ route('articles.edit', $article) }}">Éditer</a> |
            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>