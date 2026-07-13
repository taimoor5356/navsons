<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VendorResource;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the active vendors, used by the storefront
     * "Our Partners" section.
     */
    public function index()
    {
        $vendors = Vendor::query()->active()->orderBy('position')->orderBy('id', 'desc')->get();

        return $this->json('all vendors', [
            'vendors' => VendorResource::collection($vendors),
        ]);
    }
}
