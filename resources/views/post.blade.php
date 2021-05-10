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
                    <div class="">
                        <div class="p-4 mb-3 bg-light rounded">
                            <ol class="list-unstyled">
                                <li>
                                    <div class="col-lg-4 mb-2">
<!--                                        <svg class="bd-placeholder-img rounded-circle" width="50" height="50" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                                        <img src="https://i.pravatar.cc/55" width="55" height="55" class="mr-2 rounded-circle" alt="...">
                                    </div>

                                    <p class="blog-post-meta-comment"><a href="#">{{ $comment->getCommenterName() }}</a> Posted {{ $comment->created_at->diffForHumans() }}</p>

                                    <div class="comment-body">
                                        {!! $comment->body !!}
                                    </div>
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