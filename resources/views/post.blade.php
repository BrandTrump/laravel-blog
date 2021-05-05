<x-layout>
    <main class="container">
        <article class="blog-post">
            <h1 class="blog-post-title">{!! $post->title !!}</h1>

            <p class="blog-post-meta">By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

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
                @endif
                @foreach($post->comment as $comment)
                    <div class="col-md-4">
                        <div class="p-4 mb-3 bg-light rounded">
                            <ol class="list-unstyled">
                                <li>
                                    {!! $comment->body !!}

                                    <p class="blog-post-meta"><a href="#">{{ $comment->getCommenterName() }}</a> Posted {{ $comment->created_at->diffForHumans() }}</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                @endforeach


            </div>

            @if(! \Illuminate\Support\Facades\Auth::user())
                {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Post Comment</h4>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">First name</label>
                            {{ Form::text('firstname', '', ['class' => 'form-control']) }}
                        </div>

                        <div class="col-sm-6">
                            <label for="lastname" class="form-label">Last name</label>
                            {{ Form::text('lastname', '', ['class' => 'form-control']) }}
                        </div>
                    </div><br>

                    {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Comment']) }}

                    {{ Form::hidden('post_id', $post->id) }}

                </div><br>

                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}

            @else

                {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
                    <div>
                        {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Comment']) }}

                        {{ Form::hidden('post_id', $post->id) }}

                    </div><br>

                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            @endif

            <br>

            @include('inc.messages')

        <br>

        <nav class="blog-pagination" aria-label="Pagination">
            <a class="btn btn-outline-primary" href="/">Go Back</a>
        </nav>
    </main>

</x-layout>