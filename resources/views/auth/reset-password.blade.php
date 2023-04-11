@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="mx-4">
            <h1 class="mb-3 text-center">Reset your password</h1>
            <div class="card mb-4">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.reset') }}">
                        @csrf
    
                        <div class="mb-3">
                            <label for="password" class="form-label mb-1">
                                New Password <span class="text-danger">*</span>
                            </label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your new password" required autofocus>
                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label mb-1">
                                Password Confirmation <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm your password" required>
                        </div>
    
                        <input type="text" name="email" value="{{ $email }}" hidden>
                        <input type="text" name="token" value="{{ $token }}" hidden>
    
                        <div class="">
                            <button class="btn btn-primary" type="submit">{{ __('Change password') }}</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection