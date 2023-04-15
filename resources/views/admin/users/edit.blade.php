@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.roles.index') }}">Users</a>
            </li>
            <li class="breadcrumb-item active">
                <span>Edit</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')

<h2 class="mb-2">Edit User</h2>
<div class="col-xxl-8 mb-4">
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label mb-1">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" id="name" name="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label mb-1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" id="email" name="email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label mb-1">Roles</label>
                    <div id="app">
                        <user-roles
                            :roles="{{ json_encode($roles) }}"
                            :user-roles="{{ json_encode($userRoles) }}"
                        >
                        </user-roles>
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