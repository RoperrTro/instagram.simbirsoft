@extends ('home')

@section ('start')

    <p>{{ $post->place }}</p>
    <img src="{{ asset($post->path) }}" height="400" width="748"/>

@endsection
