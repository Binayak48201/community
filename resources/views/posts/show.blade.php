{{ $post->title }}


@foreach($post->reply as $reply)
    <p>{{ $reply->body }}</p>
@endforeach
