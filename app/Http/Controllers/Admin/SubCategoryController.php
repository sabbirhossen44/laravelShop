<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\CategoryRepository;
use App\Repositories\MediaRepository;
use App\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->get();
        $subCategories = SubCategory::latest('id')->paginate(10);
        return view('admin.subCategory.index', compact('categories', 'subCategories'));
    }

    public function store(SubCategoryRequest $request)
    {
        $media = null;
        if ($request->hasFile('image')) {
            $media = MediaRepository::storeByRequest($request->file('image'), 'subCategory', 'image');
        }
        $category = SubCategoryRepository::storeByRequest($request, $media);

        return to_route('subCategory.index')->withSuccess('SubCategory created successfully');
    }
}
