@extends('layouts.app')

@section('header-title', __('Edit Category Banner'))

@section('content')
    <div class="page-title">
        <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-image"></i> {{ __('Edit Category Banner') }}
        </div>
    </div>
    <form action="{{ route('admin.categoryBanner.update', $categoryBanner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-6">
                <div class="card mt-3 h-100">
                    <div class="card-body">
                        <div>
                            <label for="category_id" class="form-label">
                                {{ __('Category') }} <span class="text-danger">*</span>
                            </label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="" disabled>{{ __('Select Category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id') ?? $categoryBanner->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="position" class="form-label">
                                {{ __('Position') }} <span class="text-danger">*</span>
                            </label>
                            <select name="position" id="position" class="form-select @error('position') is-invalid @enderror" required>
                                <option value="top" {{ (old('position') ?? $categoryBanner->position) == 'top' ? 'selected' : '' }}>{{ __('Top') }}</option>
                                <option value="bottom" {{ (old('position') ?? $categoryBanner->position) == 'bottom' ? 'selected' : '' }}>{{ __('Bottom') }}</option>
                            </select>
                            @error('position')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <div>
                                <h5>
                                    {{ __('Banner Image ') }}
                                    <span class="text-primary bg-light">Ratio (4500 x 2000 px)</span>
                                    <span class="text-danger">*</span>
                                </h5>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <x-image-picker name="image" :value="$categoryBanner->image" />
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
