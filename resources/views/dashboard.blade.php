@extends('layouts.app')

@section('content')
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>You are logged in as <strong>{{ Auth::user()->role }}</strong></p>
@endsection
