<x-layout>

    <main class="container">
        <header class="blog-header py-3 mb-4">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="text-center">
                    <a class="blog-header-logo text-dark" href="/">My Bolg</a>
                </div>
            </div>
        </header>

        <article class="blog-post">
                    <h1 class="blog-post-title">{!! $post->title !!}</h1>

                    <p class="blog-post-meta">By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in

                        @foreach($post->category as $category)
                            <a href="/categories/{{ $category->slug }}">{{ $category->category_name }}</a></p>
                        @endforeach

                    <div>
                        {!! $post->body !!}
                    </div>

        </article>

            @if(\Illuminate\Support\Facades\Auth::user())
                <div>
                    <p class="blog-post-meta">Logged in as: <a href="/home">{!! \Illuminate\Support\Facades\Auth::user()->name !!}</a></p>
                </div>
            @endif

            <div>

                @if($post->hasComment($post->id))
                    <h4 class="fst-italic">Comments</h4>
                    @include('comments.list', ['collection' => $comments['root']])
                @endif


            </div>

            @if(! \Illuminate\Support\Facades\Auth::user())
                {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Post Comment</h4>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="form-floating col-sm-6">
                            {{ Form::text('firstname', '', ['class' => 'form-control', 'id' => 'firstname', 'placeholder'=>'First name']) }}
                            <label for="firstname">First name</label>
                        </div>

                        <div class="form-floating col-sm-6">
                            {{ Form::text('lastname', '', ['class' => 'form-control', 'id' => 'lastname', 'placeholder'=>'Last name']) }}
                            <label for="lastname">Last name</label>
                        </div>
                    </div><br>

                    {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Comment']) }}

                    {{ Form::hidden('post_id', $post->id) }}

                </div><br>

                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

            @csrf

                {{ Form::close() }}

            @else

                {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
                    <div>
                        {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Comment']) }}

                        {{ Form::hidden('post_id', $post->id) }}

                    </div><br>

                    {{ Form::submit('Comment', ['class' => 'btn btn-primary']) }}
            @csrf

                    {{ Form::close() }}

            @endif

            <br>

            @include('inc.messages')

        <br>

        <nav class="blog-pagination" aria-label="Pagination">
            <a class="btn btn-outline-primary" href="/">Go Back</a>
        </nav>
    </main>

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>

</x-layout>