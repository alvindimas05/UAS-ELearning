<div>
    <!-- Hero Banner -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm opacity-60 mb-4">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span>/</span>
                <span class="text-primary">Articles</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold bg-primary bg-clip-text text-transparent leading-tight">
                Articles & News
            </h1>
            <p class="mt-4 text-lg opacity-70 max-w-2xl">
                Stay updated with the latest trends in education, technology, and learning strategies.
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="py-8 bg-base-200 top-0 z-40 shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                <!-- Search Bar -->
                <div class="form-control w-full lg:w-96">
                    <div class="input-group relative">
                        <span class="absolute left-3 top-1/2 z-1 -translate-y-1/2 text-base-content/50">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search articles..."
                            class="input input-bordered w-full pl-10 focus:input-primary" />
                        @if ($search)
                            <button wire:click="$set('search', '')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-base-content/50 hover:text-primary">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Filter Dropdowns -->
                <div class="flex flex-wrap gap-4 items-center">
                    <!-- Category Filter -->
                    <div class="form-control">
                        <select wire:model.live="category" class="select select-bordered focus:select-primary">
                            <option value="">All Categories</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date Filter -->
                    <div class="form-control">
                        <select wire:model.live="dateFilter" class="select select-bordered focus:select-primary">
                            <option value="">All Time</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="year">This Year</option>
                        </select>
                    </div>

                    <!-- Clear Filters Button -->
                    @if ($search || $category || $dateFilter)
                        <button wire:click="clearFilters" class="btn btn-outline btn-error btn-sm gap-2">
                            <i class="fa-solid fa-xmark"></i>
                            Clear Filters
                        </button>
                    @endif
                </div>
            </div>

            <!-- Active Filters Display -->
            @if ($search || $category || $dateFilter)
                <div class="flex flex-wrap gap-2 mt-4">
                    @if ($search)
                        <div class="badge badge-primary gap-2">
                            Search: {{ $search }}
                            <button wire:click="$set('search', '')" class="hover:text-primary-content/70">×</button>
                        </div>
                    @endif
                    @if ($category)
                        <div class="badge badge-secondary gap-2">
                            Category: {{ $category }}
                            <button wire:click="$set('category', '')" class="hover:text-secondary-content/70">×</button>
                        </div>
                    @endif
                    @if ($dateFilter)
                        <div class="badge badge-accent gap-2">
                            Date:
                            {{ ucfirst($dateFilter == 'today' ? 'Today' : ($dateFilter == 'week' ? 'This Week' : ($dateFilter == 'month' ? 'This Month' : 'This Year'))) }}
                            <button wire:click="$set('dateFilter', '')" class="hover:text-accent-content/70">×</button>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-12 bg-base-100">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Results Count -->
            <div class="mb-8 flex items-center justify-between">
                <p class="text-base-content/70">
                    Showing <span class="font-semibold text-base-content">{{ $articles->count() }}</span> of
                    <span class="font-semibold text-base-content">{{ $articles->total() }}</span> articles
                </p>
            </div>

            <!-- Loading State -->
            <div wire:loading.delay
                class="fixed inset-0 bg-base-100/50 backdrop-blur-sm z-50 flex items-center justify-center">
                <div class="flex flex-col items-center gap-4">
                    <span class="loading loading-spinner loading-lg text-primary"></span>
                    <span class="text-lg font-medium">Loading articles...</span>
                </div>
            </div>

            <!-- Articles Grid -->
            <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <article onclick="window.location.href = '{{ route('article.show', $article) }}'"
                        class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 cursor-pointer border border-base-200">
                        @if ($article->image_url)
                            <figure class="h-48 overflow-hidden">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                            </figure>
                        @else
                            <figure class="h-48 bg-primary flex items-center justify-center">
                                <i class="fa-solid fa-book-open-reader text-4xl text-primary"></i>
                            </figure>
                        @endif
                        <div class="card-body">
                            <div class="flex items-center gap-2 text-sm opacity-60 mb-2">
                                <i class="fa-solid fa-calendar text-base-content/50"></i>
                                <span>{{ $article->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="card-title text-xl line-clamp-2">{{ $article->title }}</h3>
                            <p class="opacity-70 line-clamp-3">{{ Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            @if ($article->category)
                                <div class="flex gap-2 mt-4">
                                    <div class="badge badge-outline badge-primary">{{ $article->category }}</div>
                                </div>
                            @endif
                            <div class="card-actions justify-end mt-4">
                                <span class="link link-primary font-medium">Read more →</span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="flex flex-col items-center gap-4">
                            <i class="fa-solid fa-book-open-reader text-2xl text-primary"></i>
                            <h3 class="text-2xl font-bold">No Articles Found</h3>
                            <p class="text-lg opacity-70 max-w-md">
                                We couldn't find any articles matching your search criteria. Try adjusting your filters
                                or search term.
                            </p>
                            @if ($search || $category || $dateFilter)
                                <button wire:click="clearFilters" class="btn btn-primary mt-4">
                                    Clear All Filters
                                </button>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($articles->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-primary-content">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Learning?</h2>
            <p class="text-lg mb-8 opacity-90">Explore our courses and start your learning journey today!</p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="{{ route('get-started') }}" class="btn btn-lg bg-base-100 text-primary hover:bg-base-200">
                    Get Started
                </a>
                <a href="{{ route('home') }}"
                    class="btn btn-lg btn-outline border-white text-white hover:bg-white hover:text-primary">
                    Back to Home
                </a>
            </div>
        </div>
    </section>
</div>
