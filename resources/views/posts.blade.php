<x-layout>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">

                @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="col-4 pt-1">
                        <a class="link-secondary" href="/create">Create Post</a>
                    </div>
                @endif

                @if(! \Illuminate\Support\Facades\Auth::user())
                    <div class="col-4 pt-1">
                        <a class="link-secondary"  data-bs-toggle="modal" data-bs-target="#exampleModal" href="/create">Create Post</a>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create a post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sign up to publish your own post.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a type="button" class="btn btn-primary" href="/home">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

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
                @if( ! $posts == null)
                    @foreach ($posts as $post)
                        @foreach($post->category as $category)
                            <a class="p-2 link-secondary" href="/categories/{{ $category->slug }}">{{ $category->category_name }}</a>
                        @endforeach
                    @endforeach
                @endif
            </nav>
        </div>
    </div>

    <main class="container">

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 h-100" src="https://cdn.pixabay.com/index/2021/04/30/09-58-39-26_1440x480.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Create a Post.</h1>
                            <p>Sign up to create a post of your own.</p>
                            <p><a class="btn btn-lg btn-primary" href="/home">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w- h-100" src="https://cdn.pixabay.com/photo/2021/04/24/17/57/road-6204670_960_720.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 h-100" src="https://cdn.pixabay.com/photo/2020/11/13/14/46/building-5738714_960_720.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                @if( ! $posts == null)
                    <h1 class="display-4 fst-italic">{!! \App\Models\Post::latest()->first()->title !!}</h1>
                    <p class="lead my-3">{!! \App\Models\Post::latest()->first()->excerpt !!}</p>
                    <p class="lead mb-0"><a href="/posts/{{ \App\Models\Post::latest()->first()->slug }}" class="text-white fw-bold">Continue reading...</a></p>
                @endif
            </div>
        </div>


        <div class="row g-5">
            <div class="col-md-8">
                @if( ! $posts == null)
                    @forelse ($posts as $post)
                            <article class="blog-post">
                                <h1 class="blog-post-title"><a href="/posts/{{ $post->slug }}" class="link-dark">
                                        {!! $post->title !!}
                                    </a></h1>

                                <p class="blog-post-meta">By <a href="/authors/{{ $post->author->username }}" class="link-dark">{{ $post->author->name }}</a> in

                                        @foreach($post->category as $category)
                                            <a href="/categories/{{ $category->slug }}" class="link-dark">{{ $category->category_name }}</a></p>
                                        @endforeach

                                <p class="{{ $post->getStatusClasses() }}">{{ $post->status->name }}</p>

                                <div>
                                    {!! $post->excerpt !!}
                                </div>
                            </article>
                    @empty
                        <h1 class="blog-post-title">No posts matching search result</h1><br>
                    @endforelse
                @endif

               {{ $posts->links() }}

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">This is a blog page for learning all new things. You can create a post by signing up to the blog. Corporis reprehenderit optio dolor maiores voluptas velit.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="#">March 2021</a></li>
                            <li><a href="#">February 2021</a></li>
                            <li><a href="#">January 2021</a></li>
                            <li><a href="#">December 2020</a></li>
                            <li><a href="#">November 2020</a></li>
                            <li><a href="#">October 2020</a></li>
                            <li><a href="#">September 2020</a></li>
                            <li><a href="#">August 2020</a></li>
                            <li><a href="#">July 2020</a></li>
                            <li><a href="#">June 2020</a></li>
                            <li><a href="#">May 2020</a></li>
                            <li><a href="#">April 2020</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="https://github.com/BrandTrump">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
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

