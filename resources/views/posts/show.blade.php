{{ $post->title }}
{{ $post->body }}


@foreach($post->reply as $reply)
    <p>{{ $reply->body }}</p>
@endforeach
