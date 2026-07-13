@extends('layouts.app')
@section('header-title', __('Vendors'))
@section('header-subtitle', __('Manage Vendors'))

@section('content')
    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between px-3">
        <h4>{{ __('Vendors List') }}</h4>

        @hasPermission('admin.vendor.create')
            <a href="{{ route('admin.vendor.create') }}" class="btn py-2 btn-primary">
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
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Position') }}</th>
                                @hasPermission('admin.vendor.toggle')
                                    <th class="text-center">{{ __('Status') }}</th>
                                @endhasPermission
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        @forelse ($vendors as $vendor)
                            <tr>
                                <td>
                                    <img src="{{ $vendor->thumbnail }}" height="56">
                                </td>
                                <td>{{ $vendor->name }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->phone }}</td>
                                <td>{{ $vendor->position }}</td>

                                @hasPermission('admin.vendor.toggle')
                                    <td class="text-center">
                                        <label class="switch mb-0" data-bs-toggle="tooltip" data-bs-placement="left"
                                            data-bs-title="Status Toggle">
                                            <a href="{{ route('admin.vendor.toggle', $vendor->id) }}">
                                                <input type="checkbox" {{ $vendor->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </a>
                                        </label>
                                    </td>
                                @endhasPermission

                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @hasPermission('admin.vendor.show')
                                            <a href="{{ route('admin.vendor.show', $vendor->id) }}"
                                                class="btn btn-outline-secondary btn-sm circleIcon">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endhasPermission

                                        @hasPermission('admin.vendor.edit')
                                            <a href="{{ route('admin.vendor.edit', $vendor->id) }}"
                                                class="btn btn-outline-info btn-sm circleIcon">
                                                <img src="{{ asset('assets/icons-admin/edit.svg') }}" alt="edit"
                                                    loading="lazy" />
                                            </a>
                                        @endhasPermission

                                        @hasPermission('admin.vendor.destroy')
                                            <a href="{{ route('admin.vendor.destroy', $vendor->id) }}"
                                                class="btn btn-outline-danger btn-sm deleteConfirm circleIcon">
                                                <img src="{{ asset('assets/icons-admin/trash.svg') }}" alt="delete"
                                                    loading="lazy" />
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
                    </table>
                </div>
            </div>
        </div>

        <div class="my-3">
            {{ $vendors->links() }}
        </div>
    </div>
@endsection
