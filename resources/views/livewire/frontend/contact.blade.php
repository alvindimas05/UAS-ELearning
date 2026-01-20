<div>
    <!-- Hero Section -->
    <section class="hero min-h-[40vh] relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        <div class="hero-content text-center relative z-10 py-12">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold text-primary mb-6">Contact Us</h1>
                <p class="text-lg opacity-80">
                    We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-20 bg-base-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold mb-6">Get in Touch</h2>
                        <p class="text-lg opacity-70 mb-8">
                            Have questions about our courses or platform? Our team is here to help you on your learning
                            journey.
                        </p>
                    </div>

                    <div class="card bg-base-200 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="card-body">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 p-2 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-location-dot text-xl text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Our Location</h3>
                                    <p class="opacity-70">123 Learning Street<br>Education City, ED 12345</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="card-body">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 p-2 bg-secondary/10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-envelope text-xl text-secondary"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Email Us</h3>
                                    <p class="opacity-70">support@unilearn.com<br>info@unilearn.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="card-body">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 p-2 bg-accent/10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-phone text-xl text-accent"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1">Call Us</h3>
                                    <p class="opacity-70">+1 (555) 123-4567<br>Mon - Fri, 9am - 6pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!-- Contact Form -->
                <div class="card bg-base-100 shadow-2xl">
                    <div class="card-body p-8">
                        <h2 class="card-title text-2xl mb-6">Send Message</h2>

                        @if (session()->has('message'))
                            <div class="alert alert-success mb-6">
                                <i class="fa-solid fa-check-circle"></i>
                                <span>{{ session('message') }}</span>
                            </div>
                        @endif

                        <form wire:submit.prevent="submit" class="space-y-6">
                            <div class="form-control w-full">
                                <label class="label py-1">
                                    <span class="label-text font-medium">Your Name</span>
                                </label>
                                <input type="text" wire:model="name" placeholder="John Doe"
                                    class="input input-bordered w-full focus:input-primary @error('name') input-error @enderror" />
                                @error('name')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control w-full">
                                <label class="label py-1">
                                    <span class="label-text font-medium">Email Address</span>
                                </label>
                                <input type="email" wire:model="email" placeholder="john@example.com"
                                    class="input input-bordered w-full focus:input-primary @error('email') input-error @enderror" />
                                @error('email')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control w-full">
                                <label class="label py-1">
                                    <span class="label-text font-medium">Subject</span>
                                </label>
                                <input type="text" wire:model="subject" placeholder="How can we help?"
                                    class="input input-bordered w-full focus:input-primary @error('subject') input-error @enderror" />
                                @error('subject')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control w-full">
                                <label class="label py-1">
                                    <span class="label-text font-medium">Message</span>
                                </label>
                                <div>
                                    <textarea wire:model="message"
                                        class="textarea textarea-bordered h-32 w-full focus:textarea-primary @error('message') textarea-error @enderror"
                                        placeholder="Write your message here..."></textarea>
                                </div>
                                @error('message')
                                    <span class="text-error text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="card-actions justify-end mt-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <span wire:loading.remove>Send Message</span>
                                    <span wire:loading><span class="loading loading-spinner"></span> Sending...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div> --}}

                <!-- Map Section -->
                <div class="card bg-base-200 shadow-lg overflow-hidden h-full min-h-[500px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353153169!3d-37.81720997975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d6a32f7f1f81!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1633516543210!5m2!1sen!2sau"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

</div>
