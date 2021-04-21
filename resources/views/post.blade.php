<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>

        <p>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

       {{-- <p>
            <a href="#">{{ $post->comment->name }}</a>
        </p>--}}


        <div>
            {!! $post->body !!}
        </div>

        <div>
            <ul>
                @foreach($post->comment as $comment)
                    <li>
                        <strong>
                            {{ $comment->created_at->diffForHumans() }}
                        </strong>

                    <hr>

                        {{--{{ $comment->name }}:--}}
                        {!! $comment->body !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </article>

    <a href="/">Go Back</a>
</x-layout>