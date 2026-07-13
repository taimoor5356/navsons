@extends('layouts.app')
@section('header-title', __('Add New Vendor'))

@section('content')
    <div class="page-title">
        <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-store"></i> {{ __('Add New Vendor') }}
        </div>
    </div>
    <form action="{{ route('admin.vendor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-3 h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <x-input label="Name" name="name" type="text" placeholder="Enter Vendor Name" required="true" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Email" name="email" type="email" placeholder="Enter Email" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Phone" name="phone" type="text" placeholder="Enter Phone" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Address" name="address" type="text" placeholder="Enter Address" />
                        </div>

                        <div class="mb-3">
                            <x-input label="Position" name="position" type="number" placeholder="Enter Position" />
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
                            <x-image-picker name="image" />
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
                            <x-image-picker name="icon_image" />
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
