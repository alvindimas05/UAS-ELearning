<header class="navbar bg-base-100 shadow-lg sticky top-0 z-50 backdrop-blur-lg bg-opacity-90">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <i class="fa-solid fa-bars"></i>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('home') }}#courses">Courses</a></li>
                <li><a href="{{ route('home') }}#about">About</a></li>
                <li><a href="{{ route('article.index') }}">Articles</a></li>
                <li><a href="{{ route('home') }}#contact">Contact</a></li>
            </ul>
        </div>
        <a href="/"
            class="btn btn-ghost text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
            🎓 UniLearn
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 gap-2">
            <li><a href="{{ route('home') }}#courses" class="hover:text-primary transition-colors">Courses</a></li>
            <li><a href="{{ route('home') }}#about" class="hover:text-primary transition-colors">About</a></li>
            <li><a href="{{ route('article.index') }}" class="hover:text-primary transition-colors">Articles</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-primary transition-colors">Contact</a></li>
        </ul>
    </div>
    <div class="navbar-end gap-2">
        <a href="#login" class="btn btn-ghost">Login</a>
        <a href="#signup" class="btn btn-primary">Get Started</a>
    </div>
</header>
