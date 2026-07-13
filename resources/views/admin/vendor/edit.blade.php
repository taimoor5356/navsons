@extends('layouts.app')
@section('header-title', __('Edit Vendor'))

@section('content')
    <div class="page-title">
        <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-store"></i> {{ __('Edit Vendor') }}
        </div>
    </div>
    <form action="{{ route('admin.vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-3 h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <x-input label="Name" name="name" type="text" placeholder="Enter Vendor Name"
                                required="true" :value="$vendor->name" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Email" name="email" type="email" placeholder="Enter Email"
                                :value="$vendor->email" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Phone" name="phone" type="text" placeholder="Enter Phone"
                                :value="$vendor->phone" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Address" name="address" type="text" placeholder="Enter Address"
                                :value="$vendor->address" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Position" name="position" type="number" placeholder="Enter Position"
                                :value="$vendor->position" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-3 h-100">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="mb-2">
                                <h5 class="mt-2">
                                    {{ __('Image') }} <span class="text-danger">*</span>
                                    <span class="text-muted">{{ __('(Ratio 1280 x 960 px)') }}</span>
                                </h5>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <x-image-picker name="image" :value="$vendor->image" />
                        </div>

                        <div class="mb-3">
                            <div class="mb-2">
                                <h5 class="mt-2">
                                    {{ __('Icon Image') }}
                                    <span class="text-muted">{{ __('(used for partner cards, ratio 1:1)') }}</span>
                                </h5>
                                @error('icon_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <x-image-picker name="icon_image" :value="$vendor->icon_image" />
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-4">
                            <button class="btn btn-primary py-2 px-5">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
