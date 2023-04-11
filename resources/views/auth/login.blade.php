@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="mx-4">
            
            <h1 class="mb-3 text-center">Login</h1>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
    
                        <div class="mb-3">
                            <label for="email" class="form-label mb-1">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" name="email" placeholder="Enter your email address" required autofocus>
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="password" class="form-label mb-1">Password</label>
                            <a href="{{ route('password.forgot') }}" class='float-end' >Forgot your password?</a>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter your password" required>
                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>
    
                        <div class="">
                            <button class="btn btn-primary" type="submit">{{ __('Login') }}</button>
                            <a class="float-end mt-2" href="{{ route('register') }}">Don't have an account?</a>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection