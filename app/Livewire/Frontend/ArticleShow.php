<?php

namespace App\Livewire\Frontend;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ArticleShow extends Component
{
    public Article $article;
    public $recommendations;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->article->image_url = $this->article->image ? Storage::url($this->article->image) : null;

        // Get 5 random articles for recommendations, excluding current article
        $this->recommendations = Article::where('id', '!=', $article->id)
            ->inRandomOrder()
            ->take(5)
            ->get()
            ->map(function ($rec) {
                $rec->image_url = $rec->image ? Storage::url($rec->image) : null;
                return $rec;
            });
    }

    public function render()
    {
        return view('livewire.frontend.article-show');
    }
}
