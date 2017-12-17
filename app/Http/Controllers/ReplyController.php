<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ReplyService;
use App\Http\Services\TopicService;
use Illuminate\Support\Facades\Log;


class ReplyController extends Controller
{
    private $replyService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReplyService $service, TopicService $topicService)
    {
        $this->middleware('auth');
        $this->replyService = $service;
        $this->topicService = $topicService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topic_id)
    {
        $replies = $this->replyService->getReplies($topic_id);
        $topic = $this->topicService->getTopic($topic_id);

        if (request()->ajax()) {
            return view('replies.list', ['replies' => $replies, 'topic' => $topic])->render();
        }

        return view('replies.index', compact('replies', 'topic'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'content' => 'required',
            'topic_id' => 'required|exists:topics,id'
        ]);

        $reply = $this->replyService->addReply($request);

        if (request()->ajax()) {
            return view('replies.item', ['reply' => $reply])->render();
        }

        return redirect()->route('replies.index')
            ->with('success', 'Reply created successfully');
    }
}
