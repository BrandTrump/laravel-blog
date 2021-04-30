<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>

        <p>
            By <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>


        <div>
            {!! $post->body !!}
        </div>

        @if(\Illuminate\Support\Facades\Auth::user())
            <div>
                Logged in as: <a href="#">{!! \Illuminate\Support\Facades\Auth::user()->name !!}</a>
            </div>
        @endif

        <div>

            @foreach($post->comment as $comment)
                <li>
                    <strong>
                         <a href="#">{{ $comment->getCommenterName->name }}</a> Posted {{ $comment->created_at->diffForHumans() }}
                    </strong>

                    <hr>

                    {!! $comment->body !!}
                </li>
            @endforeach


        </div>

        @if(! \Illuminate\Support\Facades\Auth::user())
            {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
            <div>
                {{ Form::label('firstname', "First Name: ") }}
                {{ Form::text('firstname', '', ['class' => 'form-control']) }}
                {{ Form::label('lastname', "Last Name: ") }}
                {{ Form::text('lastname', '', ['class' => 'form-control']) }}
                {{ Form::label('body', "Comment: ") }}
                {{ Form::textarea('body', '', ['class' => 'form-control']) }}

                {{ Form::hidden('post_id', $post->id) }}

            </div>
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}

        @else

            {{ Form::open(array('action' => 'App\Http\Controllers\CommentController@store' ,'method' => 'POST')) }}
                <div>
                    {{ Form::label('body', "Comment: ") }}
                    {{ Form::textarea('body', '', ['class' => 'form-control']) }}

                    {{ Form::hidden('post_id', $post->id) }}

                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        @endif

        @include('inc.messages')

    </article>

    <a href="/">Go Back</a>
</x-layout>