<div>
    <!-- Hero Banner -->
    <section class="bg-gradient-to-br from-primary/10 via-secondary/10 to-accent/10 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm opacity-60 mb-4">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span>/</span>
                <span>Articles</span>
                <span>/</span>
                <span class="text-primary">{{ Str::limit($article->title, 30) }}</span>
            </div>
            <h1
                class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent leading-tight">
                {{ $article->title }}
            </h1>
            <div class="flex items-center gap-4 mt-6">
                <div class="flex items-center gap-2 text-sm opacity-70">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $article->created_at->format('F d, Y') }}</span>
                </div>
                @if ($article->category)
                    <div class="badge badge-primary">{{ $article->category }}</div>
                @endif
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-base-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Article Content -->
                <div class="flex-1">
                    <article class="prose prose-lg max-w-none">
                        @if ($article->image_url)
                            <figure class="rounded-2xl overflow-hidden mb-8 shadow-xl">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                    class="w-full max-h-[30rem] object-cover" />
                            </figure>
                        @endif
                        <div class="article-content">
                            {!! $article->content !!}
                        </div>
                    </article>

                    <!-- Back Button -->
                    <div class="mt-12">
                        <a href="{{ route('home') }}#articles" class="btn btn-outline btn-primary gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Articles
                        </a>
                    </div>
                </div>

                <!-- Sidebar - Recommendations -->
                <aside class="lg:w-80 xl:w-96">
                    <div class="sticky top-8">
                        <div class="bg-base-200 rounded-2xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                Recommended Articles
                            </h3>
                            <div class="space-y-4">
                                @forelse($recommendations as $rec)
                                    <a href="{{ route('article.show', $rec) }}" class="block group">
                                        <div
                                            class="card bg-base-100 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                            @if ($rec->image_url)
                                                <figure class="h-32 overflow-hidden">
                                                    <img src="{{ $rec->image_url }}" alt="{{ $rec->title }}"
                                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                                </figure>
                                            @endif
                                            <div class="card-body p-4">
                                                <h4
                                                    class="font-semibold text-sm group-hover:text-primary transition-colors line-clamp-2">
                                                    {{ $rec->title }}
                                                </h4>
                                                <div class="flex items-center gap-2 text-xs opacity-60 mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>{{ $rec->created_at->format('M d, Y') }}</span>
                                                </div>
                                                @if ($rec->category)
                                                    <div class="badge badge-outline badge-sm mt-2">{{ $rec->category }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-sm opacity-70">No recommendations available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-primary to-secondary text-primary-content">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Want to Learn More?</h2>
            <p class="text-lg mb-8 opacity-90">Explore our courses and start your learning journey today!</p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="{{ route('home') }}#courses" class="btn btn-lg bg-base-100 text-primary hover:bg-base-200">
                    Browse Courses
                </a>
                <a href="{{ route('home') }}#articles"
                    class="btn btn-lg btn-outline border-white text-white hover:bg-white hover:text-primary">
                    More Articles
                </a>
            </div>
        </div>
    </section>
</div>
