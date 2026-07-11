<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (env('APP_STATUS') == 'development') { 
            // return view('coming_soon');
        }
        $products = Cache::remember('active_products_images_v1', 60, function () {
            $items = DB::table('temp_products')
                ->where('status', 1)
                ->get();

            foreach ($items as $item) {
                $file = $item->slug . '.png';

                $path = public_path($item->image_path . '/' . $file);

                $item->image_url = file_exists($path)
                    ? asset($item->image_path . '/' . $file)
                    : asset('assets/web/img/products/default.png');
            }

            return $items;
        });
        return view('website.index', compact('products'));
    }

    public function tempProducts() 
    {
        $products = DB::table('temp_products')->get();
        return view('website.temp_products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateTempProductStatus(Request $request)
    {
        //
        DB::table('temp_products')
            ->where('id', $request->id)
            ->update(['status' => $request->status]);

        // optional: clear cache if you are using it
        Cache::forget('active_products_images_v1');

        return response()->json([
            'message' => 'Status updated successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
