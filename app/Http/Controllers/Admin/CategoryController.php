<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
       $category = CategoryRepository::storeByRequest($request);

       if ($category) {
            return to_route('category.index')->withSuccess('Category created successfully');
       }else{
            return to_route('category.index')->withError('Category not created');
       }
       
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category){
        $category = CategoryRepository::updateByRequest($request, $category);
        return to_route('category.index')->withSuccess('Category updated successfully');
    }
}
