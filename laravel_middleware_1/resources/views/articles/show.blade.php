<!-- filepath: resources/views/articles/show.blade.php -->
<h1>Détail de l'article</h1>
<p><strong>ID :</strong> {{ $article->id }}</p>
<p><strong>Titre :</strong> {{ $article->titre }}</p>
<p><strong>Texte :</strong> {{ $article->texte }}</p>
<p><strong>User ID :</strong> {{ $article->user_id }}</p>
<a href="{{ route('articles.index') }}">Retour à la liste</a>