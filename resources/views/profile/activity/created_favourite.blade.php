

<div class="tt-item">
    <div class="tt-col-description">
        <div class="tt-col-message">
            <a href="#">{{ $user->name }}</a> favorited a reply :
             {{ \App\Models\Reply::whereId($activity->subject->id)->pluck('body')->first() }}
        </div>
    </div>
</div>
