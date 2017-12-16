<?php

namespace App\Http\Services;

use App\Http\Repositories\TopicRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Flysystem\Exception;

class TopicService
{
    private $topicRepository;

    public function __construct(TopicRepository $repository)
    {
        $this->topicRepository = $repository;
    }

    public function getTopics($categoryId)
    {
        return $this->topicRepository->getTopics($categoryId);
    }

    public function getTopic($id)
    {
        return $this->topicRepository->getTopic($id);
    }

    public function addTopic(Request $request)
    {
        return $this->topicRepository->addTopic($request);
    }

    public function updateTopic(Request $request, $id)
    {
        return $this->topicRepository->editTopic($request, $id);
    }

    public function deleteTopic($id)
    {
        return $this->topicRepository->deleteTopic($id);
    }

}