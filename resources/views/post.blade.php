<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>

        <p>
            By <a href="#">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

       {{-- <p>
            <a href="#">{{ $post->comment->name }}</a>
        </p>--}}


        <div>
            {!! $post->body !!}
        </div>

        <div>
                @foreach($post->comment as $comment)
                    <li>
                        <strong>
                            <a href="#">{{ $comment->user->name }}</a> Posted {{ $comment->created_at->diffForHumans() }}
                        </strong>

                    <hr>

                        {{--{{ $comment->name }}:--}}
                        {!! $comment->body !!}
                    </li>
                @endforeach

        </div>
            {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
                <div>
                    {{ Form::label('body', "Comment: ") }}
                    {{ Form::textarea('body', '', ['class' => 'form-control']) }}

                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        <div>

        </div>
    </article>

    <a href="/">Go Back</a>
</x-layout>