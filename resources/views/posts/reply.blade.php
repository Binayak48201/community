@forelse($replies->reply as $key => $reply)
    <Reply :reply="{{ $reply }}"></Reply>
@empty
    <div class="tt-item">
        <div class="tt-single-topic">
            <div class="tt-item-header pt-noborder">
                <div class="tt-item-info info-top">
                    No data available at this moment.
                </div>
            </div>
        </div>
    </div>
@endforelse
