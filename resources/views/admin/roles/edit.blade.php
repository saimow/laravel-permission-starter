@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.roles.index') }}">Roles</a>
            </li>
            <li class="breadcrumb-item active">
                <span>Edit</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')

<h2 class="mb-2">Edit Role</h2>
<div class="col-xxl-8 mb-4">
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label mb-1">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $role->name) }}" id="name" name="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label mb-1">Permissions</label>
                    <div id="app">
                        <role-permissions
                            :permissions="{{ json_encode($permissions) }}"
                            :role-permissions="{{ json_encode($rolePermissions) }}"
                        >
                        </role-permissions>
                    </div>
                </div>
                <button class="btn btn-success">
                    <svg class="icon me-1">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-save') }}"></use>
                    </svg>
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    
@endpush