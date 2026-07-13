@extends('layouts.app')

@section('header-title', __('Vendor Details'))

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-4 mt-3">
                        <img src="{{ $vendor->thumbnail }}" class="w-100 rounded" alt="{{ $vendor->name }}">

                        <div class="d-flex gap-2 mt-2">
                            <div class="text-center flex-fill">
                                <span class="text-muted d-block">{{ __('Image') }}</span>
                                <img src="{{ $vendor->thumbnail }}" height="60" class="rounded mt-1">
                            </div>
                            <div class="text-center flex-fill">
                                <span class="text-muted d-block">{{ __('Icon Image') }}</span>
                                <img src="{{ $vendor->icon_thumbnail }}" height="60" class="rounded mt-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-3">
                        <h4 class="mb-3">{{ $vendor->name }}</h4>

                        <table class="table mb-0">
                            <tr>
                                <td style="width: 180px">{{ __('Name') }}:</td>
                                <td>{{ $vendor->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Email') }}:</td>
                                <td>{{ $vendor->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Phone') }}:</td>
                                <td>{{ $vendor->phone ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}:</td>
                                <td>{{ $vendor->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Position') }}:</td>
                                <td>{{ $vendor->position }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Status') }}:</td>
                                <td>
                                    @if ($vendor->status)
                                        <span class="badge bg-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Created At') }}:</td>
                                <td>{{ $vendor->created_at?->format('d M Y, h:i A') }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Updated At') }}:</td>
                                <td>{{ $vendor->updated_at?->format('d M Y, h:i A') }}</td>
                            </tr>
                        </table>

                        @hasPermission('admin.vendor.edit')
                            <a href="{{ route('admin.vendor.edit', $vendor->id) }}" class="btn btn-primary mt-3">
                                {{ __('Edit Vendor') }}
                            </a>
                        @endhasPermission
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
