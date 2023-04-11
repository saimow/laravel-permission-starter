@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="mx-4">
            <h1 class="mb-3 text-center">Register</h1>
            <div class="card mb-4">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
    
                        <div class="mb-3">
                            <label for="name" class="form-label mb-1">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="Enter your name" required autofocus>
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="email" class="form-label mb-1">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" name="email" placeholder="Enter your email address" required>
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="password" class="form-label mb-1">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" required>
                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label mb-1">Password Confirmation</label>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm your password" required>
                        </div>
    
                        <div class="">
                            <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
                            <a class="float-end mt-2" href="{{ route('login') }}">Already have an account?</a>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection