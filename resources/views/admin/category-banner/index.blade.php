@extends('layouts.app')

@section('header-title', __('Category Banners'))
@section('header-subtitle', __('Manage Category Banners items'))

@section('content')
    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between px-3">
        <h4>{{ __('Category Banner List') }}</h4>

        @hasPermission('admin.categoryBanner.create')
            <a href="{{ route('admin.categoryBanner.create') }}" class="btn py-2 btn-primary">
                <i class="fa fa-plus-circle"></i>
                {{ __('Create New') }}
            </a>
        @endhasPermission
    </div>

    <div class="container-fluid mt-3">

        <div class="my-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border-left-right table-responsive-lg">
                        <thead>
                            <tr>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Position') }}</th>
                                @hasPermission('admin.categoryBanner.toggle')
                                    <th class="text-center">{{ __('Status') }}</th>
                                @endhasPermission
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        @forelse($categoryBanners as $categoryBanner)
                            <tr>
                                <td>
                                    <img src="{{ $categoryBanner->thumbnail }}" height="76">
                                </td>

                                <td>
                                    {{ $categoryBanner->category?->name }}
                                </td>

                                <td>
                                    <span class="badge bg-{{ $categoryBanner->position == 'top' ? 'info' : 'secondary' }}">
                                        {{ ucfirst($categoryBanner->position) }}
                                    </span>
                                </td>

                                @hasPermission('admin.categoryBanner.toggle')
                                    <td class="text-center">
                                        <label class="switch mb-0" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Status Toggle">
                                            <a href="{{ route('admin.categoryBanner.toggle', $categoryBanner->id) }}">
                                                <input type="checkbox" {{ $categoryBanner->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </a>
                                        </label>
                                    </td>
                                @endhasPermission

                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @hasPermission('admin.categoryBanner.edit')
                                            <a href="{{ route('admin.categoryBanner.edit', $categoryBanner->id) }}"
                                                class="btn btn-outline-info btn-sm circleIcon">
                                                <img src="{{ asset('assets/icons-admin/edit.svg') }}" alt="edit" loading="lazy" />
                                            </a>
                                        @endhasPermission

                                        @hasPermission('admin.categoryBanner.destroy')
                                            <a href="{{ route('admin.categoryBanner.destroy', $categoryBanner->id) }}"
                                                class="btn btn-outline-danger btn-sm deleteConfirm circleIcon">
                                                <img src="{{ asset('assets/icons-admin/trash.svg') }}" alt="delete" loading="lazy" />
                                            </a>
                                        @endhasPermission
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="my-3">
            {{ $categoryBanners->links() }}
        </div>

    </div>
@endsection
