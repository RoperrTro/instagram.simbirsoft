@extends ('home')

@section ('start')

    @foreach ($posts as $post)

        <p>{{ $post->user_name }}</p>
        <p><img src="https://what-messenger.com/uploads/posts/2015-10/1443914169_6f7f6554.jpg" height="100" width="100"/></p>
        <p>{{ $post->place }}</p>
        <p>{{ $post->created_at->format('d.m.Y H:i') }}</p>
        <img src="{{ asset($post->path) }}" height="400" width="748"/>
        @if(auth()->id() === $post->user_id)
            <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
                Изменить
            </a>
            <form action="{{'/posts/' . $post->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn alert-danger">
                    Удалить
                </button>
            </form>
        @endif
        @if(Auth::check())
            <form action="{{'/comments/' . $post->id}}" method="post">
                {{ csrf_field() }}
                 <button type="submit" class="btn alert-success">
                    Комментировать
                </button>
            </form>
        @endif
        <br>
        @foreach($post->comments as $comment)
            <strong style="word-wrap: break-word;">Комментарий: {{ $comment->text }}</strong><br/>
            @if(auth()->id() === $comment->user_id)
                <form action="{{'/comments/' . $comment->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn alert-danger">
                        Удалить комментарий
                    </button>
                </form>
                <hr>
            @endif
        @endforeach
        <hr>
    @endforeach
    @endsection