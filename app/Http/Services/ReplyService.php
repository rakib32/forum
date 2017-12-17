<?php

namespace App\Http\Services;

use App\Http\Repositories\ReplyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Flysystem\Exception;

class ReplyService
{
    private $replyRepository;

    public function __construct(ReplyRepository $repository)
    {
        $this->replyRepository = $repository;
    }

    public function getReplies($topic_id)
    {
        return $this->replyRepository->getReplies($topic_id);
    }

    public function getReply($id)
    {
        return $this->replyRepository->getReply($id);
    }

    public function addReply(Request $request)
    {
        return $this->replyRepository->addReply($request);
    }

}