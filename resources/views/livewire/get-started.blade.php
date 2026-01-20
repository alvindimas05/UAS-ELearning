<div class="min-h-screen bg-base-200 flex items-center justify-center p-4">
    <div class="max-w-4xl w-full">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4 bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                Get Started or Sign In</h1>
            <p class="text-lg text-base-content/70">Join our community or log in to your account.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Student Card -->
            <div
                class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-base-300">
                <div class="card-body items-center text-center">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="card-title text-2xl mb-2">Student</h2>
                    <p class="mb-6 text-base-content/70">Access a wide range of courses, track your progress, and learn
                        new skills at your own pace.</p>
                    <div class="card-actions w-full flex flex-col gap-3">
                        <a href="/user/login" class="btn btn-outline btn-primary w-full">
                            Login as Student
                        </a>
                        <a href="/user/register" class="btn btn-primary w-full group">
                            Join as Student
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                    <ul class="text-left mt-6 space-y-2 text-sm text-base-content/60 w-full">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-success" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Access to all free courses</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-success" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Track learning progress</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-success" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Earn certificates</li>
                    </ul>
                </div>
            </div>

            <!-- Teacher Card -->
            <div
                class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-base-300">
                <div class="card-body items-center text-center">
                    <div class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-2xl mb-2">Teacher</h2>
                    <p class="mb-6 text-base-content/70">Share your knowledge, create engaging courses, and earn from
                        your expertise.</p>
                    <div class="card-actions w-full flex flex-col gap-3">
                        <a href="/teacher/login" class="btn btn-outline btn-secondary w-full">
                            Login as Teacher
                        </a>
                        <a href="/teacher/register" class="btn btn-secondary w-full group">
                            Join as Teacher
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                    <ul class="text-left mt-6 space-y-2 text-sm text-base-content/60 w-full">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-success" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Create unlimited courses</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-success" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Student analytics</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-success" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg> Direct earnings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
