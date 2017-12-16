<?php

namespace App\Http\Repositories;

use App\Category;

class CategoryRepository
{
    public function getCategory($id)
    {
        return Category::find($id);
    }

    public function getCategories()
    {
        return Category::select(['id', 'name'])->get();
    }
}
