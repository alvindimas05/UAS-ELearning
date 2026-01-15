<?php

use App\Livewire\Frontend\ArticleList;
use App\Livewire\Frontend\ArticleShow;
use App\Livewire\Frontend\Home;
use Illuminate\Support\Facades\Route;

Route::get('', Home::class)->name('home');
Route::get('contact', \App\Livewire\Frontend\Contact::class)->name('contact');
Route::prefix('article')->name('article.')->group(function () {
    Route::get('', ArticleList::class)->name('index');
    Route::get('{article}', ArticleShow::class)->name('show');
});
