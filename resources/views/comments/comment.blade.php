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


                <br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $comment->id }}" name="parent_id" value="{{ $comment->id }}">
                    Reply
                </button>

                <div class="modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Reply to Comment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('comments.comment-form')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($comments[$comment->id]))

                    @include('comments.list', ['collection' => $comments[$comment->id]])

                @endif

                {{--{{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
                @csrf

                {{ Form::hidden('post_id', $post->id) }}

                {{ Form::hidden('parent_id', $comment->id) }}

                <textarea class="form-control" rows="3" name ="body"></textarea>

                <br><button type="submit" class="btn btn-primary">Reply</button>

                {{ Form::close() }}--}}

            </div>

    </div>

</x-layout>