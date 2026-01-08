<?php

namespace App\Livewire\Frontend;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $articles = Article::latest()->take(6)->get()->map(function ($article) {
            $article->image_url = $article->image ? Storage::url($article->image) : null;
            return $article;
        });

        return view('livewire.frontend.home', [
            'articles' => $articles,
        ]);
    }
}
