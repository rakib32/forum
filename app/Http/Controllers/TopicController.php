<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use Illuminate\Http\Request;
use App\Http\Services\TopicService;
use App\Http\Services\CategoryService;


class TopicController extends Controller
{
    private $topicService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TopicService $service, CategoryService $catService)
    {
        $this->middleware('auth');
        $this->topicService = $service;
        $this->catService = $catService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = request()->input('category_id');

        $topics = $this->topicService->getTopics($categoryId);
        $categories = $this->catService->getCategories();

        if (request()->ajax()) {
            return view('topics.table', ['topics' => $topics])->render();
        }

        return view('topics.index', compact('topics', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->catService->getCategories();
        return view('topics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $topic = $this->topicService->addTopic($request);

        return redirect()->route('topics.index')
            ->with('success', 'Topic created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = $this->topicService->getTopic($id);
        $categories = $this->catService->getCategories();
        return view('topics.edit', compact('topic', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, $id)
    {
        $topic = $this->topicService->updateTopic($request, $id);

        return redirect()->route('topics.index')
            ->with('success', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = $this->topicService->deleteTopic($id);

        return redirect()->route('topics.index')
            ->with('success', 'Topic deleted successfully');
    }
}
