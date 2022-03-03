<div class="tt-item">
    <div class="tt-col-description">
        <div class="tt-col-message">
            <a href="#">{{ $user->name }}</a> replied :
            <a href="{{ $activity->subject->post->path . '#reply-' . $activity->subject->id }}  ">
                {{ $activity->subject->body }}
            </a>
        </div>
    </div>
</div>
