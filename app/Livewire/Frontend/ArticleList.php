<?php

namespace App\Livewire\Frontend;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleList extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = '';

    #[Url]
    public $category = '';

    #[Url]
    public $dateFilter = '';

    public $categories = [];

    public function mount()
    {
        // Get all unique categories for the filter dropdown
        $this->categories = Article::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category')
            ->toArray();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingDateFilter()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->dateFilter = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::query();

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        // Apply category filter
        if ($this->category) {
            $query->where('category', $this->category);
        }

        // Apply date filter
        if ($this->dateFilter) {
            switch ($this->dateFilter) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->where('created_at', '>=', now()->subWeek());
                    break;
                case 'month':
                    $query->where('created_at', '>=', now()->subMonth());
                    break;
                case 'year':
                    $query->where('created_at', '>=', now()->subYear());
                    break;
            }
        }

        $articles = $query->latest()
            ->paginate(9)
            ->through(function ($article) {
                $article->image_url = $article->image ? Storage::url($article->image) : null;
                return $article;
            });

        return view('livewire.frontend.article-list', [
            'articles' => $articles,
        ]);
    }
}
