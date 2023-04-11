@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="mx-4">

            <h1 class="mb-3 text-center">Reset your password</h1>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body p-4">
                    
                    <form method="POST" action="{{ route('password.forgot') }}">
                        @csrf
    
                        <div class="mb-3">
                            <label for="email" class="form-label mb-1">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" placeholder="Enter your email address" required autofocus>
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="">
                            <button class="btn btn-primary" type="submit">{{ __('Send password reset email') }}</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection