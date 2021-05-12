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

                        </div>
                    </form>

                    <a class="btn btn-sm btn-outline-secondary" href="/home">Sign up</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach ($postsTwo as $post)
                    <a class="p-2 link-secondary" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    <main class="container">

        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">{!! \App\Models\Post::latest()->first()->title !!}</h1>
                <p class="lead my-3">{!! \App\Models\Post::latest()->first()->excerpt !!}</p>
                <p class="lead mb-0"><a href="/posts/{{ \App\Models\Post::latest()->first()->slug }}" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                @forelse ($postsTwo->take(-5) as $post)
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

                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="/" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="/two">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>


</x-layout>