<x-layout>

    <div class="d-flex bg-light rounded p-4 mb-4">
            <div>
                <a href="#">
                    <div class="position-relative">
                        <div class="blur-shadow-avatar">
                            <img src="/uploads/avatars/{{ $comment->getCommenterAvatar() }}" width="55" height="55" class="mr-2 rounded-circle" alt="...">
                        </div>
                    </div>
                </a>
            </div>

            <div class="ms-3">
                <p class="blog-post-meta-comment"><a href="#">{{ $comment->getCommenterName() }}</a> Posted {{ $comment->created_at->diffForHumans() }}</p>

                        <div class="comment-body">
                            {!! $comment->body !!}

                        </div>

                        {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
                        @csrf

                        {{ Form::hidden('post_id', $post->id) }}

                        {{ Form::hidden('parent_id', $comment->id) }}

                        <textarea class="form-control" rows="3" name ="body"></textarea>

                        <br><button type="submit" class="btn btn-primary">Reply</button>
                        {{ Form::close() }}

                        @if(isset($comments[$comment->id]))

                            @include('comments.list', ['collection' => $comments[$comment->id]])

                        @endif
            </div>

    </div>

</x-layout>