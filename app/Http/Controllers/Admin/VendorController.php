<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use App\Repositories\VendorRepository;

class VendorController extends Controller
{
    /**
     * Display a listing of the vendors.
     */
    public function index()
    {
        $vendors = Vendor::query()->orderBy('position')->orderBy('id', 'desc')->paginate(20);

        return view('admin.vendor.index', compact('vendors'));
    }

    /**
     * create a new vendor
     */
    public function create()
    {
        return view('admin.vendor.create');
    }

    /**
     * store a new vendor
     */
    public function store(VendorRequest $request)
    {
        VendorRepository::storeByRequest($request);

        return to_route('admin.vendor.index')->withSuccess(__('Vendor created successfully'));
    }

    /**
     * display the specified vendor
     */
    public function show(Vendor $vendor)
    {
        return view('admin.vendor.show', compact('vendor'));
    }

    /**
     * edit a vendor
     */
    public function edit(Vendor $vendor)
    {
        return view('admin.vendor.edit', compact('vendor'));
    }

    /**
     * update a vendor
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        VendorRepository::updateByRequest($request, $vendor);

        return to_route('admin.vendor.index')->withSuccess(__('Vendor updated successfully'));
    }

    /**
     * status toggle a vendor
     */
    public function statusToggle(Vendor $vendor)
    {
        $vendor->update([
            'status' => ! $vendor->status,
        ]);

        return to_route('admin.vendor.index')->withSuccess(__('Vendor status updated'));
    }

    /**
     * destroy a vendor
     */
    public function destroy(Vendor $vendor)
    {
        VendorRepository::destroy($vendor);

        return to_route('admin.vendor.index')->withSuccess(__('Vendor deleted successfully'));
    }
}
