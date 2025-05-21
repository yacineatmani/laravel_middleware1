<!-- filepath: resources/views/articles/create.blade.php -->
<h1>Créer un article</h1>
<form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <label>Titre : <input type="text" name="titre" value="{{ old('titre') }}"></label><br>
    <label>Texte : <textarea name="texte">{{ old('texte') }}</textarea></label><br>
    <label>User ID : <input type="number" name="user_id" value="{{ old('user_id') }}"></label><br>
    <button type="submit">Créer</button>
</form>
<a href="{{ route('articles.index') }}">Retour à la liste</a>
@if($errors->any())
    <div style="color: red">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif