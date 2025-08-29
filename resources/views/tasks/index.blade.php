@extends('layouts.dashboard')

@section('content')
    <h2 class="mb-3">📝 Task List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">➕ Create Task</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assignedUser->name ?? 'N/A' }}</td>
                    <td>
                        <span class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in-progress' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this task?')" class="btn btn-sm btn-danger">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No tasks found.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
