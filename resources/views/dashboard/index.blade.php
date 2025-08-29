@extends('layouts.dashboard')

@section('content')
    <h2>Welcome, {{ $user->name }}</h2>
    <p>You are logged in as <strong>{{ ucfirst($user->role) }}</strong>.</p>

    @if($user->role === 'admin')
        <div class="alert alert-info">
            📌 Admin Dashboard: You can view, reassign, and delete tasks.
        </div>
    @else
        <div class="alert alert-success">
            ✅ User Dashboard: You can create and manage your own tasks.
        </div>
    @endif
@endsection
