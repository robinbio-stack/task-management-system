@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:80vh">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center bg-success text-white">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

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

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>

                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
