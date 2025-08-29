@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>User Dashboard</h2>
    <p>Welcome, {{ $user->name }} (User)</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
