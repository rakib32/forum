<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Flysystem\Exception;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $repository)
    {
        $this->categoryRepository = $repository;
    }

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getCategory($id);
    }

}