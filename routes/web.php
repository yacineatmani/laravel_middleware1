<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BackofficeController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::get('/article', [ArticleController::class, 'index'])->name('article');

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/backoffice', [BackofficeController::class, 'index'])->name('backoffice');
});