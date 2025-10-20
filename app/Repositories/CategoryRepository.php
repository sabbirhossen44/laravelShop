<?php

namespace App\Repositories;

use App\Models\Category;
use Arafat\LaravelRepository\Repository;
use Illuminate\Http\Request;

class CategoryRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Category::class;
    }

    public static function storeByRequest($request): Category
    {
        $thumbnail = null;
        if ($request->hasFile('image')) {
            $thumbnail = (new MediaRepository())->storeByRequest($request->file('image'), 'category');
        }
       return self::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'media_id' => $thumbnail?->id ?? null,
       ]);
    }
}
