<x-layout>

    <div class="">
        <div class="p-4 mb-3 bg-light rounded">
            <ol class="list-unstyled">
                <li>
                    <div class="col-lg-4 mb-2">
                        <img src="/uploads/avatars/{{ $comment->getCommenterAvatar() }}" width="55" height="55" class="mr-2 rounded-circle" alt="...">
                    </div>

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
                </li>
            </ol>
        </div>
    </div>

</x-layout>