<!-- filepath: resources/views/articles/edit.blade.php -->
<h1>Éditer l'article</h1>
<form action="{{ route('articles.update', $article) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Titre : <input type="text" name="titre" value="{{ old('titre', $article->titre) }}"></label><br>
    <label>Texte : <textarea name="texte">{{ old('texte', $article->texte) }}</textarea></label><br>
    <label>User ID : <input type="number" name="user_id" value="{{ old('user_id', $article->user_id) }}"></label><br>
    <button type="submit">Mettre à jour</button>
</form>
<a href="{{ route('articles.index') }}">Retour à la liste</a>
@if($errors->any())
    <div style="color: red">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif