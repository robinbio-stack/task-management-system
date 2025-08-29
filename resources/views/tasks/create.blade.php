@extends('layouts.dashboard')

@section('content')
    <h2>➕ Create Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        @if(Auth::user()->role === 'admin')
            <div class="mb-3">
                <label class="form-label">Assign To</label>
                <select name="assigned_to" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                    @endforeach
                </select>
            </div>
        @else
            <input type="hidden" name="assigned_to" value="{{ Auth::id() }}">
        @endif

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">✅ Save Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">🔙 Back</a>
    </form>
@endsection
