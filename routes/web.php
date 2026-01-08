<?php

use App\Livewire\Frontend\ArticleShow;
use App\Livewire\Frontend\Home;
use Illuminate\Support\Facades\Route;

Route::get('', Home::class)->name('home');
Route::prefix('article')->name('article.')->group(function () {
    Route::get('{article}', ArticleShow::class)->name('show');
});
