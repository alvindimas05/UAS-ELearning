<div>
    <!-- Hero Section -->
    <section class="hero min-h-screen bg-gradient-to-br from-primary/10 via-secondary/10 to-accent/10">
        <div class="hero-content flex-col lg:flex-row-reverse gap-12">
            <div class="flex-1 flex items-center justify-center animate__animated animate__fadeInRight">
                <!-- Lottie Animation -->
                <dotlottie-wc src="{{ asset('lottie/learning.lottie') }}" autoplay="true" loop="true"></dotlottie-wc>
            </div>
            <div class="flex-1">
                <h1
                    class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent leading-tight animate__animated animate__fadeInLeft">
                    Learn Without Limits
                </h1>
                <p class="py-6 text-lg opacity-80 animate__animated animate__fadeInLeft">
                    Access world-class education from anywhere. Join thousands of students advancing their careers
                    through our innovative online learning platform.
                </p>
                <div class="flex gap-4 flex-wrap animate__animated animate__fadeInUp">
                    <a href="#courses" class="btn btn-primary btn-lg">Explore Courses</a>
                    <a href="#about" class="btn btn-outline btn-lg">Learn More</a>
                </div>
                <div class="flex gap-8 mt-8 animate__animated animate__fadeInUp animate__delay-1s">
                    <div>
                        <div class="stat-value text-primary">50K+</div>
                        <div class="stat-desc">Active Students</div>
                    </div>
                    <div>
                        <div class="stat-value text-secondary">500+</div>
                        <div class="stat-desc">Courses</div>
                    </div>
                    <div>
                        <div class="stat-value text-accent">95%</div>
                        <div class="stat-desc">Success Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="about" class="py-20 bg-base-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Why Choose UniLearn?</h2>
                <p class="text-lg opacity-70">Experience the future of education with our cutting-edge platform</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="card-body items-center text-center">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-book fa-2xl text-primary"></i>
                        </div>
                        <h3 class="card-title">Expert Instructors</h3>
                        <p class="opacity-70">Learn from industry professionals and academic experts with years of
                            experience</p>
                    </div>
                </div>
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="card-body items-center text-center">
                        <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-clock fa-2xl text-secondary"></i>
                        </div>
                        <h3 class="card-title">Flexible Learning</h3>
                        <p class="opacity-70">Study at your own pace, anytime and anywhere that suits your schedule</p>
                    </div>
                </div>
                <div
                    class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="card-body items-center text-center">
                        <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-graduation-cap fa-2xl text-accent"></i>
                        </div>
                        <h3 class="card-title">Verified Certificates</h3>
                        <p class="opacity-70">Earn recognized certificates to boost your career and showcase your skills
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Popular Courses Section -->
    <section id="courses" class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Popular Courses</h2>
                <p class="text-lg opacity-70">Start your learning journey with our most popular programs</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <figure class="h-48 bg-gradient-to-br from-blue-500 to-purple-600">
                        <div class="text-white text-6xl">💻</div>
                    </figure>
                    <div class="card-body">
                        <div class="badge badge-primary">Technology</div>
                        <h3 class="card-title mt-2">Full Stack Web Development</h3>
                        <p class="opacity-70">Master modern web development with React, Node.js, and more</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center gap-2">
                                <div class="rating rating-sm">
                                    <input type="radio" class="mask mask-star-2 bg-orange-400" disabled checked />
                                </div>
                                <span class="text-sm">4.8 (2.5k)</span>
                            </div>
                            <span class="font-bold">$49</span>
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <button class="btn btn-primary btn-block">Enroll Now</button>
                        </div>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <figure class="h-48 bg-gradient-to-br from-green-500 to-teal-600">
                        <div class="text-white text-6xl">📊</div>
                    </figure>
                    <div class="card-body">
                        <div class="badge badge-secondary">Business</div>
                        <h3 class="card-title mt-2">Data Science & Analytics</h3>
                        <p class="opacity-70">Learn data analysis, visualization, and machine learning fundamentals</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center gap-2">
                                <div class="rating rating-sm">
                                    <input type="radio" class="mask mask-star-2 bg-orange-400" disabled checked />
                                </div>
                                <span class="text-sm">4.9 (3.2k)</span>
                            </div>
                            <span class="font-bold">$59</span>
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <button class="btn btn-primary btn-block">Enroll Now</button>
                        </div>
                    </div>
                </div>
                <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <figure class="h-48 bg-gradient-to-br from-pink-500 to-orange-600">
                        <div class="text-white text-6xl">🎨</div>
                    </figure>
                    <div class="card-body">
                        <div class="badge badge-accent">Design</div>
                        <h3 class="card-title mt-2">UI/UX Design Masterclass</h3>
                        <p class="opacity-70">Create stunning user experiences with modern design principles</p>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center gap-2">
                                <div class="rating rating-sm">
                                    <input type="radio" class="mask mask-star-2 bg-orange-400" disabled checked />
                                </div>
                                <span class="text-sm">4.7 (1.8k)</span>
                            </div>
                            <span class="font-bold">$45</span>
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <button class="btn btn-primary btn-block">Enroll Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Statistics Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-secondary text-primary-content">
        <div class="max-w-7xl mx-auto px-4">
            <div class="stats stats-vertical lg:stats-horizontal shadow-2xl w-full bg-base-100 text-base-content">
                <div class="stat place-items-center">
                    <div class="stat-title">Total Students</div>
                    <div class="stat-value text-primary">50,000+</div>
                    <div class="stat-desc">From 150+ countries</div>
                </div>
                <div class="stat place-items-center">
                    <div class="stat-title">Course Completions</div>
                    <div class="stat-value text-secondary">125,000+</div>
                    <div class="stat-desc">And counting</div>
                </div>
                <div class="stat place-items-center">
                    <div class="stat-title">Expert Instructors</div>
                    <div class="stat-value text-accent">250+</div>
                    <div class="stat-desc">Industry professionals</div>
                </div>
                <div class="stat place-items-center">
                    <div class="stat-title">Student Satisfaction</div>
                    <div class="stat-value text-success">98%</div>
                    <div class="stat-desc">Positive feedback</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="py-20 bg-base-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Latest Articles & News</h2>
                <p class="text-lg opacity-70">Stay updated with the latest trends in education and technology</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <article onclick="window.location.href = '{{ route('article.show', $article) }}'"
                        class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                        @if ($article->image_url)
                            <figure class="h-48 overflow-hidden">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                            </figure>
                        @endif
                        <div class="card-body">
                            <div class="flex items-center gap-2 text-sm opacity-60 mb-2">
                                <i class="fa-solid fa-calendar text-base-content/50"></i>
                                <span>{{ $article->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="card-title text-xl">{{ $article->title }}</h3>
                            <p class="opacity-70">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                            @if ($article->category)
                                <div class="flex gap-2 mt-4">
                                    <div class="badge badge-outline">{{ $article->category }}</div>
                                </div>
                            @endif
                            <div class="card-actions justify-end mt-4">
                                <a class="link link-primary">Read more
                                    →</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-lg opacity-70">No articles available yet. Check back soon!</p>
                    </div>
                @endforelse
            </div>
            @if ($articles->count() > 0)
                <div class="text-center mt-12">
                    <a href="{{ route('article.index') }}" class="btn btn-outline btn-lg">View All Articles</a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary text-primary-content">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Start Learning?</h2>
            <p class="text-xl mb-8 opacity-90">Join thousands of students already learning on UniLearn</p>
            <div class="flex gap-4 justify-center flex-wrap">
                <a href="#signup" class="btn btn-lg bg-base-100 text-primary hover:bg-base-200">Get Started Free</a>
                <a href="#contact"
                    class="btn btn-lg btn-outline border-white text-white hover:bg-white hover:text-primary">Contact
                    Us</a>
            </div>
        </div>
    </section>
</div>
