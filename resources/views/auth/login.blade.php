@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:80vh">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ route('register') }}">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
