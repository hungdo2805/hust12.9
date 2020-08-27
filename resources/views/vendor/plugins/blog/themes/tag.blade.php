<div>
    <h3>{{ $tag->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>

<div>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <article>
                <div>
                    <a href="{{ $post->url }}"><img src="{{ url($post->image) }}" alt="{{ $post->name }}"></a>
                </div>
                <div>
                    <header>
                        <h3><a href="{{ $post->url }}">{{ $post->name }}</a></h3>
                        <div>
                            <a href="#">{{ date_from_database($post->created_at, 'M d, Y') }}</a> - <a href="{{ route('public.author', $post->user->username) }}">{{ $post->user->getFullName() }}</a>
                            @if ($post->categories->first())
                                <a href="{{ $post->categories->first()->url }}">{{ $post->categories->first()->name }}</a>
                            @endif
                        </div>
                    </header>
                    <div>
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
            </article>
        @endforeach
        <div>
            {!! $posts->links() !!}
        </div>
    @else
        <div>
            <p>{{ __('There is no data to display!') }}</p>
        </div>
    @endif
</div>
