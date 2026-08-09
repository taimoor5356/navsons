<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBannerRequest;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Repositories\CategoryBannerRepository;

class CategoryBannerController extends Controller
{
    /**
     * Display a listing of the category banners.
     */
    public function index()
    {
        $categoryBanners = CategoryBanner::with('category')->latest('id')->paginate(20);

        return view('admin.category-banner.index', compact('categoryBanners'));
    }

    /**
     * create new category banner
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.category-banner.create', compact('categories'));
    }

    /**
     * store a new category banner
     */
    public function store(CategoryBannerRequest $request)
    {
        CategoryBannerRepository::storeByRequest($request);

        return to_route('admin.categoryBanner.index')->withSuccess(__('Category banner created successfully'));
    }

    /**
     * edit a category banner
     */
    public function edit(CategoryBanner $categoryBanner)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.category-banner.edit', compact('categoryBanner', 'categories'));
    }

    /**
     * update a category banner
     */
    public function update(CategoryBannerRequest $request, CategoryBanner $categoryBanner)
    {
        CategoryBannerRepository::updateByRequest($request, $categoryBanner);

        return to_route('admin.categoryBanner.index')->withSuccess(__('Category banner updated successfully'));
    }

    /**
     * status toggle a category banner
     */
    public function statusToggle(CategoryBanner $categoryBanner)
    {
        $categoryBanner->update([
            'status' => ! $categoryBanner->status,
        ]);

        return to_route('admin.categoryBanner.index')->withSuccess(__('Category banner status updated'));
    }

    /**
     * destroy a category banner
     */
    public function destroy(CategoryBanner $categoryBanner)
    {
        $categoryBanner->delete();

        return to_route('admin.categoryBanner.index')->withSuccess(__('Category banner deleted successfully'));
    }
}
