<?php

namespace App\Repositories;

use App\Models\CategoryBanner;
use Abedin\Maker\Repositories\Repository;

class CategoryBannerRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return CategoryBanner::class;
    }

    /**
     * store new category banner
     */
    public static function storeByRequest($request): CategoryBanner
    {
        return self::create([
            'category_id' => $request->category_id,
            'image' => $request->image,
            'position' => $request->position,
            'status' => true,
        ]);
    }

    /**
     * Update the category banner.
     */
    public static function updateByRequest($request, CategoryBanner $categoryBanner): CategoryBanner
    {
        $categoryBanner->update([
            'category_id' => $request->category_id,
            'image' => $request->image ?? $categoryBanner->image,
            'position' => $request->position,
        ]);

        return $categoryBanner;
    }
}
