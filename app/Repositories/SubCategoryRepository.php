<?php

namespace App\Repositories;

use App\Models\SubCategory;
use Arafat\LaravelRepository\Repository;
use Illuminate\Http\Request;

class SubCategoryRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return SubCategory::class;
    }

    public static function storeByRequest(Request $request, $media): SubCategory
    {
        return self::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'media_id' => $media?->id ?? null
       ]);
    }
}
