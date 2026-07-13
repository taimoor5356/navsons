<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;

class VendorRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Vendor::class;
    }

    /**
     * store a new vendor
     */
    public static function storeByRequest(VendorRequest $request): Vendor
    {
        return self::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'position' => $request->position ?? 0,
            'image' => $request->image ?? null,
            'icon_image' => $request->icon_image ?? null,
            'status' => true,
        ]);
    }

    /**
     * update a vendor
     */
    public static function updateByRequest(VendorRequest $request, Vendor $vendor): Vendor
    {
        $vendor->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'position' => $request->position ?? $vendor->position,
            'image' => $request->image ?? $vendor->image,
            'icon_image' => $request->icon_image ?? $vendor->icon_image,
        ]);

        return $vendor;
    }

    /**
     * destroy a vendor
     */
    public static function destroy(Vendor $vendor): bool
    {
        return $vendor->delete();
    }
}
