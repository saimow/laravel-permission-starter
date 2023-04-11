@extends('layouts.app')

@section('breadcrumb')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Admin</span>
            </li>
            <li class="breadcrumb-item active">
                <span>Account</span>
            </li>
        </ol>
    </nav>
</div>

@endsection

@section('content')

<h1 class="mb-3">My Account</h1>
<div class="col-xxl-8 mb-4">
    <div class="card">
        <div class="card-header py-2 fs-5">
            Update Account Info
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.account') }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-xl-6 mb-3 mb-xl-0">
                        <label for="name" class="form-label mb-1">
                            Name <span class="text-danger">*</span>
                        </label>
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', auth()->user()->name) }}" type="text" name="name" placeholder="Enter your name" required>
                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
    
                    <div class="col-xl-6">
                        <label for="email" class="form-label mb-1">
                            Email <span class="text-danger">*</span>
                        </label>
                        <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" type="email" name="email" placeholder="Enter your email" required>
                        @error('email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <input name='info' value="1" hidden>
                    <button class="btn btn-success text-white me-2" type="submit">
                        <svg class="icon me-1">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-save') }}"></use>
                        </svg>
                        {{ __('Save') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="col-xxl-8">
    <div class="card">
        <div class="card-header py-2 fs-5">
            Change Password
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.account') }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-xl-4 mb-3 mb-xl-0">
                        <label for="old_password" class="form-label mb-1">
                            Old password <span class="text-danger">*</span>
                        </label>
                        <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" placeholder="Enter your old password" required>
                        @error('old_password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-xl-4 mb-3 mb-xl-0">
                        <label for="new_password" class="form-label mb-1">
                            New password <span class="text-danger">*</span>
                        </label>
                        <input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" placeholder="Enter your new password" required>
                        @error('new_password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-xl-4">
                        <label for="new_password_confirmation" class="form-label mb-1">
                            Confirm password <span class="text-danger">*</span>
                        </label>
                        <input class="form-control @error('new_password_confirmation') is-invalid @enderror" type="password" name="new_password_confirmation" placeholder="Confirm your password" required>
                        @error('new_password_confirmation')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <input name='password' value="1" hidden>
                    <button class="btn btn-success text-white me-2" type="submit">
                        <svg class="icon me-1">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-save') }}"></use>
                        </svg>
                        {{ __('Change Password') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Bootstrap Toast --}}
@if (session('success'))    
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" data-coreui-delay="10000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-coreui-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    
    @push('scripts')
        <script>
            const liveToast = document.getElementById('liveToast')
            const toast = new coreui.Toast(liveToast)
            toast.show()
        </script>
    @endpush

@endif
{{-- ---- --}}

@endsection