<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BackofficeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::middleware('auth.custom')->group(function () {
    Route::get('/article', [ArticleController::class, 'index'])->name('article');
    Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice');
});

Route::get('/login', function () {
    // Simule une connexion (stocke une variable en session)
    Session::put('is_logged', true);
    return redirect()->route('accueil');
})->name('login');

Route::get('/logout', function () {
    // Déconnecte (supprime la variable de session)
    Session::forget('is_logged');
    return redirect()->route('accueil');
})->name('logout');