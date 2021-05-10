<x-layout>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <!--                    <a class="link-secondary" href="#">Subscribe</a>-->
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="/">My Bolg</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <form action="{{route('search')}}/" class="search-form" method="GET">
                        <div class="input-group search-group">
                            <input type="text" class="form-control search-control m-1" name="search" placeholder="Search" required/>
                            <!--                                <button class="searchButton" type ="submit" aria-label="Search">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="material-icons" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                                                            </button>-->
                        </div>
                    </form>

                    <a class="btn btn-sm btn-outline-secondary" href="/home">Sign up</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach ($posts as $post)
                    <a class="p-2 link-secondary" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    <main class="container">
        <div class="row">
            <div class="col-md-8">
                @forelse ($posts as $post)
                    <article class="blog-post">
                        <h1 class="blog-post-title"><a href="/posts/{{ $post->slug }}" class="link-dark">
                                {!! $post->title !!}
                            </a></h1>
                        <p class="blog-post-meta">By <a href="/authors/{{ $post->author->username }}" class="link-dark">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="link-dark">{{ $post->category->name }}</a></p>

                        <div>
                            {!! $post->excerpt !!}
                        </div>

                    </article><!-- /.blog-post -->
                @empty
                    <h1 class="blog-post-title">No posts matching search result</h1><br>
                @endforelse
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{!! \App\Models\Category::latest()->first()->name !!}</strong>
                        <h3 class="mb-0">{!! \App\Models\Post::latest()->first()->title !!}</h3>
                        <div class="mb-1 text-muted">{!! \App\Models\Category::latest()->first()->created_at->toDateString() !!}</div>
                        <p class="card-text mb-auto">{!! \App\Models\Post::latest()->first()->excerpt !!}</p>
                        <a href="/posts/{{ \App\Models\Post::latest()->first()->slug }}" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
<!--                        <svg class="https://cdn.pixabay.com/photo/2020/09/27/07/13/butterfly-5605870_960_720.jpg" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->

                        <img src="https://cdn.pixabay.com/photo/2020/09/27/07/13/butterfly-5605870_960_720.jpg" width="200" height="250"alt="...">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">

                        <img src="https://cdn.pixabay.com/photo/2020/02/13/21/21/lighthouse-4846855_960_720.jpg" width="200" height="250"alt="...">
                    </div>
                </div>
            </div>
        </div>

        <nav class="blog-pagination" aria-label="Pagination">
            <a class="btn btn-outline-primary" href="/">Go Back</a>
        </nav>

    </main>

</x-layout>