<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCrudController extends Controller
{
    // Affiche la liste des articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('articles.create');
    }

    // Enregistre un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        Article::create($request->all());
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
    }

    // Affiche un article spécifique
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // Affiche le formulaire d'édition
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    // Met à jour un article existant
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect()->route('articles.index')->with('success', 'Article modifié avec succès.');
    }

    // Supprime un article
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}