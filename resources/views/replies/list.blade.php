<div class="reply-list">
    @if (count($replies) > 0)
        @foreach ($replies as $reply)
            @include('replies.item')
        @endforeach
    @else
        <p class="text-center"> No data found.</p>
    @endif

    {!! $replies->links() !!}
</div>
