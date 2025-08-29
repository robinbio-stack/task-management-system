@extends('layouts.dashboard')

@section('content')
    <h2>✏️ Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
        </div>

        @if(Auth::user()->role === 'admin')
            <div class="mb-3">
                <label class="form-label">Assign To</label>
                <select name="assigned_to" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->role }})
                        </option>
                    @endforeach
                </select>
            </div>
        @else
            <input type="hidden" name="assigned_to" value="{{ Auth::id() }}">
        @endif

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
        </div>

        <button type="submit" class="btn btn-success">💾 Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">🔙 Back</a>
    </form>
@endsection
