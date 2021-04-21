<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>

            <p>
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            {{--<p>
                <a href="/comments/{{ $post->comment->id }}">{{ $post->comment->name }}</a>
            </p>--}}

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>

