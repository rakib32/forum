<?php

namespace App\Http\Repositories;

use App\Topic;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicRepository
{
    public function getTopic($topicId)
    {
        return Topic::with('category', 'created_by_user', 'replies')->find($topicId);
    }

    public function getTopics($categoryId)
    {
        $limit = config('app.page_data_limit');

        if ($categoryId > 0) {
            $topics = Topic::with('category', 'created_by_user')
                ->where('category_id', '=', $categoryId)
                ->paginate($limit);
        } else {

            $topics = Topic::with('category', 'created_by_user')
                ->paginate($limit);
        }

        return $topics;
    }

    public function addTopic(Request $request)
    {
        $data = $request->all();
        $data['created_by_user_id'] = Auth::id();

        $topic = Topic::create();
        return $topic;
    }

    public function editTopic(Request $request, $id)
    {
        $topic = Topic::find($id)->update($request->all());
        return $topic;
    }

    public function deleteTopic($topicId)
    {
        return Topic::find($topicId)->delete();
    }
}
