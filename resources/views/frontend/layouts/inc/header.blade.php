<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="/">
                <img loading="prelaod" decoding="async" class="img-fluid" src="/frontend/images/logo-favicon/logo.svg" width="120"
                    alt="{{ blogInfo()->blog_name }}">
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button"
                    data-toggle="collapse" data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form action="{{ route('search_posts') }}" class="search order-lg-3 order-md-2 order-3 ml-auto">
                <input id="search-query" name="query" value="{{ Request('query') }}" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('about_me') }}">About Me</a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('page_posts') }}">Blogs</a>
                    </li>
                    {{-- <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="travel.html">Travel</a>
                            <a class="dropdown-item" href="travel.html">Lifestyle</a>
                            <a class="dropdown-item" href="travel.html">Cruises</a>
                        </div>
                    </li> --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('contact_page') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>