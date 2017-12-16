<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Reply Count</th>
        <th width="280px">Action</th>
    </tr>
    @if (count($topics) > 0)
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->title}}</td>
                <td>{{ $topic->getRepliesCount()}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('topics.show',$article->id) }}">Show</a>
                    @if (Auth::user()->id = $topic->created_by_user_id)
                        <a class="btn btn-primary" href="{{ route('topics.edit',$article->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['topics.destroy', $article->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <td colspan="4"><p class="text-center"> No data found.</p></td>
    @endif
</table>

{!! $topics->links() !!}