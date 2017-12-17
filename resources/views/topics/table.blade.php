<table class="table table-responsive table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Replies Count</th>
        <th width="280px">Action</th>
    </tr>
    @if (count($topics) > 0)
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->title}}</td>
                <td>{{ $topic->count_replies}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('replies.index', $topic->id) }}">Show Replies</a>
                    @if (Auth::user()->id = $topic->created_by_user_id)
                        <a class="btn btn-primary" href="{{ route('topics.edit', $topic->id) }}">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <td colspan="4"><p class="text-center"> No data found.</p></td>
    @endif
</table>

{!! $topics->links() !!}