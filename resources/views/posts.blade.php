<x-layout>
    {{--@foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>

            <p>
                By <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach

    <a href="/home">Login/Logout</a>--}}


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
                        <form action="{{route('search')}}" class="search-form" method="GET">
                            <div class="input-group search-group">
                                <input type="text" class="form-control search-control" name="search" placeholder="Search" required/>
<!--                                <button class="searchButton" type ="submit" aria-label="Search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="material-icons" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                                </button>-->
                            </div>
                        </form>

                    <a class="btn btn-sm btn-outline-secondary" href="/home">Sign up</a>
                </div>
            </div>
        </header>

    </div>

    <main class="container">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 h-100" src="https://cdn.pixabay.com/index/2021/04/30/09-58-39-26_1440x480.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
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
                    <img class="d-block w-100 h-100" src="https://cdn.pixabay.com/photo/2020/04/18/16/42/rocky-coast-5059912_960_720.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">{!! \App\Models\Post::latest()->first()->title !!}</h1>
                <p class="lead my-3">{!! \App\Models\Post::latest()->first()->excerpt !!}</p>
                <p class="lead mb-0"><a href="/posts/{{ \App\Models\Post::latest()->first()->slug }}" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                @forelse ($posts as $post)
                        <article class="blog-post">
                            <h1 class="blog-post-title"><a href="/posts/{{ $post->slug }}">
                                    {!! $post->title !!}
                                </a></h1>
                            <p class="blog-post-meta">By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                            <div>
                                {!! $post->excerpt !!}
                            </div>

                        </article><!-- /.blog-post -->
                    @empty
                    <h1 class="blog-post-title">No posts matching search result</h1><br>
                @endforelse

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>
            </div>
        </div>

<!--            <div class="col-md-4">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
                </div>
            </div>-->


<!--                <div class="p-4">
                    <h4 class="fst-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>-->

<!--                <div class="p-4">
                    <h4 class="fst-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>-->
<!--            </div>-->

    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>


</x-layout>

