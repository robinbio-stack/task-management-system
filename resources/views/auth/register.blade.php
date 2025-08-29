@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<h2 class="mb-4">Register</h2>

<form action="{{ route('register.post') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Register</button>
    <a href="{{ route('login') }}" class="btn btn-link">Login</a>
</form>
@endsection
