<?php

namespace App\Http\Repositories;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyRepository
{
    public function getReply($reply_id)
    {
        return Reply::find($reply_id);
    }

    public function getReplies($topic_id)
    {
        $limit = config('app.page_data_limit');

        $replies = Reply::with('created_by_user')->where('topic_id', '=', $topic_id)
            ->latest()
            ->paginate($limit);

        return $replies;
    }

    public function addReply(Request $request)
    {
        $data = $request->all();
        $data['created_by_user_id'] = Auth::id();

        $reply = Reply::create($data);

        return $reply;
    }
}
