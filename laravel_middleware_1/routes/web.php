<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\ArticleCrudController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::middleware('auth.custom')->group(function () {
    Route::get('/article', [ArticleController::class, 'index'])->name('article');
    Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice');
});
Route::middleware(['role.verification'])->group(function () {
    Route::resource('articles', ArticleCrudController::class);
    // ...autres routes protégées...
});
Route::middleware('role.verification')->group(function () {
    Route::get('/article', [ArticleController::class, 'index'])->name('article');
    Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice');
});

Route::get('/login/{role?}', function ($role = 'user') {
    Session::put('is_logged', true);
    Session::put('role', $role);
    return redirect()->route('accueil');
})->name('login');

Route::get('/logout', function () {
    // Déconnecte (supprime la variable de session)
    Session::forget('is_logged');
    return redirect()->route('accueil');
})->name('logout');
Route::middleware(['role.verification'])->group(function () {
    Route::resource('articles', ArticleCrudController::class);
    Route::get('/backoffice/users', [UserController::class, 'index'])->name('users.index');
    // ...autres routes protégées...
});